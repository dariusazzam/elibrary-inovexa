@extends('layouts.app')
@section('title', 'Dashboard Anggota — Inovexa Library')

@section('content')
@php
    $r = $u['role'] ?? 'member';
    $isMember = $r === 'member';
    $userName = $isMember ? 'Herdman' : ($u['n'] ?? 'Petugas Budi Santoso');
    $userNumber = $isMember ? 'INX - 2026 - 8820' : ($u['id'] ?? 'admin');
    $userRole = $isMember ? 'Anggota Reguler' : 'Admin Pegawai Sirkulasi';
@endphp

<div class="figma-container">
    {{-- Sidebar Kiri Hijau Tua Persis Image 2 Figma --}}
    <aside class="figma-sidebar">
        {{-- Area Atas: Header Gambar Perpustakaan + Hamburger & Badge PORTAL ANGGOTA --}}
        <div class="figma-sidebar-header-bg">
            <div class="figma-header-top-row">
                <button type="button" class="figma-burger-btn" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
                <span class="figma-portal-tag">PORTAL ANGGOTA</span>
            </div>

            <div class="figma-user-badge-row">
                <div class="figma-avatar-circle">
                    <span>H</span>
                </div>
                <div class="figma-user-meta">
                    <b>{{ $userName }}</b>
                    <small>{{ $userRole }}</small>
                    <div class="figma-user-id">{{ $userNumber }}</div>
                </div>
            </div>
        </div>

        {{-- Navigasi Menu Vertikal Persis Image 2 Figma --}}
        <nav class="figma-side-nav">
            {{-- 1. Dashboard --}}
            <a href="{{ route('dashboard', 'ov') }}" class="figma-nav-item {{ ($menu ?? 'ov') === 'ov' ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">📊</span>
                <span class="figma-nav-text">Dashboard</span>
            </a>

            {{-- 2. Profil & Kartu Digital --}}
            <a href="{{ route('dashboard', 'card') }}" class="figma-nav-item {{ ($menu ?? '') === 'card' ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">🪪</span>
                <span class="figma-nav-text">Profil &amp; Kartu Digital</span>
            </a>

            {{-- 3. Peminjaman & Denda --}}
            <a href="{{ route('dashboard', 'loans') }}" class="figma-nav-item {{ ($menu ?? '') === 'loans' ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">📖</span>
                <span class="figma-nav-text">Peminjaman &amp; Denda</span>
                <span class="figma-badge-green">2</span>
            </a>

            {{-- 4. Reservasi Buku --}}
            <a href="{{ route('dashboard', 'resv') }}" class="figma-nav-item {{ ($menu ?? '') === 'resv' ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">🪑</span>
                <span class="figma-nav-text">Reservasi Buku</span>
                <span class="figma-dot-yellow"></span>
            </a>

            {{-- 5. E-Library & Baca --}}
            <a href="{{ route('dashboard', 'elib') }}" class="figma-nav-item {{ ($menu ?? '') === 'elib' ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">📱</span>
                <span class="figma-nav-text">E-Library &amp; Baca</span>
            </a>

            {{-- 6. Notifikasi --}}
            <a href="{{ route('dashboard', 'notif') }}" class="figma-nav-item {{ ($menu ?? '') === 'notif' ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">🔔</span>
                <span class="figma-nav-text">Notifikasi</span>
                <span class="figma-badge-orange">Baru</span>
            </a>
        </nav>

        {{-- Bagian Bawah: Tombol Keluar Sistem --}}
        <div class="figma-side-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="figma-logout-btn">
                    <span>🚪</span> Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    {{-- Area Konten Utama Kanan Persis Image 2 Figma --}}
    <div class="figma-main-wrapper">
        {{-- Top Header Bar --}}
        @if(($menu ?? '') === 'card')
        <header class="figma-topbar figma-topbar-light">
            <div class="figma-search-pill figma-search-pill-light">
                <span class="figma-search-icon" style="color:#94a3b8">🔍</span>
                <input type="text" placeholder="Cari koleksi katalog, judul buku, atau ISBN..." onkeydown="if(event.key==='Enter') window.location='{{ route('dashboard', 'cat') }}'">
            </div>

            <div class="figma-topbar-actions">
                <div class="figma-time-badge figma-time-badge-light">
                    <span class="figma-dot-green"></span>
                    <small>Layanan Sirkulasi Buka • 08:00 - 20:00 WIB</small>
                </div>
                <button type="button" class="figma-bell-btn figma-bell-btn-light" title="Notifikasi" onclick="window.location='{{ route('dashboard', 'notif') }}'">
                    <span>🔔</span>
                    <span class="figma-bell-dot"></span>
                </button>
                <div class="figma-topbar-user-pill">
                    <div class="figma-topbar-user-avatar">H</div>
                    <div class="figma-topbar-user-info">
                        <span class="topbar-user-name">{{ $userName }}</span>
                        <span class="topbar-user-role">{{ $userRole }}</span>
                    </div>
                </div>
            </div>
        </header>
        @else
        <header class="figma-topbar">
            <div class="figma-topbar-title-wrap">
                <h1 class="figma-topbar-title">Dashboard Anggota</h1>
                <small class="figma-topbar-sub">Sistem Informasi Perpustakaan &amp; E-Library Inovexa</small>
            </div>

            <div class="figma-search-pill">
                <span class="figma-search-icon">🔍</span>
                <input type="text" placeholder="Cari judul buku, pengarang, ISBN, atau e-book...">
            </div>

            <div class="figma-topbar-actions">
                <div class="figma-time-badge">
                    <span class="figma-dot-green"></span>
                    <small>Layanan Sirkulasi Aktif: 08.00 - 20.00 WIB</small>
                </div>
                <button type="button" class="figma-bell-btn" title="Notifikasi" onclick="window.location='{{ route('dashboard', 'notif') }}'">
                    <span>🔔</span>
                    <span class="figma-bell-dot"></span>
                </button>
            </div>
        </header>
        @endif

        {{-- Konten Utama Panel --}}
        <main class="figma-page-content">
            @if(view()->exists('panels.' . $menu))
                @include('panels.' . $menu)
            @else
                @include('panels.ov')
            @endif
        </main>
    </div>
</div>

{{-- Modal Kontak / Bantuan Sirkulasi --}}
<div class="modal" id="contact-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('contact-modal')">
    <div class="modal-box">
        <button class="modal-close" type="button" onclick="closeModal('contact-modal')">×</button>
        <div class="lbl">MEJA SIRKULASI TERPADU</div>
        <h2 style="margin:4px 0 10px">Layanan Konsultasi &amp; Pustakawan</h2>
        <p style="color:var(--m);font-size:13px;line-height:1.5">Hubungi staf sirkulasi bila memerlukan bantuan perpanjangan masa pinjam, loker drop-box, reservasi meja baca, atau validasi kartu.</p>
        <div class="card" style="background:#f9f8f6;margin-top:14px;font-size:13px;line-height:1.8">
            <b>☎ Telepon / WA Sirkulasi:</b> 0812-9876-5432<br>
            <b>✉ Pos-el Pelayanan:</b> sirkulasi@inovexa.test<br>
            <b>📍 Lokasi:</b> Lantai 1 Meja Sirkulasi Sentral (Buka 08.00 - 20.00 WIB)
        </div>
        <button class="btn" type="button" style="width:100%;margin-top:18px" onclick="closeModal('contact-modal')">Tutup Jendela</button>
    </div>
</div>
@endsection
