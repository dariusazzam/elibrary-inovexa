@extends('layouts.app')
@php
    $r = session('user')['role'] ?? 'member';
    $u = session('user') ?? ['n' => 'Anggota', 'role' => 'member'];
    $isMember = $r === 'member';
    $userName = $u['n'] ?? ($r === 'admin' ? 'Budi Santoso' : ($r === 'super' ? 'Ari' : 'Anggota'));
    if ($r === 'super' && ($userName === 'Super Admin' || empty($userName))) {
        $userName = 'Ari';
    }
    $userNumber = $u['id'] ?? ($r === 'admin' ? 'NIP : ASN-2026-04' : ($r === 'super' ? 'NIP : INX-ADM-2026-04' : 'INX-2026'));
    if ($r === 'super' && ($userNumber === 'super' || empty($userNumber))) {
        $userNumber = 'NIP : INX-ADM-2026-04';
    }
    $userRole = $isMember ? 'Anggota Reguler' : ($r === 'admin' ? 'Admin Pegawai & Tata Kelola' : 'Super Admin');
    $firstLetter = $r === 'super' ? 'AR' : mb_strtoupper(mb_substr($userName, 0, 1));
    $tagLabel = $isMember ? 'PORTAL ANGGOTA' : ($r === 'admin' ? 'AKTIVITAS PETUGAS SIRKULASI' : 'KONSOL SUPER ADMIN');
@endphp

@section('title', ($r === 'admin' ? 'Dashboard Admin Pegawai' : ($r === 'super' ? 'Dashboard Super Admin' : 'Dashboard Anggota')) . ' — Inovexa Technologies')

