@extends('layouts.app')
@section('title', 'Daftar Anggota — Inovexa Public Library')

@section('content')
<div class="row" style="max-width:1100px;margin:0 auto;padding:16px 20px 0;align-items:center">
    <a href="{{ route('home') }}" style="font-size:12px;color:var(--t);text-decoration:none">← Kembali ke Beranda</a>
    <span class="pill" style="background:#dcebe2;color:var(--ok)">Pendaftaran Gratis • Berlaku Seumur Hidup</span>
</div>

<div class="lg" style="min-height:0;padding-top:12px">
    <div class="lp">
        <div class="logo"><i style="background:#fff;color:var(--g)">▤</i><div>Inovexa Public Library<small style="color:#a9c0b2">KEANGGOTAAN MANDATI WARGA</small></div></div>
        <span class="tag" style="align-self:start">Verifikasi NIK Terhubung Disdukcapil</span>
        <h2>Jadi Anggota dalam 1 Menit.</h2>
        <span style="font-size:12px;color:#c9d8cf">Isi data diri Anda, dan sistem langsung menerbitkan nomor kartu digital (INX-2026-••••) yang berlaku untuk pinjam buku fisik, reservasi, dan akses penuh e-library.</span>
        <ul class="ck" style="margin-top:6px">
            <li><b style="color:#fff">✓ Kartu Anggota Digital Instan</b><span style="color:#c9d8cf">Barcode langsung aktif di dashboard Anda.</span></li>
            <li><b style="color:#fff">✓ Bebas Biaya Pendaftaran</b><span style="color:#c9d8cf">Cukup ber-KTP / berstatus pelajar warga kota.</span></li>
            <li><b style="color:#fff">✓ Denda Gratis untuk Anak &amp; Pelajar</b><span style="color:#c9d8cf">Kebijakan daerah untuk pendukung literasi.</span></li>
        </ul>
    </div>

    <div class="rp">
        <h2 style="font-size:26px;margin:0">Formulir Pendaftaran Anggota</h2>
        <span style="color:var(--m);font-size:12px">Seluruh kolom wajib diisi. Data hanya disimpan pada sesi demo ini.</span>

        <form method="POST" action="{{ route('register.post') }}" style="margin-top:10px">
            @csrf

            <label for="name">Nama Lengkap (sesuai KTP)</label>
            <input class="in" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Dewi Anggraini" required>
            @error('name')<div class="err">{{ $message }}</div>@enderror

            <label for="nik">Nomor NIK KTP (16 digit)</label>
            <input class="in" id="nik" name="nik" value="{{ old('nik') }}" inputmode="numeric" pattern="[0-9]{16}" maxlength="16" placeholder="Contoh: 3271040801990002" required>
            <div style="font-size:10px;color:var(--m);margin-top:4px">NIK dipakai sebagai identitas verifikasi di meja sirkulasi.</div>
            @error('nik')<div class="err">{{ $message }}</div>@enderror

            <label for="p1">Kata Sandi Portal (minimal 6 karakter)</label>
            <div style="position:relative">
                <input class="in" id="p1" name="password" type="password" placeholder="••••••" autocomplete="new-password" required>
                <button type="button" onclick="eye('p1','p2')" aria-label="Tampilkan sandi" style="position:absolute;right:8px;top:8px;background:none;border:0">👁</button>
            </div>
            @error('password')<div class="err">{{ $message }}</div>@enderror

            <label for="p2">Konfirmasi Kata Sandi</label>
            <input class="in" id="p2" name="password_confirmation" type="password" placeholder="Ulangi kata sandi" autocomplete="new-password" required>

            <label style="margin-top:14px"><input type="checkbox" name="agree" value="1" required style="margin-right:6px">Saya menyetujui <b>tata tertib perpustakaan</b> dan bersedia membayar denda apabila terlambat mengembalikan buku.</label>

            <button class="btn" style="width:100%;padding:13px;margin-top:14px">✓ Daftar &amp; Terbitkan Kartu Digital</button>
        </form>

        <div class="card" style="margin-top:14px;display:flex;justify-content:space-between;align-items:center;gap:10px;background:var(--b)">
            <div><b>Sudah punya akun?</b><br><span style="font-size:12px;color:var(--m)">Masuk menggunakan ID kartu atau NIK Anda.</span></div>
            <a class="btn k" href="{{ route('login', 'member') }}">Masuk →</a>
        </div>

        <div style="font-size:10px;color:var(--m);margin-top:10px">Demo terisi cepat → NIK bebas 16 digit (belum terdaftar), kata sandi: <code>rahasia123</code></div>
    </div>
</div>
@endsection
