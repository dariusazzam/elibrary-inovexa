@extends('layouts.app')
@section('title', 'Masuk — Inovexa Public Library')

@section('content')
@php $L = \App\Support\Library::LOGIN[$role]; @endphp

<div class="row" style="max-width:1100px;margin:0 auto;padding:16px 20px 0;align-items:center">
    <a href="{{ route('home') }}" style="font-size:12px;color:var(--t);text-decoration:none">← Kembali ke Beranda</a>
    <span class="pill" style="background:#fbe9d6;color:var(--o)">● Katalog Nasional &amp; SIPERPU Terhubung</span>
</div>

<div class="lg" style="min-height:0;padding-top:12px">
    <div class="lp">
        <div class="logo"><i style="background:#fff;color:var(--g)">▤</i><div>Inovexa Public Library<small style="color:#a9c0b2">PERPUSTAKAAN DAERAH &amp; ARSIP SIPIL</small></div></div>
        <span class="tag" style="align-self:start">Sistem Otomasi Sirkulasi Terpadu</span>
        <h2>Akses Satu Pintu Seluruh Khazanah Literasi Warga.</h2>
        <span style="font-size:12px;color:#c9d8cf">Platform layanan mandiri peminjaman koleksi fisik, pembacaan arsip langka digital, dan manajemen sirkulasi bibliografi kota terakreditasi A.</span>
        <div class="img" style="position:relative;background:linear-gradient(0deg,rgba(0,0,0,.75),transparent 55%),repeating-linear-gradient(90deg,#6b4a2a 0 7px,#8a6238 7px 12px,#4a321c 12px 20px),#5a3d22">
            <span style="position:absolute;left:12px;bottom:10px;font-size:10px;font-weight:600">Gedung Utama Ruang Baca Dewantara • Terbuka<br>08:00 - 20:00 WIB</span>
        </div>
        <div style="border-top:1px solid rgba(255,255,255,.15);padding-top:12px;font-size:12px">
            <i>“Buku adalah jembatan peradaban yang menghubungkan memori masa silam dengan kecerdasan masa depan.”</i><br>
            <small style="color:#a9c0b2">Dewan Pembina Literasi Daerah</small>
        </div>
    </div>

    <div class="rp">
        <div class="row" style="align-items:start">
            <h2 style="font-size:28px;margin:0">Otorisasi Akun</h2>
            <span class="pill" style="background:#dcebe2;color:var(--ok)">⚿ SSO Terenkripsi</span>
        </div>
        <span style="color:var(--m);font-size:12px">Pilih peran akun sesuai kartu keanggotaan atau wewenang dinas Anda.</span>

        <div class="tabs">
            @foreach(\App\Support\Library::ROLES as $k => $name)
                <a class="{{ $k === $role ? 'on' : '' }}" href="{{ route('login', $k) }}">{{ $name }}</a>
            @endforeach
        </div>

        <div class="note"><b>{{ $L[0] }}</b><br>{{ $L[1] }}</div>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">

            <label for="u">{{ $L[2] }}</label>
            <input class="in" id="u" name="id" value="{{ old('id') }}" placeholder="{{ $L[3] }}" autocomplete="username" required>
            <div style="font-size:10px;color:var(--m);margin-top:4px">{{ $L[4] }}</div>

            <div class="row" style="align-items:center">
                <label for="p">Kata Sandi / PIN 6–Digit</label>
                @if($role === 'member')
                    <a href="{{ route('password.forgot') }}" style="color:var(--o);font-size:11px;font-weight:600">Lupa Kata Sandi?</a>
                @endif
            </div>
            <div style="position:relative">
                <input class="in" id="p" name="password" type="password" placeholder="Masukkan kata sandi atau PIN Anda" autocomplete="current-password" required>
                <button type="button" onclick="eye()" aria-label="Tampilkan sandi" style="position:absolute;right:8px;top:8px;background:none;border:0">👁</button>
            </div>

            <div class="row" style="margin-top:10px;font-size:11px">
                <label style="margin:0;font-weight:400"><input type="checkbox" name="remember"> Ingat sesi saya pada perangkat ini</label>
                <span style="color:var(--m)">Maksimal 3 perangkat</span>
            </div>

            <div class="err" id="err">{{ session('err') ?? $errors->first() }}</div>
            <button class="btn" style="width:100%;padding:13px">⇥ {{ $L[5] }}</button>
        </form>

        @if($role === 'member')
        <div class="card" style="margin-top:14px;display:flex;justify-content:space-between;align-items:center;gap:10px;background:var(--b)">
            <div><b>Belum terdaftar sebagai anggota?</b><br><span style="font-size:12px;color:var(--m)">Pendaftaran terbuka untuk seluruh warga ber-KTP / Pelajar.</span></div>
            <a class="btn" style="background:#fff;border:1px solid var(--o);color:var(--o)" href="{{ route('register') }}">Daftar Mandiri Gratis</a>
        </div>
        @endif

        <div class="row" style="margin-top:18px;font-size:10px;color:var(--m)">
            <span>● Server Perpustakaan Aktif • Enkripsi TLS 1.3 Aman</span>
            <span>Bantuan SIPERPU &nbsp; Aktivasi KTP di Meja Sirkulasi</span>
        </div>
        <div style="font-size:10px;color:var(--m);margin-top:6px">Demo: {{ \App\Support\Library::CREDS[$role][0] }} / {{ \App\Support\Library::CREDS[$role][1] }}</div>
    </div>
</div>
@endsection
