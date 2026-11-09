



<div class="super-dashboard-container" style="background:#f8fafc;padding:24px;border-radius:16px;">
    
    <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:16px;margin-bottom:24px">
        <div>
            <div style="font-size:11px;color:#64748b;display:flex;align-items:center;gap:6px;margin-bottom:6px">
                <a href="<?php echo e(route('dashboard', 'ov')); ?>" style="color:#153223;font-weight:600;text-decoration:none">Konsol Super Admin</a>
                <span>&rsaquo;</span>
                <span style="color:#b45309;font-weight:600">Audit Log &amp; Backup Sistem</span>
            </div>
            <h1 style="font-size:24px;font-weight:800;color:#0f172a;margin:0 0 6px">Kedaulatan &amp; Keandalan Basis Data Perpustakaan</h1>
            <div style="display:inline-flex;align-items:center;gap:8px;background:#153223;color:#fff;padding:6px 14px;border-radius:20px;font-size:11.5px;font-weight:600;box-shadow:0 2px 4px rgba(0,0,0,0.1)">
                <span style="width:8px;height:8px;background:#22c55e;border-radius:50%;display:inline-block"></span>
                OTORISASI ROOT &amp; TATA KELOLA KETAHANAN DATA (DISASTER RECOVERY)
            </div>
            <p style="font-size:13px;color:#475569;margin:8px 0 0;max-width:750px">
                Pusat kendali audit forensik WORM, replikasi instan WAL-G, serta validasi ketahanan pemulihan sistem terdistribusi Perpustakaan Inovexa.
            </p>
        </div>

        
        <div style="display:flex;flex-direction:column;gap:8px;min-width:240px">
            <button type="button" style="background:#111827;color:#fff;border:none;padding:10px 18px;border-radius:8px;font-weight:700;font-size:12.5px;display:flex;align-items:center;justify-content:center;gap:8px;cursor:pointer;box-shadow:0 2px 4px rgba(0,0,0,0.15)" onclick="toast('Memicu pencadangan basis data penuh...')">
                <span>⚡</span> Trigger Backup Manual
            </button>
            <button type="button" style="background:#fff;color:#111827;border:1px solid #cbd5e1;padding:9px 18px;border-radius:8px;font-weight:600;font-size:12px;display:flex;align-items:center;justify-content:center;gap:8px;cursor:pointer" onclick="toast('Integritas SHA-256 terverifikasi valid.')">
                🔒 Verifikasi Integritas SHA-256
            </button>
            <button type="button" style="background:#fff;color:#111827;border:1px solid #cbd5e1;padding:9px 18px;border-radius:8px;font-weight:600;font-size:12px;display:flex;align-items:center;justify-content:center;gap:8px;cursor:pointer" onclick="toast('Mengunduh arsip snapshot .tar.enc...')">
                📥 Unduh Snapshot (.tar.enc)
            </button>
        </div>
    </div>

    
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:16px;margin-bottom:24px">
        
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05);position:relative">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px">
                <span style="font-size:11px;font-weight:700;color:#64748b;letter-spacing:0.5px">SNAPSHOT TERKIRIM</span>
                <span style="font-size:16px">☁️</span>
            </div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:6px">
                <span style="font-size:28px;font-weight:900;color:#0f172a">100%</span>
                <span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:2px 8px;border-radius:6px">SUKSES</span>
            </div>
            <div style="font-size:11.5px;color:#475569;display:flex;justify-content:space-between">
                <span>Pukul 03:00 WIB</span>
                <span style="font-weight:600">4.2 GB (ZSTD)</span>
            </div>
            <div style="font-size:11px;color:#94a3b8;margin-top:6px;border-top:1px solid #f1f5f9;padding-top:6px">
                Batas retensi terjadwal: 30 hari hal buffer
            </div>
        </div>

        
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05);position:relative">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px">
                <span style="font-size:11px;font-weight:700;color:#64748b;letter-spacing:0.5px">INTEGRITAS BASIS DATA</span>
                <span style="font-size:16px">🛡️</span>
            </div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:6px">
                <span style="font-size:24px;font-weight:900;color:#0f172a">SHA-256</span>
                <span style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700;padding:2px 8px;border-radius:6px">VALID</span>
            </div>
            <div style="font-size:11.5px;color:#475569;display:flex;justify-content:space-between">
                <span>PostgreSQL Multi-Cluster</span>
                <span style="font-weight:600">Latensi 0ms</span>
            </div>
            <div style="font-size:11px;color:#94a3b8;margin-top:6px;border-top:1px solid #f1f5f9;padding-top:6px">
                Sinkronisasi Master - Replica konsisten
            </div>
        </div>

        
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05);position:relative">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px">
                <span style="font-size:11px;font-weight:700;color:#64748b;letter-spacing:0.5px">JEJAK AUDIT FORENSIK</span>
                <span style="font-size:16px">📋</span>
            </div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:6px">
                <span style="font-size:26px;font-weight:900;color:#0f172a">1.428.950</span>
                <span style="font-size:12px;font-weight:700;color:#475569">Baris</span>
            </div>
            <div style="font-size:11.5px;color:#475569;display:flex;justify-content:space-between">
                <span>Arsip WORM Immutability</span>
                <span style="background:#fef3c7;color:#92400e;font-size:10px;padding:1px 6px;border-radius:4px;font-weight:700">90 Hari Aktif</span>
            </div>
            <div style="font-size:11px;color:#94a3b8;margin-top:6px;border-top:1px solid #f1f5f9;padding-top:6px">
                Enkripsi SHA-512 per ringkasan blok audit
            </div>
        </div>

        
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05);position:relative">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px">
                <span style="font-size:11px;font-weight:700;color:#64748b;letter-spacing:0.5px">TARGET PEMULIHAN (RTO/RPO)</span>
                <span style="font-size:16px">⚡</span>
            </div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:6px">
                <span style="font-size:28px;font-weight:900;color:#0f172a">12 Menit</span>
                <span style="font-size:11px;font-weight:700;color:#64748b">RPO 0s</span>
            </div>
            <div style="font-size:11.5px;color:#475569;display:flex;justify-content:space-between">
                <span>SLA Kelangsungan Sistem</span>
                <span style="color:#16a34a;font-weight:700">99.99% Berencana</span>
            </div>
            <div style="font-size:11px;color:#94a3b8;margin-top:6px;border-top:1px solid #f1f5f9;padding-top:6px">
                Node Cadangan Multi-Region JKT &amp; CP R2
            </div>
        </div>
    </div>

    
    <div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start">
        
        <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:22px;box-shadow:0 1px 3px rgba(0,0,0,0.05)">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;margin-bottom:16px">
                <div>
                    <h2 style="font-size:16px;font-weight:800;color:#0f172a;margin:0 0 4px">Jejak Rekam Forensik &amp; Aktivitas Sistem</h2>
                    <p style="font-size:12px;color:#64748b;margin:0">Pencatatan real-time seluruh event administratif berkekuatan hukum dengan cap waktu NTP resmi.</p>
                </div>
                <div>
                    <button type="button" style="background:#f1f5f9;border:1px solid #cbd5e1;color:#334151;font-size:11.5px;font-weight:600;padding:6px 12px;border-radius:6px;cursor:pointer" onclick="toast('Mengekspor log ke format CSV & Syslog...')">
                        📥 Ekspor CSV / Syslog
                    </button>
                </div>
            </div>

            
            <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:16px;background:#f8fafc;padding:10px;border-radius:8px">
                <div style="flex:1;min-width:200px;position:relative">
                    <input type="text" placeholder="🔍  Cari IP, Aktor, Modul, Event ID..." style="width:100%;padding:7px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:12px;outline:none;background:#fff">
                </div>
                <div>
                    <select style="padding:7px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:12px;background:#fff;color:#334151">
                        <option>Level: Semua Tingkat</option>
                        <option>Info / Normal</option>
                        <option>Peringatan</option>
                        <option>Kritis / Blokir</option>
                    </select>
                </div>
                <div>
                    <select style="padding:7px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:12px;background:#fff;color:#334151">
                        <option>📅 Hari Ini</option>
                        <option>7 Hari Terakhir</option>
                        <option>Bulan Ini</option>
                    </select>
                </div>
            </div>

            
            <div style="overflow-x:auto">
                <table style="width:100%;border-collapse:collapse;text-align:left;font-size:12px">
                    <thead>
                        <tr style="border-bottom:2px solid #e2e8f0;color:#64748b;font-size:11px;text-transform:uppercase;letter-spacing:0.5px">
                            <th style="padding:10px 8px;width:18%">WAKTU (WIB)</th>
                            <th style="padding:10px 8px;width:18%">AKTOR &amp; PERAN</th>
                            <th style="padding:10px 8px;width:22%">MODUL &amp; AKSI</th>
                            <th style="padding:10px 8px;width:22%">HOST / ALAMAT IP</th>
                            <th style="padding:10px 8px;width:20%;text-align:right">STATUS FORENSIK</th>
                        </tr>
                    </thead>
                    <tbody style="color:#1e293b">
                        <tr style="border-bottom:1px solid #f1f5f9">
                            <td style="padding:12px 8px">
                                <strong style="color:#0f172a">11:28:14</strong><br>
                                <span style="font-size:10.5px;color:#64748b">26 Okt 2026</span>
                            </td>
                            <td style="padding:12px 8px">
                                <div style="display:flex;align-items:center;gap:6px">
                                    <span style="width:24px;height:24px;background:#153223;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:700">AR</span>
                                    <div>
                                        <strong style="font-size:11.5px">Ari (Root)</strong><br>
                                        <span style="font-size:10px;color:#64748b">NIP: INX-ADM-2026-04</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px 8px">
                                <span style="background:#f1f5f9;color:#334151;font-size:10.5px;padding:2px 6px;border-radius:4px;font-weight:600">Kelola Akun &amp; Hak Akses</span><br>
                                <span style="color:#0f172a;font-weight:500">Update Kebijakan 2FA Staf Loket</span>
                            </td>
                            <td style="padding:12px 8px">
                                <code style="font-size:11px;background:#f8fafc;padding:2px 6px;border-radius:4px;border:1px solid #e2e8f0">10.28.1.4</code><br>
                                <span style="font-size:10px;color:#64748b">Akses Lokal Perpustakaan</span>
                            </td>
                            <td style="padding:12px 8px;text-align:right">
                                <span style="background:#dcfce7;color:#166534;font-size:10.5px;padding:3px 8px;border-radius:6px;font-weight:700;display:inline-block">● BERHASIL (Verified)</span>
                            </td>
                        </tr>

                        <tr style="border-bottom:1px solid #f1f5f9">
                            <td style="padding:12px 8px">
                                <strong style="color:#0f172a">10:45:02</strong><br>
                                <span style="font-size:10.5px;color:#64748b">26 Okt 2026</span>
                            </td>
                            <td style="padding:12px 8px">
                                <div style="display:flex;align-items:center;gap:6px">
                                    <span style="width:24px;height:24px;background:#0284c7;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:700">BS</span>
                                    <div>
                                        <strong style="font-size:11.5px">Budi Santoso</strong><br>
                                        <span style="font-size:10px;color:#64748b">Admin Pegawai Sirkulasi</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px 8px">
                                <span style="background:#f1f5f9;color:#334151;font-size:10.5px;padding:2px 6px;border-radius:4px;font-weight:600">Sirkulasi &amp; Denda</span><br>
                                <span style="color:#0f172a;font-weight:500">Penerimaan Tunai KW-2026-1025-0144 Rp 4.000</span>
                            </td>
                            <td style="padding:12px 8px">
                                <code style="font-size:11px;background:#f8fafc;padding:2px 6px;border-radius:4px;border:1px solid #e2e8f0">192.168.1.182</code><br>
                                <span style="font-size:10px;color:#64748b">Terminal Loket #03</span>
                            </td>
                            <td style="padding:12px 8px;text-align:right">
                                <span style="background:#fef3c7;color:#92400e;font-size:10.5px;padding:3px 8px;border-radius:6px;font-weight:700;display:inline-block">✓ TERVALIDASI</span>
                            </td>
                        </tr>

                        <tr style="border-bottom:1px solid #f1f5f9">
                            <td style="padding:12px 8px">
                                <strong style="color:#0f172a">03:15:00</strong><br>
                                <span style="font-size:10.5px;color:#64748b">26 Okt 2026</span>
                            </td>
                            <td style="padding:12px 8px">
                                <div style="display:flex;align-items:center;gap:6px">
                                    <span style="width:24px;height:24px;background:#475569;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:700">CB</span>
                                    <div>
                                        <strong style="font-size:11.5px">Daemon Cron Backup</strong><br>
                                        <span style="font-size:10px;color:#64748b">System Automation</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px 8px">
                                <span style="background:#f1f5f9;color:#334151;font-size:10.5px;padding:2px 6px;border-radius:4px;font-weight:600">Backup Database</span><br>
                                <span style="color:#0f172a;font-weight:500">Otomatis Snapshot Harian db_inovexa_prod</span>
                            </td>
                            <td style="padding:12px 8px">
                                <code style="font-size:11px;background:#f8fafc;padding:2px 6px;border-radius:4px;border:1px solid #e2e8f0">db-master-01</code><br>
                                <span style="font-size:10px;color:#64748b">Buster Internal Pools</span>
                            </td>
                            <td style="padding:12px 8px;text-align:right">
                                <span style="background:#dcfce7;color:#166534;font-size:10.5px;padding:3px 8px;border-radius:6px;font-weight:700;display:inline-block">● SUKSES (4.2 GB)</span>
                            </td>
                        </tr>

                        <tr style="border-bottom:1px solid #f1f5f9">
                            <td style="padding:12px 8px">
                                <strong style="color:#0f172a">07:42:19</strong><br>
                                <span style="font-size:10.5px;color:#64748b">26 Okt 2026</span>
                            </td>
                            <td style="padding:12px 8px">
                                <div style="display:flex;align-items:center;gap:6px">
                                    <span style="width:24px;height:24px;background:#dc2626;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:700">⚠️</span>
                                    <div>
                                        <strong style="font-size:11.5px">Sistem Deteksi Anomali</strong><br>
                                        <span style="font-size:10px;color:#dc2626">IDS / IPS Sensor</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px 8px">
                                <span style="background:#fef2f2;color:#b91c1c;font-size:10.5px;padding:2px 6px;border-radius:4px;font-weight:600">Autentikasi</span><br>
                                <span style="color:#0f172a;font-weight:500">Brute Force Blocked (3x gagal login NIM 24670082)</span>
                            </td>
                            <td style="padding:12px 8px">
                                <code style="font-size:11px;background:#fef2f2;color:#b91c1c;padding:2px 6px;border-radius:4px;border:1px solid #fecaca">114.124.8.90</code><br>
                                <span style="font-size:10px;color:#64748b">Public ISP (Cellular IP)</span>
                            </td>
                            <td style="padding:12px 8px;text-align:right">
                                <span style="background:#fee2e2;color:#991b1b;font-size:10.5px;padding:3px 8px;border-radius:6px;font-weight:700;display:inline-block">🛑 BLOCKED / SUSPENDED</span>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:12px 8px">
                                <strong style="color:#0f172a">03:00:10</strong><br>
                                <span style="font-size:10.5px;color:#64748b">26 Okt 2026</span>
                            </td>
                            <td style="padding:12px 8px">
                                <div style="display:flex;align-items:center;gap:6px">
                                    <span style="width:24px;height:24px;background:#334151;color:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:10px;font-weight:700">📚</span>
                                    <div>
                                        <strong style="font-size:11.5px">Sistem E-Library</strong><br>
                                        <span style="font-size:10px;color:#64748b">Worker Scheduler</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px 8px">
                                <span style="background:#f1f5f9;color:#334151;font-size:10.5px;padding:2px 6px;border-radius:4px;font-weight:600">DRM Engine</span><br>
                                <span style="color:#0f172a;font-weight:500">Revoke Sesi Membaca Kadaluwarsa (12 akun)</span>
                            </td>
                            <td style="padding:12px 8px">
                                <code style="font-size:11px;background:#f8fafc;padding:2px 6px;border-radius:4px;border:1px solid #e2e8f0">dns-worker-82</code><br>
                                <span style="font-size:10px;color:#64748b">Cluster Kubernetes Node</span>
                            </td>
                            <td style="padding:12px 8px;text-align:right">
                                <span style="background:#f1f5f9;color:#475569;font-size:10.5px;padding:3px 8px;border-radius:6px;font-weight:700;display:inline-block">🟢 BERSIH</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:16px;padding-top:12px;border-top:1px solid #f1f5f9;font-size:12px;color:#64748b">
                <span>Menampilkan 5 dari <b>1.428.950</b> entri audit trail forensik</span>
                <div style="display:flex;gap:4px;align-items:center">
                    <span style="color:#94a3b8">Sebelumnya</span>
                    <button type="button" style="background:#153223;color:#fff;border:none;width:26px;height:26px;border-radius:4px;font-weight:700">1</button>
                    <button type="button" style="background:#f1f5f9;color:#334151;border:1px solid #cbd5e1;width:26px;height:26px;border-radius:4px">2</button>
                    <button type="button" style="background:#f1f5f9;color:#334151;border:1px solid #cbd5e1;width:26px;height:26px;border-radius:4px">3</button>
                    <span>...</span>
                    <button type="button" style="background:#f1f5f9;color:#334151;border:1px solid #cbd5e1;padding:0 8px;height:26px;border-radius:4px">285k</button>
                    <span style="color:#0f172a;font-weight:600">Selanjutnya</span>
                </div>
            </div>
        </div>

        
        <div style="display:flex;flex-direction:column;gap:20px">
            
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <h3 style="font-size:14px;font-weight:800;color:#0f172a;margin:0">⚙️ Konfigurasi Cadangan</h3>
                    <span style="background:#dcfce7;color:#166534;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">Aktif</span>
                </div>
                <div style="display:flex;flex-direction:column;gap:12px;font-size:12px">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;border-bottom:1px solid #f1f5f9;padding-bottom:8px">
                        <div>
                            <strong style="color:#0f172a">Snapshot Otomatis Harian</strong><br>
                            <span style="color:#64748b;font-size:11px">Terjadwal Pukul 03:00 WIB (Cron Eksekusi)</span>
                        </div>
                        <span style="font-size:14px">⏱️</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;border-bottom:1px solid #f1f5f9;padding-bottom:8px">
                        <div>
                            <strong style="color:#0f172a">Replikasi WAL-G Real-Time</strong><br>
                            <span style="color:#64748b;font-size:11px">Streaming Write-Ahead Logs ke Cloud Storage</span>
                        </div>
                        <span style="font-size:14px">🔄</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;border-bottom:1px solid #f1f5f9;padding-bottom:8px">
                        <div>
                            <strong style="color:#0f172a">Enkripsi End-to-End</strong><br>
                            <span style="color:#64748b;font-size:11px">AES-256-GCM + Kunci PKIP Root Aki (4096-bit)</span>
                        </div>
                        <span style="font-size:14px">🔐</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:flex-start">
                        <div>
                            <strong style="color:#0f172a">Retensi Penyimpanan</strong><br>
                            <span style="color:#64748b;font-size:11px">30 Hari Hot Tier, 365 Hari Cold Glacier</span>
                        </div>
                        <span style="font-size:14px">🗄️</span>
                    </div>
                </div>
            </div>

            
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <h3 style="font-size:14px;font-weight:800;color:#0f172a;margin:0">🗄️ Target Penyimpanan</h3>
                    <span style="font-size:11px;color:#64748b;font-weight:600">3 Multi-Lokasi</span>
                </div>
                <div style="display:flex;flex-direction:column;gap:12px;font-size:12px">
                    <div style="border-bottom:1px solid #f1f5f9;padding-bottom:8px">
                        <div style="display:flex;justify-content:space-between;margin-bottom:2px">
                            <strong style="color:#0f172a">NAS On-Premise Gedung TIK</strong>
                            <span style="font-weight:700;color:#0f172a">1.2 TB / 2.0 TB</span>
                        </div>
                        <div style="display:flex;justify-content:space-between;font-size:11px;color:#64748b">
                            <span>Partisi RAID-6 Enkripsi</span>
                            <span style="color:#16a34a;font-weight:600">Tersedia: 800 GB</span>
                        </div>
                    </div>
                    <div style="border-bottom:1px solid #f1f5f9;padding-bottom:8px">
                        <div style="display:flex;justify-content:space-between;margin-bottom:2px">
                            <strong style="color:#0f172a">Secondary Off-Site AWS S3</strong>
                            <span style="background:#fef3c7;color:#92400e;font-size:10px;padding:1px 6px;border-radius:4px;font-weight:700">Tersinkron</span>
                        </div>
                        <div style="font-size:11px;color:#64748b">
                            Region: ap-southeast-3 (Jakarta) &bull; Bucket: inx-lib-resv-prod
                        </div>
                    </div>
                    <div>
                        <div style="display:flex;justify-content:space-between;margin-bottom:2px">
                            <strong style="color:#0f172a">Disaster Node Cloudflare R2</strong>
                            <span style="background:#dcfce7;color:#166534;font-size:10px;padding:1px 6px;border-radius:4px;font-weight:700">Zero-Egress</span>
                        </div>
                        <div style="font-size:11px;color:#64748b">
                            Distribusi Data: Redundan Global &bull; Standby Failover
                        </div>
                    </div>
                </div>
            </div>

            
            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;box-shadow:0 1px 3px rgba(0,0,0,0.05)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                    <h3 style="font-size:14px;font-weight:800;color:#0f172a;margin:0">🛡️ Simulasi Pemulihan Bencana</h3>
                    <span style="font-size:16px">📋</span>
                </div>
                <p style="font-size:11.5px;color:#64748b;margin:0 0 12px">
                    Pengujian berkala otomatis untuk mengukur kesiapan restorasi seluruh basis data anggota, katalog, dan riwayat sirkulasi pada lingkungan Sandbox terisolasi.
                </p>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;padding:10px;border-radius:8px;font-size:11.5px;margin-bottom:12px">
                    <div style="display:flex;justify-content:space-between;margin-bottom:4px">
                        <span style="color:#64748b">Terakhir Diuji:</span>
                        <strong style="color:#0f172a">12 Oktober 2026</strong>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:4px">
                        <span style="color:#64748b">Waktu Pemulihan Nyata:</span>
                        <strong style="color:#16a34a">3 Menit 42 Detik</strong>
                    </div>
                    <div style="display:flex;justify-content:space-between">
                        <span style="color:#64748b">Hasil Konsistensi Data:</span>
                        <strong style="color:#0f172a">100% Lulus Validasi</strong>
                    </div>
                </div>
                <button type="button" style="width:100%;background:#b45309;color:#fff;border:none;padding:10px;border-radius:8px;font-weight:700;font-size:12px;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px" onclick="toast('Menjalankan uji simulasi restorasi sandbox terisolasi...')">
                    <span>⚡</span> Jalankan Uji Simulasi Restorasi Sandbox
                </button>
            </div>
        </div>
    </div>

    
    <div style="margin-top:20px;background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,0.05);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px">
        <div style="display:flex;align-items:center;gap:16px">
            <div style="width:160px;height:100px;border-radius:8px;overflow:hidden;flex-shrink:0;position:relative;border:1px solid #cbd5e1">
                <img src="<?php echo e(asset('foto/perpus.jpg')); ?>" alt="TI-INX-RACK-01" style="width:100%;height:100%;object-fit:cover">
                <div style="position:absolute;bottom:6px;left:6px;background:rgba(0,0,0,0.75);color:#fff;font-size:9px;font-weight:700;padding:2px 6px;border-radius:4px;font-family:monospace">TI-INX-RACK-01</div>
            </div>
            <div>
                <h4 style="font-size:14px;font-weight:800;color:#0f172a;margin:0 0 4px">Validasi Hashing Kriptografis Immutability</h4>
                <p style="font-size:12px;color:#64748b;margin:0;max-width:650px">
                    Semua baris jejak audit diperlakukan menggunakan skema append-only pada parsial Write-Once-Read-Many (WORM). Integritas dihitung setiap 60 detik melalui Merkle Tree untuk memastikan tidak ada perubahan manipulasi riwayat sirkulasi dan kas.
                </p>
                <div style="display:flex;gap:16px;margin-top:8px;font-size:11px;color:#475569">
                    <span><b>Merkle Root:</b> <code style="background:#f1f5f9;padding:2px 4px;border-radius:4px">37a98d...043210</code></span>
                    <span style="color:#16a34a;font-weight:600">● Status Sinkron: Tidak Ada Deviasi</span>
                </div>
            </div>
        </div>
        <div>
            <div style="font-size:10px;background:#f8fafc;border:1px solid #e2e8f0;padding:8px 12px;border-radius:6px;color:#64748b;text-align:right">
                <b>KUNCI PDP:</b> ROOT-INX-VALID<br>
                <span>ISO/IEC 27001:2022 Compliant</span>
            </div>
        </div>
    </div>

    
    <div style="margin-top:16px;background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:18px 22px;box-shadow:0 1px 3px rgba(0,0,0,0.05);display:flex;align-items:center;gap:16px">
        <div style="color:#b45309;width:40px;height:40px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 2.4L18 4l.6 3.6L22 9l-1.6 3.2L22 15l-3.4 1.4L18 20l-3.6-.4L12 22l-2.4-2.4L6 20l-.6-3.6L2 15l1.6-3.2L2 9l3.4-1.4L6 4l3.6.4L12 2z"/><polyline points="9 12 11 14 15 10"/></svg>
        </div>
        <div>
            <h4 style="font-size:13.5px;font-weight:800;color:#0f172a;margin:0 0 2px">Standar Kepatuhan Tata Kelola &amp; Ketahanan Informasi Perpustakaan</h4>
            <p style="font-size:11.5px;color:#475569;margin:0">
                Sistem tersertifikasi ISO/IEC 27001:2022 (Sistem Manajemen Keamanan Informasi), ISO 22301 (Kelangsungan Usaha &amp; Bencana), serta tunduk pada amanat Undang-Undang Perlindungan Data Pribadi (UU PDP No. 27/2022).
            </p>
        </div>
    </div>
</div>
<?php /**PATH D:\perangkat lunak\kelompok\resources\views/panels/super-audit.blade.php ENDPATH**/ ?>