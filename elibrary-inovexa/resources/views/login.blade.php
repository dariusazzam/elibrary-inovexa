@extends('layouts.app')
@section('title', 'Otorisasi Akun — Inovexa Public Library')

@section('content')
@php 
    $L = \App\Support\Library::LOGIN[$role]; 
    $tabTitles = [
        'member' => ['Anggota (Pengunjung)', 'INX-2026-8820', 'Nomor ID Anggota Perpustakaan', 'Gunakan nomor kartu fisik perpustakaan atau NIK 16 digit.', 'Masuk ke Portal Anggota'],
        'admin'  => ['Admin Pegawai', 'admin', 'Nomor ID / NIP Pegawai Perpustakaan', 'Masukkan nomor induk staf perpustakaan daerah.', 'Masuk ke Meja Admin Pegawai'],
        'super'  => ['Super Admin', 'super', 'Nomor ID Super Admin Perpustakaan', 'Masukkan ID khusus pusat pengelola sistem.', 'Masuk ke Portal Super Admin'],
    ];
    $currentTab = $tabTitles[$role] ?? $tabTitles['member'];
@endphp

{{-- Top Row: Kembali & Status Terhubung --}}
<div class="row" style="max-width:1120px;margin:0 auto;padding:20px 24px 0;align-items:center">
    <a href="{{ route('home') }}" style="font-size:12px;color:var(--t);text-decoration:none;display:flex;align-items:center;gap:6px;font-weight:600">
        <span>←</span> Kembali ke Beranda
    </a>
    <span class="pill" style="background:#fef3e7;color:#b45309;font-size:11px;padding:3px 10px">
        ● Katalog Nasional &amp; SIPERPU Terhubung
    </span>
</div>

