<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user (CRUD)
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user.login', compact('users'));
    }

    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        return view('guest.login.login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah.');
        }

        // Simpan data user ke session
        session([
            'user_id' => $user->id,
            'name'    => $user->name,
            'email'   => $user->email,
        ]);

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        session()->flush(); // hapus semua session
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    /**
     * Tampilkan form register
     */
    public function showRegisterForm()
    {
        return view('pages.user.register');
    }

    /**
     * Proses register user baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan user baru
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // (opsional) langsung login setelah register
        session([
            'user_id' => $user->id,
            'name'    => $user->name,
            'email'   => $user->email,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }

    /**
     * Tampilkan form edit user
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('guest.users.edit', compact('user'));
    }

    /**
     * Update data user
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