@section('content')
<div class="figma-container">
    {{-- Sidebar Kiri Hijau Tua Persis Image 2 Figma --}}
    <aside class="figma-sidebar {{ $r === 'admin' ? 'figma-sidebar-admin' : ($r === 'super' ? 'figma-sidebar-super' : '') }}">
        {{-- Area Atas: Header Gambar Perpustakaan + Hamburger & Badge PORTAL ANGGOTA --}}
        @if($r === 'admin')
            <div class="figma-admin-brand">
                <img src="{{ asset('foto/logo.jpeg') }}" alt="Logo Inovexa">
                <span><b>Inovexa Library</b><small>Sistem Sirkulasi &amp; Tata Kelola</small></span>
            </div>
            <div class="figma-admin-user-card">
                <div class="figma-avatar-circle"><span>{{ $firstLetter }}</span></div>
                <div class="figma-user-meta">
                    <b>{{ $userName }}</b>
                    <small>{{ $userRole }}</small>
                    <div class="figma-user-id">{{ $userNumber }}</div>
                </div>
            </div>
            <div class="figma-admin-nav-label">{{ $tagLabel }}</div>
        @elseif($r === 'super')
            <div class="figma-admin-brand">
                <img src="{{ asset('foto/logo.jpeg') }}" alt="Logo Inovexa">
                <span><b>Inovexa Library</b><small>Sistem Sirkulasi &amp; Tata Kelola</small></span>
            </div>
            <div class="figma-super-user-card">
                <div class="figma-avatar-circle figma-avatar-super">
                    <span>AR</span>
                    <span class="figma-avatar-status-dot"></span>
                </div>
                <div class="figma-user-meta">
                    <b>Ari</b>
                    <small>Super Admin</small>
                    <div class="figma-user-id">NIP : INX-ADM-2026-04</div>
                </div>
            </div>
        @else
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
        @endif

        {{-- Navigasi Menu Vertikal Persis Image 2 Figma --}}
        <nav class="figma-side-nav">
            @foreach($menus as $m)
            @php
                $icons = [
                    'ov' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>',
                    'card' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>',
                    'loans' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
                    'resv' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>',
                    'elib' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
                    'notif' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>',
                    'circ' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                    'stock' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
                    'circ_return' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>',
                    'fines' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
                    'reports' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
                    'users' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                    'mem' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="10" r="2"/><line x1="15" y1="8" x2="17" y2="8"/><line x1="15" y1="12" x2="17" y2="12"/><path d="M7 16h4"/></svg>',
                    'roles' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
                    'sys' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .69.21 1.33.57 1.87z"/></svg>'
                ];
                $icon = $icons[$m[0]] ?? '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg>';
            @endphp
            @php
                $badges = [
                    'resv' => '<span style="width:6px;height:6px;border-radius:50%;background:#f59e0b;display:inline-block;margin-left:auto"></span>',
                    'notif' => '<span style="font-size:9px;font-weight:700;background:#d97706;color:#fff;padding:1px 6px;border-radius:99px;margin-left:auto">Baru</span>',
                ];
                $badge = $badges[$m[0]] ?? '';
            @endphp
            <a href="{{ route('dashboard', $m[0]) }}" class="figma-nav-item {{ ($menu ?? 'ov') === $m[0] ? 'active-pill' : '' }}">
                <span class="figma-nav-icon" style="display:inline-flex;align-items:center;justify-content:center;opacity:0.85">{!! $icon !!}</span>
                <span class="figma-nav-text">{{ $m[1] }}</span>
                {!! $badge !!}
            </a>
            @endforeach
        </nav>

        {{-- Widget Kapasitas Backup Khusus Super Admin --}}
        @if($r === 'super')
        <div class="figma-sidebar-backup-box">
            <div class="backup-box-header">
                <span>KAPASITAS BACKUP</span>
                <span class="backup-badge">84%</span>
            </div>
            <div class="backup-progress-track">
                <div class="backup-progress-fill" style="width: 84%"></div>
            </div>
            <div class="backup-box-footer">
                <span>2.1 TB dari 2.5 TB</span>
                <span class="backup-available">Tersedia 400 GB</span>
            </div>
        </div>
        @endif

        {{-- Bagian Bawah: Tombol Keluar Sistem --}}
        <div class="figma-side-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="figma-logout-btn">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 17l5-5-5-5"/><path d="M15 12H3"/><path d="M12 4h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"/></svg>
                    Keluar Sistem (Logout)
                </button>
            </form>
        </div>
    </aside>

    {{-- Area Konten Utama Kanan Persis Image 2 Figma --}}
    <div class="figma-main-wrapper">
        {{-- Top Header Bar --}}
        @if($r === 'super')
        <header class="figma-topbar figma-topbar-light figma-topbar-super">
            <div class="figma-search-pill figma-search-pill-light" style="max-width:540px;flex:1">
                <span class="figma-search-icon" style="color:#94a3b8">🔍</span>
                <input type="text" placeholder="Cari akun pengguna, role, log audit, atau ISBN...">
            </div>

            <div class="figma-topbar-actions">
                <div class="figma-server-status-pill">
                    <span class="figma-dot-green"></span>
                    <span>Database Server: Normal</span>
                </div>
                <button type="button" class="figma-bell-btn figma-bell-btn-light" title="Notifikasi" onclick="window.location='{{ route('dashboard', 'sys') }}'">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <span class="figma-bell-dot" style="background:#ea580c"></span>
                </button>
                <div class="figma-topbar-user-pill">
                    <div class="figma-topbar-user-info" style="text-align:right">
                        <span class="topbar-user-name" style="font-weight:700">Ari</span>
                        <span class="topbar-user-role" style="color:#64748b;font-size:10.5px">Super Admin / Kepala TI</span>
                    </div>
                    <div class="figma-topbar-user-avatar" style="background:#0f172a;color:#fff;font-weight:700;font-size:12px;width:34px;height:34px;border-radius:50%;display:grid;place-items:center">AR</div>
                </div>
            </div>
        </header>
        @elseif($r === 'admin')
        <header class="figma-topbar figma-topbar-light">
            <div class="figma-search-pill figma-search-pill-light" style="max-width:440px">
                <span class="figma-search-icon" style="color:#94a3b8">🔍</span>
                <input type="text" placeholder="Cari data anggota, ISBN buku, barcode transaksi...">
            </div>

            <div class="figma-topbar-actions">
                <div class="figma-time-badge figma-time-badge-light">
                    <span class="figma-dot-green"></span>
                    <small>Layanan Aktif: 08:00 - 16:30 WIB</small>
                </div>
                <button type="button" class="figma-bell-btn figma-bell-btn-light" title="Scan Barcode" onclick="toast('Pemindai barcode siap digunakan')" style="padding:0 14px !important;border-radius:99px !important;background:#000 !important;color:#fff !important;font-size:11px !important;font-weight:600 !important;display:inline-flex !important;align-items:center !important;gap:6px !important;width:auto !important;height:34px !important;line-height:34px !important;border:none !important;cursor:pointer !important;white-space:nowrap !important">
                    <span style="font-size:13px">▦</span> Scan Barcode
                </button>
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
        @elseif(($menu ?? '') === 'card' || ($menu ?? '') === 'resv')
        <header class="figma-topbar figma-topbar-light">
            <div class="figma-search-pill figma-search-pill-light">
                <span class="figma-search-icon" style="color:#94a3b8">🔍</span>
                <input type="text" placeholder="Cari koleksi katalog, judul buku, atau ISBN...">
            </div>

            <div class="figma-topbar-actions">
                <div class="figma-time-badge figma-time-badge-light">
                    <span class="figma-dot-green"></span>
                    <small>Layanan Sirkulasi Buka • 08.00 - 20.00 WIB</small>
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
            <div class="figma-search-pill figma-search-pill-light" style="max-width:380px">
                <span class="figma-search-icon" style="color:#94a3b8">🔍</span>
                <input type="text" placeholder="Cari judul buku, pengarang, ISBN katalog...">
            </div>

            <div class="figma-topbar-actions">
                <div class="figma-time-badge figma-time-badge-light">
                    <span class="figma-dot-green"></span>
                    <small>Layanan Aktif: 08:00 - 20:00 WIB</small>
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
            @php
                $panelView = match (true) {
                    $r === 'super' && $menu === 'ov' => 'panels.ov',
                    $r === 'super' && $menu === 'mem' => 'panels.mem',
                    $r === 'super' && $menu === 'stock' => 'panels.stock-super',
                    $r === 'super' && $menu === 'circ' => 'panels.circ-super',
                    $r === 'super' && $menu === 'resv' => 'panels.resv-admin',
                    $r === 'super' && $menu === 'elib' => 'panels.elib-admin',
                    $r === 'super' && $menu === 'reports' => 'panels.reports',
                    $r === 'admin' && $menu === 'circ' => 'panels.mem',
                    $r === 'admin' && $menu === 'resv' => 'panels.resv-admin',
                    $r === 'admin' && $menu === 'notif' => 'panels.elib-admin',
                    default => 'panels.' . $menu,
                };
            @endphp
            @if(view()->exists($panelView))
                @include($panelView)
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