<div class="lg" style="min-height:0;padding-top:16px;max-width:1120px">
    {{-- Panel Kiri Hijau Tua Khazanah Literasi Warga --}}
    <div class="lp" style="background:#153223;color:#fff;border-radius:16px 0 0 16px;padding:36px;display:flex;flex-direction:column;gap:14px;box-shadow:0 12px 30px rgba(21,50,35,.15)">
        <div class="logo" style="color:#fff">
            <i style="background:#fff;color:#153223;font-weight:800;border-radius:8px">▤</i>
            <div>Inovexa Public Library<small style="color:#a9c0b2;letter-spacing:.06em">PERPUSTAKAAN DAERAH &amp; ARSIP SIPIL</small></div>
        </div>

        <span class="tag" style="background:rgba(255,255,255,.14);align-self:start;margin-top:6px;font-size:10px">Sistem Otomasi Sirkulasi Terpadu</span>
        <h2 style="font-size:26px;line-height:1.2;margin:4px 0 0;letter-spacing:-.01em">Akses Satu Pintu Seluruh Khazanah Literasi Warga.</h2>
        <span style="font-size:12px;color:#c9d8cf;line-height:1.5">Platform layanan mandiri peminjaman koleksi fisik, pembacaan arsip langka digital, dan manajemen sirkulasi bibliografi kota terakreditasi A.</span>

        {{-- Foto Representatif Ruang Baca Dewantara --}}
        <div style="position:relative;height:180px;border-radius:12px;overflow:hidden;margin:10px 0;background:linear-gradient(180deg,rgba(0,0,0,.1),rgba(0,0,0,.75)),url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=700&q=80') center/cover no-repeat">
            <div style="position:absolute;left:14px;bottom:12px;font-size:11px;line-height:1.3;font-weight:600;color:#f8fafc">
                Gedung Utama Ruang Baca Dewantara • Terbuka<br>
                <span style="font-size:10px;font-weight:400;color:#cbd5e1">08:00 - 20:00 WIB</span>
            </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,.15);padding-top:14px;font-size:11px;line-height:1.5">
            <i>“Buku adalah jembatan peradaban yang menghubungkan memori masa silam dengan kecerdasan masa depan.”</i><br>
            <small style="color:#a9c0b2">Dewan Pembina Literasi Daerah</small>
        </div>
    </div>

    {{-- Panel Kanan Form Login Sesuai Image 2 & 3 --}}
    <div class="rp" style="background:#fff;border:1px solid var(--ln);border-radius:0 16px 16px 0;padding:36px;display:flex;flex-direction:column;justify-content:space-between">
        <div>
            <div class="row" style="align-items:start">
                <div>
                    <h2 style="font-size:26px;margin:0;font-weight:800;letter-spacing:-.02em">Otorisasi Akun</h2>
                    <span style="color:var(--m);font-size:12px;display:block;margin-top:2px">Pilih peran akun sesuai kartu keanggotaan / wewenang dinas</span>
                </div>
                <span class="pill" style="background:#e8f4ed;color:#166534;font-size:11px;padding:3px 10px">⚿ SSO Terenkripsi</span>
            </div>

            {{-- 3 Tab Peran Sesuai Figma --}}
            <div style="display:flex;background:#f2ede4;border-radius:10px;padding:4px;margin:18px 0 16px;gap:4px">
                <a href="{{ route('login', 'member') }}" style="flex:1;text-align:center;padding:9px 6px;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none;{{ $role === 'member' ? 'background:#153223;color:#fff' : 'color:#555' }}">
                    👤 Anggota (Pengunjung)
                </a>
                <a href="{{ route('login', 'admin') }}" style="flex:1;text-align:center;padding:9px 6px;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none;{{ $role === 'admin' ? 'background:#153223;color:#fff' : 'color:#555' }}">
                    🗂 Admin Pegawai
                </a>
                <a href="{{ route('login', 'super') }}" style="flex:1;text-align:center;padding:9px 6px;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none;{{ $role === 'super' ? 'background:#153223;color:#fff' : 'color:#555' }}">
                    ⚙ Super Admin
                </a>
            </div>

            {{-- Box Info Peran --}}
            <div style="border-left:3px solid #b45309;background:#fef3e7;padding:12px 14px;border-radius:8px;margin-bottom:16px;font-size:12px">
                <b style="color:#b45309;display:flex;align-items:center;gap:6px">
                    <span>🪪</span> Portal Layanan {{ $currentTab[0] }}
                </b>
                <span style="color:var(--m);display:block;margin-top:2px">{{ $L[1] }}</span>
            </div>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="hidden" name="role" value="{{ $role }}">

                <label for="u" style="font-size:12px;font-weight:600;display:block;margin-bottom:4px">{{ $currentTab[2] }}</label>
                <div style="position:relative">
                    <span style="position:absolute;left:12px;top:11px;color:var(--m);font-size:13px">🆔</span>
                    <input class="in" id="u" name="id" value="{{ old('id') }}" placeholder="Masukkan nomor identitas akun" autocomplete="username" style="padding-left:36px" required>
                </div>
                <div style="font-size:11px;color:var(--m);margin:4px 0 12px">{{ $currentTab[3] }}</div>

                <div class="row" style="align-items:center;margin-bottom:4px">
                    <label for="p" style="font-size:12px;font-weight:600;margin:0">Kata Sandi / PIN 6–Digit</label>
                    <a href="{{ route('password.forgot') }}" style="color:#b45309;font-size:11px;font-weight:600;text-decoration:none">Lupa Kata Sandi?</a>
                </div>
                <div style="position:relative">
                    <span style="position:absolute;left:12px;top:11px;color:var(--m);font-size:13px">🔒</span>
                    <input class="in" id="p" name="password" type="password" value="" placeholder="Masukkan kata sandi atau PIN Anda" autocomplete="current-password" style="padding-left:36px;padding-right:36px" required>
                    <button type="button" onclick="eye()" aria-label="Tampilkan sandi" style="position:absolute;right:10px;top:10px;background:none;border:0;cursor:pointer;color:var(--m)">👁</button>
                </div>

                <div class="row" style="margin-top:10px;font-size:11px">
                    <label style="margin:0;font-weight:400;display:flex;align-items:center;gap:6px;cursor:pointer">
                        <input type="checkbox" name="remember" checked> Ingat sesi saya pada perangkat ini
                    </label>
                    <span style="color:var(--m)">Maksimal 3 perangkat</span>
                </div>

                <div class="err" id="err" style="color:#dc2626;font-size:12px;margin-top:6px;min-height:16px">{{ session('err') ?? $errors->first() }}</div>
                
                <button class="btn" style="width:100%;padding:12px;background:#153223;color:#fff;border-radius:8px;font-weight:700;font-size:13px;display:flex;align-items:center;justify-content:center;gap:8px">
                    <span>➔</span> {{ $currentTab[4] }}
                </button>
            </form>

            @if($role === 'member')
            <div style="margin-top:16px;padding:12px 14px;border-radius:10px;background:#f9f8f6;border:1px solid var(--ln);display:flex;justify-content:space-between;align-items:center;gap:10px">
                <div>
                    <b style="font-size:12px;display:block">Belum terdaftar sebagai anggota?</b>
                    <small style="color:var(--m)">Pendaftaran terbuka untuk seluruh warga ber-KTP / Pelajar.</small>
                </div>
                <a class="btn" style="background:#fff;border:1px solid #b45309;color:#b45309;font-size:11px;padding:6px 12px;white-space:nowrap" href="{{ route('register') }}">Daftar Mandiri Gratis</a>
            </div>
            @endif
        </div>

        <div style="margin-top:20px;padding-top:14px;border-top:1px solid var(--ln);display:flex;justify-content:space-between;align-items:center;font-size:10px;color:var(--m);flex-wrap:wrap;gap:8px">
            <span>● Server Perpustakaan Aktif • Enkripsi TLS 1.3 Aman</span>
            <div style="display:flex;gap:12px">
                <a href="#bantuan" onclick="toast('Silakan hubungi Meja Sirkulasi untuk aktivasi.');return false;" style="color:var(--m)">Bantuan SIPERPU</a>
                <span>•</span>
                <a href="{{ route('register') }}" style="color:var(--m)">Aktivasi KTP di Meja Sirkulasi</a>
            </div>
        </div>
    </div>
</div>
@endsection
