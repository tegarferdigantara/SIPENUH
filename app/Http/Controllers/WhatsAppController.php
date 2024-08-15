<?php

namespace App\Http\Controllers;

use App\Models\ChatbotApiKey;
use App\Models\Customer;
use App\Models\UmrahPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    // Check WhatsApp Status digunakan dibagian header admin (Composer View AppServiceProvider)
    public function checkWhatsAppStatus()
    {
        try {
            $apiKey = ChatbotApiKey::first()->api_key ?? null;
            $webHookUrl = env('WEBHOOK_WHATSAPP_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json'
            ])->get($webHookUrl . '/api/status');

            if ($response->successful()) {
                return $response->json()['status'] ?? false;
            } else {
                Log::error("Failed to check WhatsApp status. Status: " . $response->status());
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Exception occurred while checking WhatsApp status: " . $e->getMessage());
            return false;
        }
    }
    // Broadcast Message View
    public function broadcast()
    {
        $umrahPackages = UmrahPackage::with('customers')->get();
        return view('admin.pages.broadcast.bulk', compact('umrahPackages'));
    }

    public function broadcastStore(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'umrah_package_id' => 'required|exists:umrah_packages,id',
            'delay' => 'required|integer|min:15',
        ]);

        $customers = Customer::where('umrah_package_id', $validatedData['umrah_package_id'])->get();

        if ($customers->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada customer yang terdaftar pada paket umrah ini');
        }

        $messages = $this->prepareMessages($customers, $validatedData['message'], $validatedData['delay']);

        return $this->sendMessages($messages);
    }

    // Single Message View
    public function single()
    {
        $customers = Customer::all();
        return view('admin.pages.broadcast.single', compact('customers'));
    }

    public function singleStore(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'whatsapp_number' => 'required',
            'delay' => 'required|integer|min:15',
        ]);

        $whatsappNumber = $this->formatPhoneNumber($validatedData['whatsapp_number']) . '@c.us';

        $messages = [
            [
                'to' => $whatsappNumber,
                'message' => $validatedData['message'],
                'delay' => $validatedData['delay']
            ]
        ];

        return $this->sendMessages($messages);
    }

    private function prepareMessages($customers, $message, $delay)
    {
        return $customers->map(function ($customer) use ($message, $delay) {
            return [
                'to' => $this->formatPhoneNumber($customer->whatsapp_number) . '@c.us',
                'message' => $message,
                'delay' => $delay
            ];
        })->toArray();
    }

    private function sendMessages($messages)
    {
        $apiKey = ChatbotApiKey::first()->api_key ?? null;
        $webHookUrl = env('WEBHOOK_WHATSAPP_URL');

        if (!$apiKey) {
            Log::error('API key not found');
            return redirect()->back()->with('error', 'API key not found');
        }

        try {
            $response = Http::withHeaders(['Authorization' => "Bearer {$apiKey}"])
                ->post($webHookUrl . '/api/send-message', ['messages' => $messages]);

            if ($response->successful()) {
                $responseData = $response->json();
                Log::info("Response from Node.js server: " . json_encode($responseData));
                return redirect()->back()->with('success', $responseData['message'] ?? 'Pesan berhasil diantrekan');
            } else {
                Log::error("Failed to send batch message. Status: " . $response->status() . ", Body: " . $response->body());
                $errorMessage = $response->status() == 403 ?
                    "Gagal mengirim pesan broadcast. Silakan coba lagi. [403] Invalid Key Authorization" :
                    "Gagal mengirim pesan broadcast. Silakan coba lagi. [{$response->status()}]";
                return redirect()->back()->with('error', $errorMessage);
            }
        } catch (\Exception $e) {
            Log::error("Exception occurred while sending messages: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }

    private function formatPhoneNumber($phoneNumber)
    {
        return preg_replace('/^0/', '62', $phoneNumber);
    }
}
