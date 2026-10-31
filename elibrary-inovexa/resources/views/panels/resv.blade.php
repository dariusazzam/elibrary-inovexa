<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;max-width:1450px;margin:0 auto">
    <div style="min-width:0">
        <!-- Top Title & Buttons -->
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
            <div>
                <div style="font-size:10px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:3px">Dashboard Admin Sirkulasi &rsaquo; Kelola Reservasi Buku</div>
                <h2 style="font-size:22px;font-weight:800;color:var(--t);margin:0;display:flex;align-items:center;gap:10px">
                    Kelola Reservasi Buku
                    <span style="font-size:9.5px;background:#e5e7eb;color:var(--t);padding:2px 8px;border-radius:4px;font-weight:600">Modul Antrean &amp; Pengambilan Koleksi</span>
                </h2>
                <p style="font-size:11.5px;color:var(--m);margin:4px 0 0">Pusat verifikasi booking buku anggota, monitoring ketersediaan eksemplar yang baru kembali, notifikasi kedatangan buku otomatis via WhatsApp, dan batas kedaluwarsa masa simpan rak reservasi.</p>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">🖨️ Cetak Label Rak Reservasi</button>
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📥 Export Daftar Tunggu</button>
                <button style="background:#153223;color:#fff;border:none;padding:7px 14px;border-radius:8px;font-size:11.5px;font-weight:700;cursor:pointer">+ Tambah Reservasi Manual</button>
            </div>
        </div>

        <!-- Banner Transit Status -->
        <div style="background:#ecfdf5;border:1px solid #a7f3d0;border-radius:10px;padding:12px 18px;margin-bottom:16px;display:flex;justify-content:space-between;align-items:center;font-size:12px;color:#065f46">
            <div style="display:flex;align-items:center;gap:10px">
                <span style="font-size:16px">🟢</span>
                <span><b>Status Rak Transit: Reservasi Hari Ini</b> • Sistem Aktif Real-time<br><b>6 buku siap diambil</b> oleh pemustaka. <b>3 reservasi mendekati batas kedaluwarsa (24 jam tersisa)</b> sebelum otomatis dibatalkan.</span>
            </div>
            <div style="background:#d1fae5;padding:6px 12px;border-radius:6px;font-weight:700;font-size:11px;text-align:right">
                LOKET RESERVASI:<br><span style="color:#047857">BAK-TRANSIT-01</span>
            </div>
        </div>

        <!-- Top Stats Grid -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px">
            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">TOTAL RESERVASI AKTIF</span>
                <div style="font-size:24px;font-weight:800;color:var(--t)">34 <span style="font-size:12px;font-weight:normal;color:var(--m)">Antrean</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">▲ +5 reservasi baru hari ini</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">📌</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">SIAP DIAMBIL DI LOKET</span>
                <div style="font-size:24px;font-weight:800;color:var(--t)">8 <span style="font-size:12px;font-weight:normal;color:var(--m)">Buku</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">Sudah di rak transit &amp; WA terkirim</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">📦</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">MENUNGGU PENGEMBALIAN</span>
                <div style="font-size:24px;font-weight:800;color:var(--t)">21 <span style="font-size:12px;font-weight:normal;color:var(--m)">Buku</span></div>
                <span style="font-size:10px;color:var(--m);display:block;margin-top:6px">Eksemplar dipinjam anggota lain</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">⏳</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">KEDALUWARSA / BATAL</span>
                <div style="font-size:24px;font-weight:800;color:var(--t)">5 <span style="font-size:12px;font-weight:normal;color:var(--m)">Kasus</span></div>
                <span style="font-size:10px;color:#dc2626;font-weight:600;background:#fee2e2;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚠️ 3 buku perlu kembali ke rak umum</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">❌</span>
            </div>
        </div>

        <!-- Search & Filters -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px;margin-bottom:14px;display:flex;gap:10px;align-items:center">
            <div style="flex:1;position:relative">
                <span style="position:absolute;left:12px;top:9px;color:var(--m);font-size:12px">🔍</span>
                <input type="text" placeholder="Cari nomor reservasi, nama anggota, judul buku..." style="width:100%;padding:8px 12px 8px 34px;border:1px solid var(--ln);border-radius:6px;font-size:12px">
            </div>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Semua Kategori Koleksi</option>
            </select>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Urutkan Prioritas Antrean</option>
            </select>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 12px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer">⚙️ Filter Lanjutan</button>
        </div>

        <!-- Sub Tabs -->
        <div style="display:flex;gap:8px;margin-bottom:12px;align-items:center">
            <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Semua Antrean (34)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Siap Diambil (8)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Menunggu Buku Kembali (21)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Kedaluwarsa Simpan (5)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Selesai Dipinjam (142)</button>
        </div>

        <!-- Bulk Bar -->
        <div style="background:#153223;color:#fff;padding:8px 14px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;font-size:12px">
            <div style="display:flex;align-items:center;gap:10px">
                <input type="checkbox" checked style="accent-color:#059669;width:15px;height:15px">
                <span><b>2 Reservasi Dipilih</b></span>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">💬 Kirim Pengingat WhatsApp</button>
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">🖨️ Cetak Tiket</button>
                <button style="background:none;border:none;color:#cbd5e1;font-size:11px;cursor:pointer">Batalkan Pilihan</button>
            </div>
        </div>

        <!-- Main Table -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;overflow:hidden">
            <table style="width:100%;border-collapse:collapse;text-align:left;font-size:12px">
                <thead>
                    <tr style="background:#f9fafb;border-bottom:1px solid var(--ln);color:var(--m);font-size:10.5px;font-weight:700">
                        <th style="padding:12px;width:30px"><input type="checkbox"></th>
                        <th style="padding:12px">ANGGOTA &amp; IDENTITAS</th>
                        <th style="padding:12px">BUKU &amp; KODE PANGGIL</th>
                        <th style="padding:12px">TANGGAL &amp; STATUS ANTREAN</th>
                        <th style="padding:12px">STATUS EKSEMPLAR &amp; AKSI</th>
                        <th style="padding:12px;text-align:right">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                        <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#153223;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">HD</div>
                                <div>
                                    <b style="color:var(--t)">Herdman <span style="font-size:9px;background:#f3f4f6;color:#374151;padding:1px 6px;border-radius:4px;font-weight:600">Umum</span></b><br>
                                    <small style="color:var(--m)">INX-2026-08912</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Laskar Pelangi</b><br>
                            <small style="color:var(--m)">899.221 HIR l • Sastra</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">23 Okt 2026</b><br>
                            <small style="color:#059669;font-weight:700">Antrean #1 (Prioritas)</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:3px 8px;border-radius:6px">Siap Diambil (Rak B-01)</span><br>
                            <small style="color:var(--m)">Batas: 26 Okt (Sisa 18 Jam)</small>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:16px">⋮</button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#1e3a8a;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">KW</div>
                                <div>
                                    <b style="color:var(--t)">Kevin Wijaya <span style="font-size:9px;background:#e0f2fe;color:#0369a1;padding:1px 6px;border-radius:4px;font-weight:600">Mahasiswa</span></b><br>
                                    <small style="color:var(--m)">MBR-2026-84321</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Sapiens: Riwayat Singkat</b><br>
                            <small style="color:var(--m)">999 HAR s • S05-14</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">24 Okt 2026</b><br>
                            <small style="color:var(--m)">Antrean #2</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#fef3c7;color:#b45309;font-size:10.5px;font-weight:700;padding:3px 8px;border-radius:6px">Menunggu Kembali</span><br>
                            <small style="color:var(--m)">Dipinjam s/d 26 Okt 2026</small>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:16px">⋮</button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#166534;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">SR</div>
                                <div>
                                    <b style="color:var(--t)">Siti Rahmawati <span style="font-size:9px;background:#dcfce7;color:#166534;padding:1px 6px;border-radius:4px;font-weight:600">Dosen</span></b><br>
                                    <small style="color:var(--m)">INX-2026-02911</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Algoritma Pemrograman</b><br>
                            <small style="color:var(--m)">085.1 SIT a • TIK-02</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">22 Okt 2026</b><br>
                            <small style="color:#059669;font-weight:700">Antrean #1 (Prioritas)</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:3px 8px;border-radius:6px">Siap Diambil (Rak B-02)</span><br>
                            <small style="color:var(--m)">Batas: 27 Okt (Sisa 36 Jam)</small>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:16px">⋮</button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#374151;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">DA</div>
                                <div>
                                    <b style="color:var(--t)">Dimas Arya <span style="font-size:9px;background:#f3f4f6;color:#374151;padding:1px 6px;border-radius:4px;font-weight:600">Umum</span></b><br>
                                    <small style="color:var(--m)">INX-2026-07734</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Bumi Manusia</b><br>
                            <small style="color:var(--m)">899.221 TOE b • LIT-06</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">19 Okt 2026</b><br>
                            <small style="color:#dc2626;font-weight:700">Antrean Batal</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#fee2e2;color:#dc2626;font-size:10.5px;font-weight:700;padding:3px 8px;border-radius:6px">Kedaluwarsa (Batal)</span><br>
                            <small style="color:#dc2626">Lewat 3 hari tidak diambil</small>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:16px">⋮</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div style="padding:12px 16px;display:flex;justify-content:space-between;align-items:center;background:#f9fafb;font-size:11.5px;color:var(--m)">
                <span>Menampilkan <b>4 dari 34</b> antrean reservasi</span>
                <div style="display:flex;gap:4px;align-items:center">
                    <span>‹</span>
                    <button style="background:#153223;color:#fff;border:none;width:24px;height:24px;border-radius:4px;font-weight:700">1</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">2</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">3</button>
                    <span>...</span>
                    <button style="background:#fff;border:1px solid var(--ln);padding:0 6px;height:24px;border-radius:4px">9</button>
                    <span>›</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Detail Reservasi -->
    <div style="display:flex;flex-direction:column;gap:16px">
        <!-- Top Ticket Card -->
        <div style="background:#153223;color:#fff;border-radius:12px;padding:16px;position:relative">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <span style="font-size:9.5px;font-weight:700;letter-spacing:.05em">Inovexa</span>
                <span style="background:#059669;color:#fff;font-size:9px;padding:2px 6px;border-radius:4px;font-weight:700">Siap Diambil</span>
            </div>
            <div style="font-size:9px;color:#a9cbb7;margin-bottom:2px">PUAT RESERVASI BUKU</div>
            <div style="font-size:13.5px;font-weight:800;font-family:monospace;margin-bottom:8px">RSV-2026-1025-089</div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:11px;margin-bottom:10px;background:rgba(0,0,0,.2);padding:8px;border-radius:6px">
                <div>
                    <span style="color:#94a3b8;font-size:9px;display:block">PEMUSTAKA</span>
                    <b>Herdman</b><br><small style="color:#cbd5e1">INX-2026-08912</small>
                </div>
                <div>
                    <span style="color:#94a3b8;font-size:9px;display:block">RAK TRANSIT</span>
                    <b>Lemari Kaca A-02</b><br><small style="color:#4ade80">Rak Loket 01</small>
                </div>
            </div>

            <div style="font-size:9.5px;color:#94a3b8;margin-bottom:2px">JUDUL KOLEKSI &amp; EKSEMPLAR</div>
            <div style="font-size:12px;font-weight:700;margin-bottom:2px">Laskar Pelangi</div>
            <div style="font-size:10px;color:#cbd5e1;margin-bottom:10px">BUK-8994-LP • Call: 899.221 HIR l</div>

            <div style="display:flex;justify-content:space-between;align-items:center;background:rgba(255,255,255,.1);padding:8px;border-radius:6px;margin-bottom:10px">
                <div>
                    <span style="font-size:9px;color:#cbd5e1;display:block">BATAS WAKTU AMBIL</span>
                    <b style="font-size:11.5px;color:#fef08a">26 Okt 2026, 16:30 WIB</b>
                </div>
                <span style="background:#dc2626;color:#fff;font-size:9px;font-weight:700;padding:2px 6px;border-radius:4px">Sisa 18 Jam</span>
            </div>

            <div style="background:#fff;padding:6px;border-radius:4px;text-align:center">
                <div style="font-family:monospace;font-size:9px;color:#000;letter-spacing:2px">||| | |||| || ||||||</div>
            </div>
        </div>

        <!-- Aksi Loket Petugas Sirkulasi -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px">
            <h4 style="font-size:13px;font-weight:800;color:var(--t);margin:0 0 10px">AKSI LOKET PETUGAS SIRKULASI</h4>
            <div style="display:flex;flex-direction:column;gap:8px">
                <button style="background:#153223;color:#fff;border:none;padding:10px;border-radius:8px;font-size:11.5px;font-weight:700;text-align:left;cursor:pointer">✓ Serahkan Buku &amp; Konversi ke Peminjaman</button>
                <button style="background:#f9fafb;border:1px solid var(--ln);color:var(--t);padding:10px;border-radius:8px;font-size:11.5px;font-weight:600;text-align:left;cursor:pointer">💬 Kirim Notifikasi Siap Ambil (WhatsApp)</button>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:2px">
                    <button style="background:#f9fafb;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11px;font-weight:600;cursor:pointer">⏱️ Perpanjang (+24h)</button>
                    <button style="background:#fff1f2;border:1px solid #fecdd3;color:#be123c;padding:8px;border-radius:8px;font-size:11px;font-weight:600;cursor:pointer">✕ Batalkan Simpan</button>
                </div>
            </div>
        </div>

        <!-- Kapasitas Rak Transit Loket -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                <h4 style="font-size:13px;font-weight:800;color:var(--t);margin:0">KAPASITAS RAK TRANSIT LOKET</h4>
                <span style="font-size:10px;color:var(--m)">8 / 15 Slot</span>
            </div>
            <div style="width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden;margin-bottom:10px">
                <div style="width:53%;height:100%;background:#059669"></div>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:11.5px;color:var(--m)">
                <span>Slot Terpakai: <b>53%</b><br><small>Tersedia 7 slot kosong</small></span>
                <span style="text-align:right">Rata-Rata Waktu Tunggu:<br><b style="color:var(--t)">2,4 Hari</b><br><small>Dari booking loket</small></span>
            </div>
        </div>
    </div>
</div>
