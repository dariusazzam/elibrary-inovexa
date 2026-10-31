@extends('layouts.app')
@section('title', 'Lupa Kata Sandi — Inovexa Public Library')

@section('content')
<div class="row" style="max-width:1100px;margin:0 auto;padding:16px 20px 0;align-items:center">
    <a href="{{ route('login', 'member') }}" style="font-size:12px;color:var(--t);text-decoration:none">← Kembali ke Halaman Masuk</a>
    <span class="pill" style="background:#fbe9d6;color:var(--o)">Pemulihan Mandiri</span>
</div>

<div class="lg" style="min-height:0;padding-top:12px">
    <div class="lp">
        <div class="logo"><i style="background:#fff;color:var(--g)">▤</i><div>Inovexa Public Library<small style="color:#a9c0b2">PEMULIHAN AKSES</small></div></div>
        <span class="tag" style="align-self:start">Atur Ulang Sandi Anggota</span>
        <h2>Pulihkan Sandi Portal Anda.</h2>
        <span style="font-size:12px;color:#c9d8cf">Masukkan ID Anggota perpustakaan atau 16 digit NIK yang terdaftar, lalu tentukan kata sandi baru Anda. Kata sandi akan langsung aktif.</span>
        <div class="note" style="background:rgba(255,255,255,.08);border-color:#fff;color:#fff;margin-top:auto">
            <b>Catatan untuk Petugas &amp; Admin:</b><br>
            Reset sandi untuk akun Admin Pegawai atau Super Admin wajib diajukan langsung ke Administrator Sistem di Lobi Utama demi keamanan sirkulasi.
        </div>
    </div>

    <div class="rp">
        <h2 style="font-size:26px;margin:0">Atur Ulang Kata Sandi</h2>
        <span style="color:var(--m);font-size:12px">Masukkan identitas akun yang ingin Anda perbarui.</span>

        <form method="POST" action="{{ route('password.reset') }}" style="margin-top:10px">
            @csrf

            <label for="uid">Nomor ID Anggota (INX-••••) atau 16 Digit NIK</label>
            <input class="in" id="uid" name="id" value="{{ old('id', 'INX-2026-8820') }}" placeholder="Contoh: INX-2026-8820 atau 3271040801990002" required>
            @error('id')<div class="err">{{ $message }}</div>@enderror

            <label for="p1">Kata Sandi Baru (minimal 6 karakter)</label>
            <div style="position:relative">
                <input class="in" id="p1" name="password" type="password" placeholder="••••••" autocomplete="new-password" required>
                <button type="button" onclick="eye('p1','p2')" aria-label="Tampilkan sandi" style="position:absolute;right:8px;top:8px;background:none;border:0">👁</button>
            </div>
            @error('password')<div class="err">{{ $message }}</div>@enderror

            <label for="p2">Konfirmasi Kata Sandi Baru</label>
            <input class="in" id="p2" name="password_confirmation" type="password" placeholder="Ulangi kata sandi baru" autocomplete="new-password" required>

            <button class="btn" style="width:100%;padding:13px;margin-top:14px">Simpan Kata Sandi Baru →</button>
        </form>

        <div style="font-size:10px;color:var(--m);margin-top:14px">Contoh demo: ID <code>INX-2026-8820</code> (Herdman) sandi default <code>123456</code>.</div>
    </div>
</div>
@endsection
