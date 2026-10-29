<div style="max-width:1450px;margin:0 auto">
    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
        <div>
            <div style="font-size:10px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:3px">Dashboard Admin Sirkulasi &rsaquo; Proses Peminjaman &amp; Pengembalian</div>
            <h2 style="font-size:22px;font-weight:800;color:var(--t);margin:0">Proses Peminjaman &amp; Pengembalian</h2>
            <span style="font-size:9.5px;background:#e5e7eb;color:var(--t);padding:2px 8px;border-radius:4px;font-weight:600;display:inline-block;margin-top:4px">Modul Sirkulasi Loket Mandiri &amp; Meja Petugas</span>
            <p style="font-size:11.5px;color:var(--m);margin:4px 0 0">Layanan terpadu sirkulasi buku fisik: peminjaman kilat via RFID/Barcode, verifikasi kuota anggota, perpanjangan masa pinjam, pengembalian eksemplar, serta kalkulasi denda otomatis.</p>
        </div>
        <div style="display:flex;gap:8px">
            <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">⚙️ Mode Cepat (Kiosk Scan)</button>
            <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📦 Pengembalian Massal (Drop Box)</button>
            <button style="background:#153223;color:#fff;border:none;padding:7px 14px;border-radius:8px;font-size:11.5px;font-weight:700;cursor:pointer">+ Transaksi Peminjaman Baru</button>
        </div>
    </div>

    <!-- Top Stats Grid -->
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px">
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
            <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">TOTAL TRANSAKSI HARI INI</span>
            <div style="font-size:22px;font-weight:800;color:var(--t)">342 <span style="font-size:11px;font-weight:normal;color:var(--m)">Transaksi</span></div>
            <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">▲ +24 dibandingkan kemarin</span>
            <span style="position:absolute;right:14px;top:14px;font-size:16px">🔄</span>
        </div>

        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
            <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">BUKU SEDANG DIPINJAM</span>
            <div style="font-size:22px;font-weight:800;color:var(--t)">5.490 <span style="font-size:11px;font-weight:normal;color:var(--m)">Buku</span></div>
            <span style="font-size:10px;color:var(--m);display:block;margin-top:6px">● Jatuh tempo minggu ini: <b>820 buku</b></span>
            <span style="position:absolute;right:14px;top:14px;font-size:16px">📖</span>
        </div>

        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
            <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">PENGEMBALIAN HARI INI</span>
            <div style="font-size:22px;font-weight:800;color:var(--t)">188 <span style="font-size:11px;font-weight:normal;color:var(--m)">Buku</span></div>
            <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">● 182 tepat waktu, 6 terlambat</span>
            <span style="position:absolute;right:14px;top:14px;font-size:16px">📦</span>
        </div>

        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
            <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">DENDA TERKUMPUL HARI INI</span>
            <div style="font-size:22px;font-weight:800;color:var(--t)">Rp 45.000</div>
            <span style="font-size:10px;color:#dc2626;font-weight:600;background:#fee2e2;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚠️ Dari 6 transaksi keterlambatan</span>
            <span style="position:absolute;right:14px;top:14px;font-size:16px">💳</span>
        </div>
    </div>

    <!-- Grid 2 Kolom: Tabel Kiri + Sidebar Kanan -->
    <div style="display:grid;grid-template-columns:1fr 340px;gap:20px">
        <div style="min-width:0">
            <!-- Search & Filters -->
            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px;margin-bottom:14px;display:flex;gap:10px;align-items:center">
                <div style="flex:1;position:relative">
                    <span style="position:absolute;left:12px;top:9px;color:var(--m);font-size:12px">🔍</span>
                    <input type="text" placeholder="Cari No. Transaksi, NIA Anggota, Barcode Buku..." style="width:100%;padding:8px 12px 8px 34px;border:1px solid var(--ln);border-radius:6px;font-size:12px">
                </div>
                <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                    <option>Semua Loket &amp; Gate</option>
                </select>
                <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                    <option>Transaksi Terkini</option>
                </select>
                <button style="background:#fff;border:1px solid var(--ln);padding:8px 12px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer">⚙️ Filter Lanjutan</button>
                <button style="background:#fff;border:1px solid var(--ln);padding:8px 10px;border-radius:6px;font-size:12px;cursor:pointer">📥</button>
            </div>

            <!-- Sub Tabs -->
            <div style="display:flex;gap:8px;margin-bottom:12px;align-items:center">
                <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Semua Transaksi (342)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Peminjaman Baru (154)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Pengembalian (188)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Menunggu Validasi (4)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Keterlambatan &amp; Sanksi (6)</button>
            </div>

            <!-- Bulk Bar -->
            <div style="background:#153223;color:#fff;padding:8px 14px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;font-size:12px">
                <div style="display:flex;align-items:center;gap:10px">
                    <input type="checkbox" checked style="accent-color:#059669;width:15px;height:15px">
                    <span><b>2 Transaksi Dipilih</b></span>
                </div>
                <div style="display:flex;gap:8px">
                    <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">🖨️ Cetak Bukti Transaksi</button>
                    <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">✓ Selesaikan Transaksi</button>
                    <button style="background:none;border:none;color:#cbd5e1;font-size:11px;cursor:pointer">Batal</button>
                </div>
            </div>

            <!-- Main Table -->
            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;overflow:hidden">
                <table style="width:100%;border-collapse:collapse;text-align:left;font-size:12px">
                    <thead>
                        <tr style="background:#f9fafb;border-bottom:1px solid var(--ln);color:var(--m);font-size:10.5px;font-weight:700">
                            <th style="padding:12px;width:30px"><input type="checkbox"></th>
                            <th style="padding:12px">ID &amp; WAKTU TRANSAKSI</th>
                            <th style="padding:12px">DATA ANGGOTA / PEMINJAM</th>
                            <th style="padding:12px">KOLEKSI &amp; EKSEMPLAR</th>
                            <th style="padding:12px">JENIS &amp; DURASI</th>
                            <th style="padding:12px">STATUS</th>
                            <th style="padding:12px;text-align:right">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                            <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">TR-2026-1025-089</b><br>
                                <small style="color:var(--m)">Hari Ini • 10:24 WIB</small><br>
                                <span style="font-size:10px;color:#059669;font-weight:600">Gate Loket 1</span>
                            </td>
                            <td style="padding:12px">
                                <div style="display:flex;align-items:center;gap:8px">
                                    <div style="width:26px;height:26px;border-radius:50%;background:#153223;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">HM</div>
                                    <div>
                                        <b style="color:var(--t)">Herdman</b><br>
                                        <small style="color:var(--m)">INX-2026-06912</small><br>
                                        <span style="font-size:10px;color:#0284c7">Mahasiswa Reguler</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Laskar...</b><br>
                                <small style="color:var(--m)">BUK-8994-LP (Ex. 02)</small><br>
                                <small style="color:var(--m)">Rak S-02 (Sastra &amp; Fiksi)</small>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Peminjaman Baru</b><br>
                                <small style="color:#dc2626">Batas: 25 Okt 2026</small><br>
                                <small style="color:var(--m)">Durasi: 14 Hari</small>
                            </td>
                            <td style="padding:12px">
                                <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">● Aktif</span>
                            </td>
                            <td style="padding:12px;text-align:right">
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px">📥</button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr style="border-bottom:1px solid var(--ln)">
                            <td style="padding:12px"><input type="checkbox"></td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">TR-2026-1025-088</b><br>
                                <small style="color:var(--m)">Hari Ini • 09:50 WIB</small><br>
                                <span style="font-size:10px;color:var(--m)">Drop Box B1</span>
                            </td>
                            <td style="padding:12px">
                                <div style="display:flex;align-items:center;gap:8px">
                                    <div style="width:26px;height:26px;border-radius:50%;background:#374151;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">KW</div>
                                    <div>
                                        <b style="color:var(--t)">Kevin Wijaya</b><br>
                                        <small style="color:var(--m)">MBR-2026-84321</small><br>
                                        <span style="font-size:10px;color:#0284c7">Dosen Pengajar</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Sapiens:...</b><br>
                                <small style="color:var(--m)">BUK-9921-SP (Ex. 01)</small><br>
                                <small style="color:var(--m)">Rak S05-14 (Sejarah)</small>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Pengembalian</b><br>
                                <small style="color:#059669">Tepat Waktu (0 Denda)</small><br>
                                <small style="color:var(--m)">Dipinjam 32 hari</small>
                            </td>
                            <td style="padding:12px">
                                <span style="background:#e5e7eb;color:#374151;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">Selesai</span>
                            </td>
                            <td style="padding:12px;text-align:right">
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px">⏱️</button>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                            <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">TR-2026-1025-084</b><br>
                                <small style="color:var(--m)">Hari Ini • 09:12 WIB</small><br>
                                <span style="font-size:10px;color:#059669;font-weight:600">Kiosk Mandiri</span>
                            </td>
                            <td style="padding:12px">
                                <div style="display:flex;align-items:center;gap:8px">
                                    <div style="width:26px;height:26px;border-radius:50%;background:#9a3412;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">AF</div>
                                    <div>
                                        <b style="color:var(--t)">Ahmad Fauzi</b><br>
                                        <small style="color:var(--m)">INX-2026-04118</small><br>
                                        <span style="font-size:10px;color:#0284c7">Mahasiswa Pascasarjana</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Atomic Habits</b><br>
                                <small style="color:var(--m)">INX-EK-8994-03 (Ex. 03)</small><br>
                                <small style="color:var(--m)">Rak PSI-08 (Self-Help)</small>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Perpanjangan (1x)</b><br>
                                <small style="color:#059669">Sisa Masa Pinjam: 10 Hari</small><br>
                                <small style="color:var(--m)">Batas: 22 Okt 2028</small>
                            </td>
                            <td style="padding:12px">
                                <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">Berhasil</span>
                            </td>
                            <td style="padding:12px;text-align:right">
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px">📥</button>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr style="border-bottom:1px solid var(--ln)">
                            <td style="padding:12px"><input type="checkbox"></td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">TR-2026-1025-072</b><br>
                                <small style="color:var(--m)">Hari Ini • 08:35 WIB</small><br>
                                <span style="font-size:10px;color:#d97706">Loket Sirkulasi 2</span>
                            </td>
                            <td style="padding:12px">
                                <div style="display:flex;align-items:center;gap:8px">
                                    <div style="width:26px;height:26px;border-radius:50%;background:#831843;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">PR</div>
                                    <div>
                                        <b style="color:var(--t)">Princess</b><br>
                                        <small style="color:var(--m)">MBR-2026-06912</small><br>
                                        <span style="font-size:10px;color:#0284c7">Siswa Umum</span>
                                    </div>
                                </div>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Metodologi...</b><br>
                                <small style="color:var(--m)">BUK-081.42 (Ex. 04)</small><br>
                                <small style="color:var(--m)">Rak MET-03 (Riset)</small>
                            </td>
                            <td style="padding:12px">
                                <b style="color:var(--t)">Pengembalian</b><br>
                                <small style="color:#dc2626">Telat 2 Hari</small><br>
                                <small style="color:#dc2626">Denda: Rp 10.000</small>
                            </td>
                            <td style="padding:12px">
                                <span style="background:#fee2e2;color:#dc2626;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">Terlambat</span>
                            </td>
                            <td style="padding:12px;text-align:right">
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                                <button style="background:none;border:none;cursor:pointer;font-size:14px">💳</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div style="padding:12px 16px;display:flex;justify-content:space-between;align-items:center;background:#f9fafb;font-size:11.5px;color:var(--m)">
                    <span>Menampilkan <b>5 transaksi</b> dari <b>342</b> total transaksi sirkulasi hari ini</span>
                    <div style="display:flex;gap:4px;align-items:center">
                        <button style="background:#153223;color:#fff;border:none;width:24px;height:24px;border-radius:4px;font-weight:700">1</button>
                        <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">2</button>
                        <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">3</button>
                        <span>...</span>
                        <button style="background:#fff;border:1px solid var(--ln);padding:0 6px;height:24px;border-radius:4px">69</button>
                        <span>›</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar Slip & Detail -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px;height:fit-content">
            <div style="background:#153223;color:#fff;border-radius:10px;padding:16px;margin-bottom:16px;position:relative">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                    <span style="font-size:9.5px;font-weight:700;letter-spacing:.05em">INOVEXA CIRCULATION</span>
                    <span style="background:#059669;color:#fff;font-size:9px;padding:2px 6px;border-radius:4px;font-weight:700">SCANNER READY</span>
                </div>
                <div style="font-size:10px;color:#a3e635;margin-bottom:2px">NO. TRANSAKSI SIRKULASI</div>
                <div style="font-size:15px;font-weight:800;font-family:monospace;margin-bottom:8px">TR-2026-1025-089</div>
                <div style="font-size:13px;font-weight:700;margin-bottom:2px">Herdman (Mahasiswa)</div>
                <div style="font-size:10.5px;color:#cbd5e1;margin-bottom:12px">NIA: INX-2026-06912 • Loket Utama 1</div>
                <div style="background:#fff;padding:6px;border-radius:4px;text-align:center">
                    <div style="font-family:monospace;font-size:9px;color:#000;letter-spacing:2px">||| | |||| || ||||||</div>
                </div>
            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <h4 style="font-size:13.5px;font-weight:800;color:var(--t);margin:0">Detail Transaksi &amp; Validasi</h4>
                <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">Valid &amp; Aktif</span>
            </div>

            <div style="margin-bottom:12px">
                <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:4px">
                    <span style="color:var(--m)">Kuota Peminjaman Anggota</span>
                    <b style="color:var(--t)">2 / 3 Eksemplar Terpakai</b>
                </div>
                <div style="width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden">
                    <div style="width:66.6%;height:100%;background:#059669"></div>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--m);margin-top:3px">
                    <span>Sisa kuota: 1 buku lagi</span>
                    <span style="color:#059669;font-weight:600">Bebas Tanggungan Denda</span>
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:11.5px;margin-bottom:14px;background:#f9fafb;padding:10px;border-radius:8px">
                <div>
                    <span style="color:var(--m);font-size:10px;display:block">Tanggal Waktu</span>
                    <b>25 Okt 2026 (H-14)</b>
                </div>
                <div>
                    <span style="color:var(--m);font-size:10px;display:block">Petugas Loket</span>
                    <b>Budi Santoso</b>
                </div>
                <div style="margin-top:6px">
                    <span style="color:var(--m);font-size:10px;display:block">Status Keanggotaan</span>
                    <b style="color:#059669">Aktif (Berlaku s/d 2027)</b>
                </div>
                <div style="margin-top:6px">
                    <span style="color:var(--m);font-size:10px;display:block">Tanggungan Denda</span>
                    <b>Rp 0 (Bebas)</b>
                </div>
            </div>

            <div style="font-size:11.5px;font-weight:700;color:var(--t);margin-bottom:8px">EKSEMPLAR DIPROSES (1 BUKU)</div>
            <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:14px">
                <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                    <div>
                        <b>01</b> &nbsp; BUK-8994-LP • Laskar Pel<br><small style="color:var(--m)">Kondisi: Sangat Baik • RFID OK</small>
                    </div>
                    <span style="background:#d1fae5;color:#065f46;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">Dipinjam</span>
                </div>
            </div>

            <button style="width:100%;background:#153223;color:#fff;border:none;padding:10px;border-radius:8px;font-size:12px;font-weight:700;margin-bottom:10px;cursor:pointer">🖨️ Cetak Struk Peminjaman</button>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
                <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📦 Proses Kembali</button>
                <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">⏱️ Perpanjang Masa</button>
            </div>
        </div>
    </div>
</div>
