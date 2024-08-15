<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',  Password::min(8) // Minimal 8 karakter
                    ->mixedCase() // Harus ada huruf besar dan kecil
                    ->numbers() // Harus ada angka
                    ->symbols() // Harus ada simbol
                    ->uncompromised() // Password tidak boleh ditemukan dalam data pelanggaran keamanan
                , 'confirmed'
            ],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.account.setting')->with('success', 'Password berhasil di perbarui.');
    }
}
