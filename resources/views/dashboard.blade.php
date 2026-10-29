@extends('layouts.app')
@php
    $r = session('user')['role'] ?? 'member';
    $u = session('user') ?? ['n' => 'Anggota', 'role' => 'member'];
    $isMember = $r === 'member';
    $userName = $u['n'] ?? ($r === 'admin' ? 'Budi Santoso' : 'Anggota');
    $userNumber = $u['id'] ?? ($r === 'admin' ? 'NIP : ASN-2026-04' : 'INX-2026');
    $userRole = $isMember ? 'Anggota Reguler' : ($r === 'admin' ? 'Admin Pegawai & Tata Kelola' : 'Super Admin');
    $firstLetter = mb_strtoupper(mb_substr($userName, 0, 1));
    $tagLabel = $isMember ? 'PORTAL ANGGOTA' : ($r === 'admin' ? 'AKTIVITAS PETUGAS SIRKULASI' : 'KONSOL SUPER ADMIN');
@endphp

@section('title', ($r === 'admin' ? 'Dashboard Admin Pegawai' : ($r === 'super' ? 'Konsol Super Admin' : 'Dashboard Anggota')) . ' — Inovexa Library')

@section('content')
<div class="figma-container">
    {{-- Sidebar Kiri Hijau Tua Persis Image 2 Figma --}}
    <aside class="figma-sidebar">
        {{-- Area Atas: Header Gambar Perpustakaan + Hamburger & Badge PORTAL ANGGOTA --}}
        <div class="figma-sidebar-header-bg">
            <div class="figma-header-top-row">
                <button type="button" class="figma-burger-btn" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
                <span class="figma-portal-tag">{{ $tagLabel }}</span>
            </div>

            <div class="figma-user-badge-row">
                <div class="figma-avatar-circle">
                    <span>{{ $firstLetter }}</span>
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
            @foreach($menus as $m)
            @php
                $icons = [
                    'ov' => '📊',
                    'circ' => '👥',
                    'stock' => '📚',
                    'circ_return' => '🔄',
                    'fines' => '💵',
                    'resv' => '📌',
                    'notif' => '🔔',
                    'reports' => '📈',
                ];
                $icon = $icons[$m[0]] ?? '📄';
            @endphp
            <a href="{{ route('dashboard', $m[0]) }}" class="figma-nav-item {{ ($menu ?? 'ov') === $m[0] ? 'active-pill' : '' }}">
                <span class="figma-nav-icon">{{ $icon }}</span>
                <span class="figma-nav-text">{{ $m[1] }}</span>
            </a>
            @endforeach
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
                    <div class="figma-topbar-user-avatar">{{ $firstLetter }}</div>
                    <div class="figma-topbar-user-info">
                        <span class="topbar-user-name">{{ $userName }}</span>
                        <span class="topbar-user-role">{{ $userRole }}</span>
                    </div>
                </div>
            </div>
        </header>
        @else
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
                    <div class="figma-topbar-user-avatar">{{ $firstLetter }}</div>
                    <div class="figma-topbar-user-info">
                        <span class="topbar-user-name">{{ $userName }}</span>
                        <span class="topbar-user-role">{{ $userRole }}</span>
                    </div>
                </div>
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
