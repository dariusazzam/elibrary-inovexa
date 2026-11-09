{{-- ========================================================================= --}}
{{-- PANEL AUDIT LOG & BACKUP SISTEM SUPER ADMIN                              --}}
{{-- ========================================================================= --}}

<div class="super-dashboard-container">
    {{-- Breadcrumb & Title --}}
    <div style="margin-bottom:20px">
        <div style="font-size:11px;color:#64748b;display:flex;align-items:center;gap:6px;margin-bottom:6px">
            <a href="{{ route('dashboard', 'ov') }}" style="color:#153223;font-weight:600">Konsol Super Admin</a>
            <span>&rsaquo;</span>
            <span style="color:#b45309;font-weight:600">Audit Log &amp; Backup Sistem</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
            <div>
                <h1 style="font-size:22px;font-weight:800;color:#111827;margin:0 0 4px">Audit Log &amp; Backup Sistem</h1>
                <p style="font-size:12px;color:#64748b;margin:0">Log keamanan komprehensif, pemantauan transaksi basis data, dan manajemen pemulihan darurat.</p>
            </div>
            <div style="display:flex;gap:8px">
                <button type="button" class="super-btn-glass" style="background:#fff;border:1px solid #d1d5db;color:#374151" onclick="toast('Mengunduh arsip log sistem...')">
                    📥 Unduh File Log (.log)
                </button>
                <button type="button" class="super-btn-primary" onclick="toast('Cadangan penuh database telah dimulai')">
                    💾 Buat Backup Sekarang
                </button>
            </div>
        </div>
    </div>

    {{-- Grid 3 Kartu Status Backup --}}
    <div class="super-kpi-grid" style="margin-bottom:20px">
        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <span class="super-kpi-badge mint">Proteksi Aktif</span>
            </div>
            <div class="super-kpi-label">STATUS INTEGRITAS DATABASE</div>
            <div class="super-kpi-value">100% <span class="super-kpi-unit">Aman</span></div>
            <div class="super-kpi-sub">Checksum SHA-256 Terverifikasi</div>
        </div>

        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon slate">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                </div>
                <span class="super-kpi-badge slate">Harian 03:00</span>
            </div>
            <div class="super-kpi-label">BACKUP OTOMATIS TERAKHIR</div>
            <div class="super-kpi-value">412 <span class="super-kpi-unit">MB</span></div>
            <div class="super-kpi-sub">Tersimpan di Cloud Bucket AWS S3</div>
        </div>

        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon amber">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
                <span class="super-kpi-badge amber">Firewall Fail2Ban</span>
            </div>
            <div class="super-kpi-label">ANOMALI TANGKAPAN 24 JAM</div>
            <div class="super-kpi-value">12 <span class="super-kpi-unit">Blokir</span></div>
            <div class="super-kpi-sub">Percobaan akses tidak sah dibendung</div>
        </div>

        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <span class="super-kpi-badge mint">91% Terpakai</span>
            </div>
            <div class="super-kpi-label">ALOKASI KAPSITAS CADANGAN</div>
            <div class="super-kpi-value">1.8 <span class="super-kpi-unit">/ 2.0 GB</span></div>
            <div class="super-kpi-sub">Sisa ruang cadangan: 200 MB</div>
        </div>
    </div>

    {{-- Tabel Riwayat Lengkap Audit Log --}}
    <div class="super-card" style="padding:22px">
        <div class="super-card-header" style="margin-bottom:16px">
            <div>
                <h2 class="super-card-title">Daftar Rekam Jejak Sistem (Audit Trails)</h2>
                <p class="super-card-desc">Riwayat perubahan hak akses, backup database, mutasi master data, dan peringatan perimeter keamanan.</p>
            </div>
            <div style="display:flex;gap:8px">
                <input class="in" type="text" placeholder="Cari IP, aksi, atau user..." style="width:220px;height:34px;font-size:11.5px;padding:6px 12px">
                <button type="button" class="btn" style="background:#153223;font-size:11.5px;padding:6px 14px">Cari</button>
            </div>
        </div>

        <div class="super-table-wrap">
            <table class="super-table">
                <thead>
                    <tr>
                        <th style="width:16%">WAKTU &amp; TANGGAL</th>
                        <th style="width:15%">KATEGORI</th>
                        <th style="width:20%">PENGGUNA / AKTOR</th>
                        <th style="width:34%">DETAIL AKTIVITAS</th>
                        <th style="width:15%">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>10:42:12 WIB</b><br><small style="color:#64748b">Hari ini</small></td>
                        <td><span class="super-audit-tag system">SISTEM</span></td>
                        <td><b>Root Admin</b><br><small style="color:#64748b">IP: 192.168.1.100</small></td>
                        <td>Penggantian otorisasi kredensial host database dengan TLS 1.3</td>
                        <td><span class="super-status-pill green">Sukses</span></td>
                    </tr>
                    <tr>
                        <td><b>09:15:07 WIB</b><br><small style="color:#64748b">Hari ini</small></td>
                        <td><span class="super-audit-tag backup">BACKUP</span></td>
                        <td><b>Automated Cron</b><br><small style="color:#64748b">Server Batch</small></td>
                        <td>Kompresi database repositori 412 MB dikirim ke AWS S3 Bucket ID: 41</td>
                        <td><span class="super-status-pill green">Sukses</span></td>
                    </tr>
                    <tr>
                        <td><b>08:30:44 WIB</b><br><small style="color:#64748b">Hari ini</small></td>
                        <td><span class="super-audit-tag role">ROLE RBAC</span></td>
                        <td><b>Budi Santoso</b><br><small style="color:#64748b">Admin Pegawai</small></td>
                        <td>Aktivasi akun Dini Satiya (24670081) menjadi Anggota Aktif Terdaftar</td>
                        <td><span class="super-status-pill green">Sukses</span></td>
                    </tr>
                    <tr>
                        <td><b>Kemarin 23:14</b><br><small style="color:#64748b">04 Nov 2026</small></td>
                        <td><span class="super-audit-tag firewall">SECURITY</span></td>
                        <td><b>Fail2Ban Gateway</b><br><small style="color:#dc2626">IP: 194.26.2.110</small></td>
                        <td>Pemblokiran otomatis alamat IP mencurigakan (12 percobaan gagal)</td>
                        <td><span class="super-status-pill amber">Diblokir</span></td>
                    </tr>
                    <tr>
                        <td><b>Kemarin 17:02</b><br><small style="color:#64748b">04 Nov 2026</small></td>
                        <td><span class="super-audit-tag role">PENGATURAN</span></td>
                        <td><b>Super Admin Ari</b><br><small style="color:#64748b">SA-2026-01</small></td>
                        <td>Pembaruan parameter durasi peminjaman standar 7 hari &amp; denda Rp 1.000</td>
                        <td><span class="super-status-pill green">Sukses</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
