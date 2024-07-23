<?php

namespace App\Http\Controllers;

use App\Jobs\BroadcastWhatsappMessage;
use App\Models\Customer;
use App\Models\UmrahPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index()
    {
        $umrahPackages = UmrahPackage::with('customers')->get();
        return view('admin.pages.broadcast.bulk', compact('umrahPackages'));
    }
    public function broadcast(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'umrah_package_id' => 'required|exists:umrah_packages,id',
            'delay' => 'required|integer|min:0',
        ]);

        $message = $request->input('message');
        $umrahPackageId = $request->input('umrah_package_id');
        $delay = $request->input('delay', 0);

        $customers = Customer::where('umrah_package_id', $umrahPackageId)->get();

        $totalCustomers = $customers->count();
        $sentCount = 0;

        foreach ($customers as $customer) {
            $this->sendMessage($delay, $customer->whatsapp_number, $message,);
            $sentCount++;

            // Opsional: Update progress
            $progress = ($sentCount / $totalCustomers) * 100;
            // Anda bisa menyimpan progress ini ke session atau database jika ingin menampilkan ke user
        }

        return redirect()->back()->with('success', "Pesan broadcast telah dikirim ke {$sentCount} pelanggan dari paket umrah yang dipilih.");
    }

    private function sendMessage(int $delay, $number, $message)
    {
        sleep($delay);

        $response = Http::post('http://localhost:3000/send-bulk', [
            'number' => $number,
            'message' => $message,
        ]);

        if ($response->successful()) {
            Log::info("Pesan berhasil dikirim ke {$number}");
        } else {
            Log::error("Gagal mengirim pesan ke {$number}");
        }
    }
}
