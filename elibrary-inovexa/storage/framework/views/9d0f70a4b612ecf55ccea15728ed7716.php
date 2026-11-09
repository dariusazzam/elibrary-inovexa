<?php $__env->startSection('title', 'Membaca: ' . $b['t'] . ' — Inovexa Technologies'); ?>

<?php $__env->startSection('content'); ?>
<div style="background:var(--g);color:#fff;padding:12px 20px;border-bottom:1px solid rgba(255,255,255,.15);position:sticky;top:0;z-index:20">
    <div class="w" style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap">
        <div style="display:flex;align-items:center;gap:12px">
            <a href="<?php echo e(route('dashboard', 'elib')); ?>" style="color:#fff;text-decoration:none;font-weight:600;font-size:13px;padding:6px 12px;background:rgba(255,255,255,.12);border-radius:6px">← Tutup Buku</a>
            <div>
                <b style="font-size:15px"><?php echo e($b['t']); ?></b>
                <small style="display:block;color:#a9c0b2;font-size:11px"><?php echo e($b['a']); ?> · <?php echo e($b['c']); ?></small>
            </div>
        </div>
        <div style="display:flex;gap:8px;align-items:center">
            <span class="pill" style="background:rgba(255,255,255,.14);color:#fff">Mode Baca Digital</span>
            <button class="btn k" type="button" onclick="adjustFont(-1)" style="padding:6px 12px;font-size:12px">A-</button>
            <button class="btn k" type="button" onclick="adjustFont(1)" style="padding:6px 12px;font-size:12px">A+</button>
        </div>
    </div>
</div>

<div class="w" style="max-width:960px;margin:28px auto;padding:0 20px">
    <div style="display:grid;grid-template-columns:260px 1fr;gap:28px;align-items:start">
        <!-- Panel Navigasi Bab -->
        <aside class="card" style="position:sticky;top:80px">
            <div class="lbl">DAFTAR ISI</div>
            <h3 style="margin:4px 0 12px;font-size:16px">Bab &amp; Bagian</h3>
            <div style="display:flex;flex-direction:column;gap:6px">
                <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('elib.read', ['id' => $b['id'], 'bab' => $idx + 1])); ?>"
                       class="btn <?php echo e($currentChapterIndex === $idx ? '' : 'ghost'); ?>"
                       style="text-align:left;font-size:12px;padding:10px 12px;line-height:1.3">
                        <b>Bab <?php echo e($ch['n']); ?></b><br>
                        <span style="opacity:.85"><?php echo e($ch['title']); ?></span>
                        <small style="display:block;opacity:.65;font-size:10px;margin-top:2px">⏱ ~<?php echo e($ch['minutes']); ?> menit baca</small>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div style="border-top:1px solid var(--ln);margin-top:16px;padding-top:14px;font-size:11px;color:var(--m)">
                <b>Lokasi Fisik Buku:</b><br>
                <?php echo e($b['s']); ?>

                <div style="margin-top:8px">
                    <form method="POST" action="<?php echo e(route('reserve', $b['id'])); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn or" style="width:100%;font-size:11px;padding:6px 10px">🔖 Reservasi Buku Fisik</button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Lembar Bacaan -->
        <article class="card" style="padding:36px;line-height:1.8;background:var(--c)">
            <div style="display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--ln);padding-bottom:14px;margin-bottom:20px">
                <span class="pill" style="background:var(--b);color:var(--t)">Bab <?php echo e($currentChapter['n']); ?> dari <?php echo e(count($chapters)); ?></span>
                <span style="font-size:11px;color:var(--m)">Perkiraan waktu baca: <?php echo e($currentChapter['minutes']); ?> menit</span>
            </div>

            <h1 style="font-size:26px;line-height:1.2;margin:0 0 18px"><?php echo e($currentChapter['title']); ?></h1>

            <div id="reader-body" style="font-size:16px;color:var(--t);text-align:justify">
                <p><?php echo e($currentChapter['body']); ?></p>
                <p>Koleksi ini disediakan secara legal oleh Inovexa Technologies bagi seluruh anggota yang terdaftar. Gunakan kutipan ini dengan bijak untuk kepentingan pembelajaran dan riset akademis.</p>
                <blockquote style="margin:20px 0;padding:12px 18px;border-left:4px solid var(--g);background:var(--b);border-radius:6px;font-style:italic">
                    “Membaca adalah dialog sunyi antara pemikiran seorang pengarang dengan kehausan intelektual sang pembaca.”
                </blockquote>
                <p>Untuk menuntaskan seluruh bab, Anda dapat berkunjung langsung ke Gedung Utama Perpustakaan di <b><?php echo e($b['s']); ?></b> atau meminjam melalui kartu anggota digital Anda.</p>
            </div>

            <div style="border-top:1px solid var(--ln);margin-top:32px;padding-top:18px;display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap">
                <?php if($currentChapterIndex > 0): ?>
                    <a class="btn ghost" href="<?php echo e(route('elib.read', ['id' => $b['id'], 'bab' => $currentChapterIndex])); ?>">← Bab Sebelumnya</a>
                <?php else: ?>
                    <span></span>
                <?php endif; ?>

                <?php if($currentChapterIndex < count($chapters) - 1): ?>
                    <a class="btn" href="<?php echo e(route('elib.read', ['id' => $b['id'], 'bab' => $currentChapterIndex + 2])); ?>">Bab Selanjutnya (Bab <?php echo e($currentChapterIndex + 2); ?>) →</a>
                <?php else: ?>
                    <a class="btn or" href="<?php echo e(route('dashboard', 'elib')); ?>">✓ Selesai Membaca</a>
                <?php endif; ?>
            </div>
        </article>
    </div>
</div>

<script>
    let currentFontSize = 16;
    function adjustFont(delta) {
        currentFontSize = Math.max(13, Math.min(22, currentFontSize + delta));
        document.getElementById('reader-body').style.fontSize = currentFontSize + 'px';
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\reader.blade.php ENDPATH**/ ?>