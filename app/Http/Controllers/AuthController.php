<?php

namespace App\Http\Controllers;

use App\Support\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function form(?string $role = 'member')
    {
        if (session('user')) {
            return redirect()->route('dashboard');
        }

        $lib = Library::load();
        $role = $role ?: 'member';

        return view('login', compact('lib', 'role'));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'role' => 'required|in:member,admin,super',
            'id' => 'required|string|max:50',
            'password' => 'required|string|max:100',
        ], [
            'id.required' => 'ID atau NIK wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $key = 'login:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withInput($request->only('id', 'role'))
                ->with('err', 'Percobaan maksimal tercapai. Coba lagi dalam '.RateLimiter::availableIn($key).' detik.');
        }

        $lib = Library::load();
        $id = trim($data['id']);

        if ($lib->verify($id, $data['password'], $data['role'])) {
            RateLimiter::clear($key);
            $request->session()->regenerate();

            $acc = $lib->findAccount($id);
            // Cari ID resmi kartu (bukan NIK) untuk disimpan di sesi
            $displayId = $id;
            if (strlen($id) === 16 && ctype_digit($id)) {
                foreach ($lib->users as $u) {
                    if ($u['n'] === $acc['name']) {
                        $displayId = $u['i'];
                        break;
                    }
                }
            }

            session(['user' => [
                'n' => $acc['name'],
                'id' => $displayId,
                'role' => $data['role'],
            ]]);

            return redirect()->route('dashboard')->with('toast', 'Selamat datang, '.$acc['name']);
        }

        RateLimiter::hit($key, 60);
        $left = max(0, 5 - RateLimiter::attempts($key));

        return redirect()->route('login', $data['role'])
            ->withInput($request->only('id'))
            ->with('err', "ID/NIK atau kata sandi tidak cocok. Sisa percobaan: {$left}.");
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('toast', 'Anda telah keluar dari sistem.');
    }

    // -----------------------------------------------------------------
    // Pendaftaran mandiri anggota
    // -----------------------------------------------------------------

    public function registerForm()
    {
        if (session('user')) {
            return redirect()->route('dashboard');
        }

        $lib = Library::load();

        return view('register', compact('lib'));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:60',
            'nik' => 'required|digits:16',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'nik.required' => 'Nomor Induk Kependudukan (NIK) wajib diisi.',
            'nik.digits' => 'NIK harus berupa 16 digit angka sesuai KTP.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $lib = Library::load();

        if ($lib->memberTaken($data['nik'])) {
            return back()->withInput($request->only('name', 'nik'))
                ->withErrors(['nik' => 'NIK ini sudah terdaftar sebagai anggota. Silakan masuk atau gunakan fitur Lupa Kata Sandi.']);
        }

        $created = $lib->registerMember(trim($data['name']), trim($data['nik']), $data['password']);

        // Langsung beri sesi login
        $request->session()->regenerate();
        session(['user' => [
            'n' => $created['name'],
            'id' => $created['id'],
            'role' => 'member',
        ]]);

        return redirect()->route('dashboard')->with('toast', 'Pendaftaran berhasil! Nomor ID Anda: '.$created['id']);
    }

    // -----------------------------------------------------------------
    // Lupa kata sandi mandiri
    // -----------------------------------------------------------------

    public function forgotForm()
    {
        return view('forgot-password');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'id.required' => 'Nomor ID Anggota atau NIK wajib diisi.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        $lib = Library::load();
        $ok = $lib->resetPassword(trim($data['id']), $data['password']);

        if (! $ok) {
            return back()->withInput($request->only('id'))
                ->withErrors(['id' => 'Akun anggota dengan ID/NIK tersebut tidak ditemukan.']);
        }

        return redirect()->route('login', 'member')
            ->with('toast', 'Kata sandi berhasil diperbarui. Silakan masuk dengan sandi baru Anda.');
    }
}
