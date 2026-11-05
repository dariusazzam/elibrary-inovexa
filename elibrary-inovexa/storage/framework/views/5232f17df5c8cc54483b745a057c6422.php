<?php
    $rows = [
        ['Cari & reservasi katalog', '✓', '✓', '✓'],
        ['Kartu digital', '✓', '–', '–'],
        ['Sirkulasi & denda', '–', '✓', '✓'],
        ['Stok buku & eksemplar', '–', '✓', '✓'],
        ['Kelola pengguna & peran', '–', '–', '✓'],
        ['Pengaturan sistem', '–', '–', '✓'],
    ];
?>

<div class="access-page-wrapper">
    <div class="access-top-header">
        <div class="access-breadcrumb-bar">
            <a href="<?php echo e(route('dashboard', 'ov')); ?>" class="access-breadcrumb-link">Dashboard Super Admin</a>
            <span class="access-breadcrumb-sep">&gt;</span>
            <a href="<?php echo e(route('dashboard', 'users')); ?>" class="access-breadcrumb-link">Kelola Akun &amp; Hak Akses</a>
            <span class="access-breadcrumb-sep">&gt;</span>
            <span class="access-breadcrumb-active">Matriks Hak Akses RBAC</span>
        </div>

        <div class="access-header-main-row">
            <div class="access-header-intro">
                <h1 class="access-page-title">Matriks Kebijakan Peran &amp; Hak Akses (RBAC v2.4)</h1>
                <p class="access-page-subtext">
                    Pemetaan hierarki hak akses sistem perpustakaan menurut matriks Role-Based Access Control antar modul terpadu.
                </p>
            </div>
            <div class="access-top-btn-group">
                <a href="<?php echo e(route('dashboard', 'users')); ?>" class="access-btn-dark-cta">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    <span>Kembali ke Kelola Akses</span>
                </a>
            </div>
        </div>
    </div>

    <div class="access-table-card" style="margin-top: 10px;">
        <table class="access-users-table">
            <thead>
                <tr>
                    <th style="width:40%">FITUR &amp; MODUL SISTEM</th>
                    <th style="width:20%;text-align:center">ANGGOTA</th>
                    <th style="width:20%;text-align:center">ADMIN PEGAWAI</th>
                    <th style="width:20%;text-align:center">SUPER ADMIN</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="font-weight:600;color:#0f172a"><?php echo e($row[0]); ?></td>
                    <td style="text-align:center">
                        <?php if($row[1] === '✓'): ?>
                            <span class="matrix-pill full">✓ Diizinkan</span>
                        <?php else: ?>
                            <span class="matrix-pill dash">–</span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center">
                        <?php if($row[2] === '✓'): ?>
                            <span class="matrix-pill full">✓ Diizinkan</span>
                        <?php else: ?>
                            <span class="matrix-pill dash">–</span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center">
                        <?php if($row[3] === '✓'): ?>
                            <span class="matrix-pill full" style="background:#0f172a;color:#fff">✓ Full Access</span>
                        <?php else: ?>
                            <span class="matrix-pill dash">–</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\Users\userl\sip-perpus-inovexa\elibrary-inovexa\resources\views/panels/roles.blade.php ENDPATH**/ ?>