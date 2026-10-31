<?php
    $r = session('user')['role'] ?? 'member';
    $u = session('user') ?? ['n' => 'Anggota', 'role' => 'member'];
    $isMember = $r === 'member';
    $userName = $u['n'] ?? ($r === 'admin' ? 'Budi Santoso' : 'Anggota');
    $userNumber = $u['id'] ?? ($r === 'admin' ? 'NIP : ASN-2026-04' : 'INX-2026');
    $userRole = $isMember ? 'Anggota Reguler' : ($r === 'admin' ? 'Admin Pegawai & Tata Kelola' : 'Super Admin');
    $firstLetter = mb_strtoupper(mb_substr($userName, 0, 1));
    $tagLabel = $isMember ? 'PORTAL ANGGOTA' : ($r === 'admin' ? 'AKTIVITAS PETUGAS SIRKULASI' : 'KONSOL SUPER ADMIN');
?>

<?php $__env->startSection('title', ($r === 'admin' ? 'Dashboard Admin Pegawai' : ($r === 'super' ? 'Konsol Super Admin' : 'Dashboard Anggota')) . ' — Inovexa Technologies'); ?>

<?php $__env->startSection('content'); ?>
<div class="figma-container">
    
    <aside class="figma-sidebar <?php echo e($r === 'admin' ? 'figma-sidebar-admin' : ''); ?>">
        
        <?php if($r === 'admin'): ?>
            <div class="figma-admin-brand">
                <img src="<?php echo e(asset('foto/logo.jpeg')); ?>" alt="Logo Inovexa">
                <span><b>Inovexa Library</b><small>Sistem Sirkulasi &amp; Tata Kelola</small></span>
            </div>
            <div class="figma-admin-user-card">
                <div class="figma-avatar-circle"><span><?php echo e($firstLetter); ?></span></div>
                <div class="figma-user-meta">
                    <b><?php echo e($userName); ?></b>
                    <small><?php echo e($userRole); ?></small>
                    <div class="figma-user-id"><?php echo e($userNumber); ?></div>
                </div>
            </div>
            <div class="figma-admin-nav-label"><?php echo e($tagLabel); ?></div>
        <?php else: ?>
            <div class="figma-sidebar-header-bg">
                <div class="figma-header-top-row">
                    <button type="button" class="figma-burger-btn" aria-label="Menu">
                        <span></span><span></span><span></span>
                    </button>
                    <span class="figma-portal-tag"><?php echo e($tagLabel); ?></span>
                </div>

                <div class="figma-user-badge-row">
                    <div class="figma-avatar-circle">
                        <span><?php echo e($firstLetter); ?></span>
                    </div>
                    <div class="figma-user-meta">
                        <b><?php echo e($userName); ?></b>
                        <small><?php echo e($userRole); ?></small>
                        <div class="figma-user-id"><?php echo e($userNumber); ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        <nav class="figma-side-nav">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
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
                    'roles' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
                    'sys' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .69.21 1.33.57 1.87z"/></svg>'
                ];
                $icon = $icons[$m[0]] ?? '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg>';
            ?>
            <?php
                $badges = [
                    'resv' => '<span style="width:6px;height:6px;border-radius:50%;background:#f59e0b;display:inline-block;margin-left:auto"></span>',
                    'notif' => '<span style="font-size:9px;font-weight:700;background:#d97706;color:#fff;padding:1px 6px;border-radius:99px;margin-left:auto">Baru</span>',
                ];
                $badge = $badges[$m[0]] ?? '';
            ?>
            <a href="<?php echo e(route('dashboard', $m[0])); ?>" class="figma-nav-item <?php echo e(($menu ?? 'ov') === $m[0] ? 'active-pill' : ''); ?>">
                <span class="figma-nav-icon" style="display:inline-flex;align-items:center;justify-content:center;opacity:0.85"><?php echo $icon; ?></span>
                <span class="figma-nav-text"><?php echo e($m[1]); ?></span>
                <?php echo $badge; ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>

        
        <div class="figma-side-bottom">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="figma-logout-btn">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 17l5-5-5-5"/><path d="M15 12H3"/><path d="M12 4h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"/></svg>
                    Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    
    <div class="figma-main-wrapper">
        
        <?php if($r === 'admin'): ?>
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
                <button type="button" class="figma-bell-btn figma-bell-btn-light" title="Notifikasi" onclick="window.location='<?php echo e(route('dashboard', 'notif')); ?>'">
                    <span>🔔</span>
                    <span class="figma-bell-dot"></span>
                </button>
                <div class="figma-topbar-user-pill">
                    <div class="figma-topbar-user-avatar"><?php echo e($firstLetter); ?></div>
                    <div class="figma-topbar-user-info">
                        <span class="topbar-user-name"><?php echo e($userName); ?></span>
                        <span class="topbar-user-role"><?php echo e($userRole); ?></span>
                    </div>
                </div>
            </div>
        </header>
        <?php elseif(($menu ?? '') === 'card' || ($menu ?? '') === 'resv'): ?>
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
                <button type="button" class="figma-bell-btn figma-bell-btn-light" title="Notifikasi" onclick="window.location='<?php echo e(route('dashboard', 'notif')); ?>'">
                    <span>🔔</span>
                    <span class="figma-bell-dot"></span>
                </button>
                <div class="figma-topbar-user-pill">
                    <div class="figma-topbar-user-avatar"><?php echo e($firstLetter); ?></div>
                    <div class="figma-topbar-user-info">
                        <span class="topbar-user-name"><?php echo e($userName); ?></span>
                        <span class="topbar-user-role"><?php echo e($userRole); ?></span>
                    </div>
                </div>
            </div>
        </header>
        <?php else: ?>
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
                <button type="button" class="figma-bell-btn figma-bell-btn-light" title="Notifikasi" onclick="window.location='<?php echo e(route('dashboard', 'notif')); ?>'">
                    <span>🔔</span>
                    <span class="figma-bell-dot"></span>
                </button>
                <div class="figma-topbar-user-pill">
                    <div class="figma-topbar-user-avatar"><?php echo e($firstLetter); ?></div>
                    <div class="figma-topbar-user-info">
                        <span class="topbar-user-name"><?php echo e($userName); ?></span>
                        <span class="topbar-user-role"><?php echo e($userRole); ?></span>
                    </div>
                </div>
            </div>
        </header>
        <?php endif; ?>

        
        <main class="figma-page-content">
            <?php
                $panelView = match (true) {
                    $r === 'admin' && $menu === 'circ' => 'panels.mem',
                    $r === 'admin' && $menu === 'resv' => 'panels.resv-admin',
                    $r === 'admin' && $menu === 'notif' => 'panels.elib-admin',
                    default => 'panels.' . $menu,
                };
            ?>
            <?php if(view()->exists($panelView)): ?>
                <?php echo $__env->make($panelView, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('panels.ov', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </main>
    </div>
</div>


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views/dashboard.blade.php ENDPATH**/ ?>