<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('admin.pages.user-manage.list', compact('users'));
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.pages.user-manage.create', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'lowercase', 'unique:users,email'],
            'password' => [
                'required',  Password::min(8) // Minimal 8 karakter
                    ->mixedCase() // Harus ada huruf besar dan kecil
                    ->numbers() // Harus ada angka
                    ->symbols() // Harus ada simbol
                    ->uncompromised() // Password tidak boleh ditemukan dalam data pelanggaran keamanan
                , 'confirmed'
            ],
            'whatsapp_number' => ['required', 'string'],
            'role' => ['required', 'exists:roles,name'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp_number' => $request->whatsapp_number
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with('success', "Akun dengan nama {$user->name} berhasil dibuat");
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.pages.user-manage.edit', compact('user', 'roles'));
    }

    public function update(int $id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'lowercase', 'unique:users,email'],
            'password' => [
                'required',  Password::min(8) // Minimal 8 karakter
                    ->mixedCase() // Harus ada huruf besar dan kecil
                    ->numbers() // Harus ada angka
                    ->symbols() // Harus ada simbol
                    ->uncompromised() // Password tidak boleh ditemukan dalam data pelanggaran keamanan
                , 'confirmed'
            ],
            'whatsapp_number' => ['required', 'string'],
        ]);

        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', "Akun dengan nama {$user->name} berhasil diperbarui");
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        $tempUser = $user->name;

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Tidak bisa menghapus pengguna dengan role admin.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "Akun dengan nama {$tempUser} berhasil dihapus.");
    }
}
