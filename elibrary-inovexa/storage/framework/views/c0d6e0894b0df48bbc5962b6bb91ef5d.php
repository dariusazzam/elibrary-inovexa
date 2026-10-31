<div style="display:grid;grid-template-columns:1fr 340px;gap:14px;max-width:1450px;margin:0 auto;font-size:11.5px">
    <div style="min-width:0">
        <!-- Top Title & Buttons -->
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:12px">
            <div>
                <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:2px">Dashboard Sirkulasi &rsaquo; Lihat &amp; Cetak Laporan</div>
                <h2 style="font-size:18px;font-weight:800;color:var(--t);margin:0;display:flex;align-items:center;gap:8px">
                    Lihat &amp; Cetak Laporan Perpustakaan
                </h2>
                <p style="font-size:10.5px;color:var(--m);margin:2px 0 0">Pusat generasi dokumen laporan sirkulasi harian/bulanan, rekapitulasi denda &amp; kas keuangan, inventaris koleksi buku, statistik kunjungan pemustaka, serta audit berkas siap cetak (PDF/Excel) berstandar ISO Perpustakaan.</p>
            </div>
            <div style="display:flex;gap:6px">
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:5px 10px;border-radius:6px;font-size:10.5px;font-weight:600;cursor:pointer">🖨️ Konfigurasi Kop &amp; Tanda Tangan</button>
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:5px 10px;border-radius:6px;font-size:10.5px;font-weight:600;cursor:pointer">📅 Jadwalkan Laporan Otomatis</button>
                <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:6px;font-size:10.5px;font-weight:700;cursor:pointer">+ Buat Laporan Kustom</button>
            </div>
        </div>

        <!-- Top Stats Grid -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:12px">
            <div style="background:#fff;border:1px solid var(--ln);border-radius:8px;padding:10px;position:relative">
                <span style="font-size:9px;color:var(--m);font-weight:700;display:block;margin-bottom:4px">TOTAL SIRKULASI (OKT 2026)</span>
                <div style="font-size:18px;font-weight:800;color:var(--t)">8.420</div>
                <span style="font-size:9px;color:#059669;font-weight:600;background:#ecfdf5;padding:1px 5px;border-radius:4px;display:inline-block;margin-top:4px">▲ +14% • 5.120 Pinjam • 3.300 Kembali</span>
                <span style="position:absolute;right:10px;top:10px;font-size:13px">🔄</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:8px;padding:10px;position:relative">
                <span style="font-size:9px;color:var(--m);font-weight:700;display:block;margin-bottom:4px">PENERIMAAN KAS &amp; DENDA</span>
                <div style="font-size:18px;font-weight:800;color:var(--t)">Rp 14.850.000</div>
                <span style="font-size:9px;color:#059669;font-weight:600;background:#ecfdf5;padding:1px 5px;border-radius:4px;display:inline-block;margin-top:4px">● 100% Rekonsiliasi Kas Daerah Kilir</span>
                <span style="position:absolute;right:10px;top:10px;font-size:13px">📋</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:8px;padding:10px;position:relative">
                <span style="font-size:9px;color:var(--m);font-weight:700;display:block;margin-bottom:4px">PERTUMBUHAN INVENTARIS</span>
                <div style="font-size:18px;font-weight:800;color:var(--t)">+342 Eksemplar</div>
                <span style="font-size:9px;color:var(--m);font-weight:600;display:inline-block;margin-top:4px">Total 38.820 eksemplar terindeks aktif</span>
                <span style="position:absolute;right:10px;top:10px;font-size:13px">📚</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:8px;padding:10px;position:relative">
                <span style="font-size:9px;color:var(--m);font-weight:700;display:block;margin-bottom:4px">KUNJUNGAN &amp; LAYANAN</span>
                <div style="font-size:18px;font-weight:800;color:var(--t)">18.940 Pemustaka</div>
                <span style="font-size:9px;color:#059669;font-weight:600;background:#ecfdf5;padding:1px 5px;border-radius:4px;display:inline-block;margin-top:4px">98.4% sirkulasi tepat waktu</span>
                <span style="position:absolute;right:10px;top:10px;font-size:13px">👥</span>
            </div>
        </div>

        <!-- Search & Filters -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:8px;padding:8px 10px;margin-bottom:10px;display:flex;gap:8px;align-items:center">
            <div style="flex:1;position:relative">
                <span style="position:absolute;left:10px;top:7px;color:var(--m);font-size:11px">🔍</span>
                <input type="text" placeholder="Cari data anggota, ISBN buku, barcode transaksi..." style="width:100%;padding:6px 10px 6px 30px;border:1px solid var(--ln);border-radius:6px;font-size:11px">
            </div>
            <select style="padding:6px 10px;border:1px solid var(--ln);border-radius:6px;font-size:11px;background:#fff">
                <option>📅 Bulan Ini: Oktober 2026</option>
            </select>
            <select style="padding:6px 10px;border:1px solid var(--ln);border-radius:6px;font-size:11px;background:#fff">
                <option>📥 Semua Format</option>
            </select>
            <button style="background:#153223;color:#fff;border:none;padding:7px 14px;border-radius:6px;font-size:11px;font-weight:700;cursor:pointer">Terapkan Filter</button>
        </div>

        <!-- Sub Tabs -->
        <div style="display:flex;gap:6px;margin-bottom:10px;align-items:center">
            <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:16px;font-size:11px;font-weight:700;cursor:pointer">Semua Laporan (24)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:16px;font-size:11px;font-weight:600;cursor:pointer">Sirkulasi &amp; Peminjaman</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:16px;font-size:11px;font-weight:600;cursor:pointer">Keuangan &amp; Denda</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:16px;font-size:11px;font-weight:600;cursor:pointer">Inventaris &amp; Buku</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:16px;font-size:11px;font-weight:600;cursor:pointer">Statistik Kunjungan</button>
        </div>

        <!-- Bulk Bar -->
        <div style="background:#f8fafc;border:1px solid var(--ln);padding:8px 12px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;font-size:11px">
            <div style="display:flex;align-items:center;gap:8px">
                <input type="checkbox" checked style="accent-color:#059669;width:14px;height:14px">
                <span style="color:var(--t)">Pilih dokumen untuk melihat pratinjau lembar cetak atau langsung unduh</span>
            </div>
            <span style="background:#e5e7eb;color:var(--t);font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">24 Dokumen Tersedia</span>
        </div>

        <!-- Main Table -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:8px;overflow:hidden">
            <table style="width:100%;border-collapse:collapse;text-align:left;font-size:11px">
                <thead>
                    <tr style="background:#f9fafb;border-bottom:1px solid var(--ln);color:var(--m);font-size:10px;font-weight:700">
                        <th style="padding:10px;width:28px"><input type="checkbox"></th>
                        <th style="padding:10px">JENIS &amp; JUDUL LAPORAN</th>
                        <th style="padding:10px">PERIODE &amp; KODE</th>
                        <th style="padding:10px">FORMAT</th>
                        <th style="padding:10px">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                        <td style="padding:10px"><input type="checkbox" checked style="accent-color:#059669"></td>
                        <td style="padding:10px;display:flex;gap:8px;align-items:flex-start">
                            <span style="font-size:15px">📄</span>
                            <div>
                                <b style="color:var(--t);font-size:11.5px">Laporan Rekapitulasi Sirkulasi &amp; Peminjaman Bulanan</b><br>
                                <small style="color:var(--m);font-size:10px">Dihasilkan oleh: Budi Santoso (Admin Pegawai) &bull; 24 Okt 2026, 08:30 WIB</small>
                            </div>
                        </td>
                        <td style="padding:10px">
                            <b style="color:var(--t)">Oktober 2026</b><br>
                            <small style="color:#0284c7;font-family:monospace;font-size:9.5px">RPT-SRK-2026-10</small>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#ef4444;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px;margin-right:2px">PDF</span>
                            <span style="background:#10b981;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px">XLSX</span>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">● Siap Cetak</span>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:10px"><input type="checkbox"></td>
                        <td style="padding:10px;display:flex;gap:8px;align-items:flex-start">
                            <span style="font-size:15px">📊</span>
                            <div>
                                <b style="color:var(--t);font-size:11.5px">Laporan Penerimaan Denda &amp; Rekonsiliasi Kas Loket</b><br>
                                <small style="color:var(--m);font-size:10px">Dihasilkan oleh: Kasir Shift #02 &bull; 24 Okt 2026, 07:15 WIB</small>
                            </div>
                        </td>
                        <td style="padding:10px">
                            <b style="color:var(--t)">24 Okt 2026</b><br>
                            <small style="color:#0284c7;font-family:monospace;font-size:9.5px">RPT-KAS-2026-10-24</small>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#ef4444;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px;margin-right:2px">PDF</span>
                            <span style="background:#10b981;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px">XLSX</span>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#fef3c7;color:#b45309;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">● Terverifikasi</span>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:10px"><input type="checkbox"></td>
                        <td style="padding:10px;display:flex;gap:8px;align-items:flex-start">
                            <span style="font-size:15px">📚</span>
                            <div>
                                <b style="color:var(--t);font-size:11.5px">Buku Induk &amp; Berita Acara Inventaris Koleksi Fisik &amp; E-Book</b><br>
                                <small style="color:var(--m);font-size:10px">Dihasilkan oleh: Bagian Akusisi Bahan Pustaka &bull; 20 Okt 2026</small>
                            </div>
                        </td>
                        <td style="padding:10px">
                            <b style="color:var(--t)">Trimester III 2026</b><br>
                            <small style="color:#0284c7;font-family:monospace;font-size:9.5px">RPT-INV-2026-Q3</small>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#ef4444;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px">PDF</span>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">● Siap Cetak</span>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:10px"><input type="checkbox"></td>
                        <td style="padding:10px;display:flex;gap:8px;align-items:flex-start">
                            <span style="font-size:15px">⚠️</span>
                            <div>
                                <b style="color:var(--t);font-size:11.5px">Laporan Kepatuhan Anggota &amp; Pemustaka Kena Sanksi/Denda</b><br>
                                <small style="color:var(--m);font-size:10px">Dihasilkan oleh: Pengawas Sirkulasi &bull; 22 Okt 2026</small>
                            </div>
                        </td>
                        <td style="padding:10px">
                            <b style="color:var(--t)">Minggu ke-4 Okt</b><br>
                            <small style="color:#0284c7;font-family:monospace;font-size:9.5px">RPT-MOT-2026-W4</small>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#ef4444;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px;margin-right:2px">PDF</span>
                            <span style="background:#3b82f6;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px">CSV</span>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#e0f2fe;color:#0369a1;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">● Siap Kirim</span>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:10px"><input type="checkbox"></td>
                        <td style="padding:10px;display:flex;gap:8px;align-items:flex-start">
                            <span style="font-size:15px">📋</span>
                            <div>
                                <b style="color:var(--t);font-size:11.5px">Statistik Kunjungan Pemustaka &amp; Utilisasi Smart Locker</b><br>
                                <small style="color:var(--m);font-size:10px">Dihasilkan oleh: Sistem Otomatisasi IoT &bull; 23 Okt 2026</small>
                            </div>
                        </td>
                        <td style="padding:10px">
                            <b style="color:var(--t)">Oktober 2026</b><br>
                            <small style="color:#0284c7;font-family:monospace;font-size:9.5px">RPT-STT-2026-10</small>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#ef4444;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px;margin-right:2px">PDF</span>
                            <span style="background:#10b981;color:#fff;font-size:9px;font-weight:700;padding:1px 5px;border-radius:3px">XLSX</span>
                        </td>
                        <td style="padding:10px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">● Selesai</span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div style="padding:10px 14px;display:flex;justify-content:space-between;align-items:center;background:#f9fafb;font-size:10.5px;color:var(--m)">
                <span>Menampilkan 5 dari 24 dokumen laporan periode Oktober 2026</span>
                <div style="display:flex;gap:4px;align-items:center">
                    <span>Sebelumnya</span>
                    <button style="background:#153223;color:#fff;border:none;width:22px;height:22px;border-radius:4px;font-weight:700;font-size:10px">1</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:22px;height:22px;border-radius:4px;font-size:10px">2</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:22px;height:22px;border-radius:4px;font-size:10px">3</button>
                    <span>Selanjutnya</span>
                </div>
            </div>
        </div>

        <!-- Archival Note Footer -->
        <div style="margin-top:10px;background:#fefce8;border:1px solid #fef08a;border-radius:8px;padding:8px 12px;font-size:10px;color:#713f12;display:flex;justify-content:space-between;align-items:center">
            <span><b>Kepastian Standar Dokumen Arsip Perpustakaan Nasional:</b> Seluruh rekaman sirkulasi dan kas denda wajib dicetak serta disimpan minimal 5 (lima) tahun sesuai amanat UU No. 43 Tahun 2007.</span>
            <span style="font-family:monospace;font-weight:700">Integritas Arsip: SHA-256 Terverifikasi</span>
        </div>
    </div>

    <!-- Right Sidebar Pratinjau Lembar Cetak -->
    <div style="display:flex;flex-direction:column;gap:12px">
        <!-- Top Preview Card -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px;box-shadow:0 4px 12px rgba(0,0,0,.04)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                <span style="font-size:10.5px;font-weight:800;color:var(--t)">PRATINJAU LEMBAR LAPORAN</span>
                <span style="font-size:9.5px;color:var(--m)">A4 • 100%</span>
            </div>

            <!-- Mini Paper Preview Matching Image -->
            <div style="background:#fff;border:1px solid #cbd5e1;padding:12px;border-radius:6px;font-size:8.5px;color:#334155;line-height:1.35;margin-bottom:10px;position:relative;overflow:hidden">
                <div style="position:absolute;top:8px;right:-26px;background:#10b981;color:#fff;font-size:7px;font-weight:700;padding:2px 26px;transform:rotate(45deg);letter-spacing:.05em">DOKUMEN RESMI</div>
                <div style="text-align:center;border-bottom:2px solid #000;padding-bottom:5px;margin-bottom:5px">
                    <b style="font-size:9.5px">DINAS PERPUSTAKAAN &amp; KEARSIPAN</b><br>
                    <small style="font-size:7px">UPT Perpustakaan Umum Inovexa Teknologi</small><br>
                    <small style="font-size:6.5px;color:#64748b">Jl. Pemuda No. 278, Semarang • Telp. (024) 3549878</small>
                </div>
                <div style="text-align:center;margin-bottom:6px">
                    <b style="font-size:9px;text-decoration:underline">BERITA ACARA REKAPITULASI</b><br>
                    <b style="font-size:9px;text-decoration:underline">SIRKULASI &amp; KEUANGAN</b><br>
                    <small style="font-size:6.5px;color:#64748b">Nomor: 001.2/SKR/SK-2026/X/1084 • Oktober 2026</small>
                </div>
                <div style="font-size:8px;margin-bottom:6px;border-top:1px dashed #cbd5e1;border-bottom:1px dashed #cbd5e1;padding:5px 0">
                    <div style="display:flex;justify-content:space-between;margin-bottom:2px">
                        <span>Total Buku Dipinjam:</span>
                        <b>5.139 Judul/Eks</b>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:2px">
                        <span>Total Buku Kembali:</span>
                        <b>3.300 Judul/Eks</b>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:2px">
                        <span>Total Keterlambatan:</span>
                        <b>248 Kasus</b>
                    </div>
                    <div style="display:flex;justify-content:space-between;margin-top:3px;padding-top:3px;border-top:1px solid #e2e8f0">
                        <b style="color:#047857">Total Kas Denda Masuk:</b>
                        <b style="color:#047857">Rp 14.850.000,-</b>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-top:6px">
                    <div style="width:34px;height:34px;background:#000;color:#fff;display:grid;place-items:center;font-size:5.5px;text-align:center;font-family:monospace">
                        QRIS/TTE
                    </div>
                    <div style="text-align:right;font-size:7.5px">
                        Semarang, 24 Okt 2026<br>
                        Petugas Layanan<br><br><br>
                        <b>Budi Santoso</b><br>
                        <small style="font-size:6.5px;color:#64748b">NIP: 19850712-201001</small>
                    </div>
                </div>
            </div>

            <!-- Parameter Cetak Dokumen -->
            <div style="background:#f8fafc;border:1px solid var(--ln);border-radius:6px;padding:10px;margin-bottom:10px;font-size:10.5px">
                <b style="color:var(--t);display:block;margin-bottom:6px;font-size:11px">PARAMETER CETAK DOKUMEN</b>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px;margin-bottom:8px">
                    <div>
                        <label style="color:var(--m);font-size:9.5px;display:block;margin-bottom:2px">Ukuran Kertas</label>
                        <select style="width:100%;padding:5px;border:1px solid var(--ln);border-radius:5px;background:#fff;font-size:10.5px">
                            <option>A4 (210 x 297 mm)</option>
                        </select>
                    </div>
                    <div>
                        <label style="color:var(--m);font-size:9.5px;display:block;margin-bottom:2px">Orientasi</label>
                        <select style="width:100%;padding:5px;border:1px solid var(--ln);border-radius:5px;background:#fff;font-size:10.5px">
                            <option>Portait (Tegak)</option>
                        </select>
                    </div>
                </div>
                <div style="display:flex;flex-direction:column;gap:5px;font-size:10.5px">
                    <label style="display:flex;align-items:center;gap:6px;cursor:pointer">
                        <input type="checkbox" checked style="accent-color:#059669;width:13px;height:13px">
                        <span>Sertakan Barcode / QR Validasi Digital</span>
                    </label>
                    <label style="display:flex;align-items:center;gap:6px;cursor:pointer">
                        <input type="checkbox" checked style="accent-color:#059669;width:13px;height:13px">
                        <span>Sertakan Stempel Basah &amp; Kop Instansi</span>
                    </label>
                    <label style="display:flex;align-items:center;gap:6px;cursor:pointer">
                        <input type="checkbox" style="accent-color:#059669;width:13px;height:13px">
                        <span>Lampirkan Lembar Pengesahan Kepala Dinas</span>
                    </label>
                </div>
            </div>

            <button style="width:100%;background:#000;color:#fff;border:none;padding:9px;border-radius:6px;font-size:11.5px;font-weight:700;margin-bottom:6px;cursor:pointer">🖨️ Cetak Dokumen Sekarang<br><span style="font-size:9px;font-weight:normal;opacity:0.8">(Ctrl+P)</span></button>
            <button style="width:100%;background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:6px;font-size:11px;font-weight:600;margin-bottom:4px;cursor:pointer">📥 Unduh PDF Berstempel Digital</button>
            <button style="width:100%;background:none;border:none;color:var(--t);padding:3px;font-size:11px;font-weight:600;cursor:pointer;text-align:center">🔗 Kirim Tautan Validasi ke Pimpinan</button>
        </div>
    </div>
</div>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views/panels/reports.blade.php ENDPATH**/ ?>