<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;max-width:1450px;margin:0 auto">
    <div style="min-width:0">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
            <div>
                <div style="font-size:10px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:3px">DASHBOARD ADMIN SIRKULASI &rsaquo; KELOLA KOLEKSI BUKU &amp; EKSEMPLAR</div>
                <h2 style="font-size:22px;font-weight:800;color:var(--t);margin:0;display:flex;align-items:center;gap:10px">
                    Kelola Koleksi Buku &amp; Eksemplar
                    <span style="font-size:9.5px;background:#e5e7eb;color:var(--t);padding:2px 8px;border-radius:4px;font-weight:600">Modul Master Koleksi &amp; Inventaris</span>
                </h2>
                <p style="font-size:11.5px;color:var(--m);margin:3px 0 0">Pusat kendali data bibliografi, eksemplar fisik &amp; digital. Registrasi barcode RFID, klasifikasi DDC, kontrol ketersediaan rak, serta opname stok eksemplar secara real-time.</p>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">🖨️ Cetak Barcode &amp; Label QR Massal</button>
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📥 Import Katalog MARC/Excel</button>
                <button style="background:#153223;color:#fff;border:none;padding:7px 14px;border-radius:8px;font-size:11.5px;font-weight:700;cursor:pointer" onclick="openModal('add-book-modal')">+ Tambah Judul / Eksemplar Baru</button>
            </div>
        </div>

        <!-- Top Stats Grid -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px">
            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                    <span style="font-size:10px;color:var(--m);font-weight:700">TOTAL KOLEKSI / JUDUL TERDAFTAR</span>
                    <span style="font-size:14px">📦</span>
                </div>
                <div style="font-size:22px;font-weight:800;color:var(--t)">12.450 <span style="font-size:11px;font-weight:normal;color:var(--m)">Judul</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">+142 judul baru bulan ini</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                    <span style="font-size:10px;color:var(--m);font-weight:700">EKSEMPLAR FISIK TERSEDIA</span>
                    <span style="font-size:14px">🏛️</span>
                </div>
                <div style="font-size:22px;font-weight:800;color:var(--t)">38.820 <span style="font-size:11px;font-weight:normal;color:var(--m)">Buku</span></div>
                <span style="font-size:10px;color:var(--m);display:block;margin-top:6px">● Tersedia di rak: 32.180 (82.9%)</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                    <span style="font-size:10px;color:var(--m);font-weight:700">EKSEMPLAR SEDANG DIPINJAM</span>
                    <span style="font-size:14px">📖</span>
                </div>
                <div style="font-size:22px;font-weight:800;color:var(--t)">5.490 <span style="font-size:11px;font-weight:normal;color:var(--m)">Buku</span></div>
                <span style="font-size:10px;color:#d97706;font-weight:600;background:#fef3c7;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚠️ 420 mendekati jatuh tempo</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                    <span style="font-size:10px;color:var(--m);font-weight:700">PERAWATAN &amp; RUSAK</span>
                    <span style="font-size:14px">⚠️</span>
                </div>
                <div style="font-size:22px;font-weight:800;color:var(--t)">150 <span style="font-size:11px;font-weight:normal;color:var(--m)">Eksemplar</span></div>
                <span style="font-size:10px;color:#dc2626;font-weight:600;background:#fee2e2;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚡ Perlu restorasi / penggantian</span>
            </div>
        </div>

        <!-- Search & Filters -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px;margin-bottom:14px;display:flex;gap:10px;align-items:center">
            <div style="flex:1;position:relative">
                <span style="position:absolute;left:12px;top:9px;color:var(--m);font-size:12px">🔍</span>
                <input type="text" placeholder="Cari ISBN, Judul Buku, Barcode, Pengarang, DDC..." style="width:100%;padding:8px 12px 8px 34px;border:1px solid var(--ln);border-radius:6px;font-size:12px">
            </div>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Semua Klasifikasi DDC</option>
            </select>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Paling Baru Ditambahkan</option>
            </select>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 12px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer">⚙️ Filter Lanjutan</button>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 10px;border-radius:6px;font-size:12px;cursor:pointer">📥</button>
        </div>

        <!-- Sub Tabs & Bulk Action -->
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <div style="display:flex;gap:8px">
                <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Semua (12.450)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Tersedia di Rak (10.120)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Sedang Dipinjam (1.890)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Dalam Reservasi (290)</button>
                <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Perawatan / Rusak (150)</button>
            </div>
        </div>

        <!-- Bulk Bar (Checked) -->
        <div style="background:#153223;color:#fff;padding:8px 14px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;font-size:12px">
            <div style="display:flex;align-items:center;gap:10px">
                <input type="checkbox" checked style="accent-color:#059669;width:15px;height:15px">
                <span><b>2 Koleksi Dipilih</b></span>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">🖨️ Cetak Label Barcode</button>
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">📦 Mutasi Rak Terpilih</button>
                <button style="background:none;border:none;color:#cbd5e1;font-size:11px;cursor:pointer">Batal</button>
            </div>
        </div>

        <!-- Main Table -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;overflow:hidden">
            <table style="width:100%;border-collapse:collapse;text-align:left;font-size:12px">
                <thead>
                    <tr style="background:#f9fafb;border-bottom:1px solid var(--ln);color:var(--m);font-size:10.5px;font-weight:700">
                        <th style="padding:12px;width:30px"><input type="checkbox"></th>
                        <th style="padding:12px">KOLEKSI &amp; BIBLIOGRAFI</th>
                        <th style="padding:12px">KATEGORI &amp; RAK</th>
                        <th style="padding:12px">STOK EKSEMPLAR</th>
                        <th style="padding:12px">STATUS KATALOG</th>
                        <th style="padding:12px;text-align:right">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 (Selected) -->
                    <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                        <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                        <td style="padding:12px;display:flex;gap:10px;align-items:flex-start">
                            <div style="width:38px;height:52px;background:#e5e7eb;border-radius:4px;flex-shrink:0;background-size:cover;background-position:center;background-image:url('{{ asset('foto/laskar pelangi.jpeg') }}')"></div>
                            <div>
                                <b style="font-size:13px;color:var(--t);display:block">Laskar Pelangi</b>
                                <small style="color:var(--m);display:block">DDC: 899.221 • Andrea Hirata</small>
                                <small style="color:var(--m)">Pustaka (2006)</small><br>
                                <small style="color:#0284c7">ISBN: 978-979-3463-19-2</small>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Sastra &amp; Fiksi</b><br>
                            <small style="color:var(--m)">Rak S-02 • Baris 3<br>Gedung A (Lantai 1)</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">5 Eksemplar</b><br>
                            <span style="color:#059669;font-size:10.5px;background:#d1fae5;padding:1px 6px;border-radius:4px;display:inline-block;margin-top:3px">● Tersedia 3 di Rak</span><br>
                            <small style="color:var(--m)">2 Sedang Dipinjam</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">● Aktif Terbit</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:6px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">📋</button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px;display:flex;gap:10px;align-items:flex-start">
                            <div style="width:38px;height:52px;background:#e5e7eb;border-radius:4px;flex-shrink:0;background-size:cover;background-position:center;background-image:url('{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}')"></div>
                            <div>
                                <b style="font-size:13px;color:var(--t);display:block">Sapiens: Riwayat Singkat Umat Manusia</b>
                                <small style="color:var(--m);display:block">DDC: 999 • Yuval Noah Harari</small>
                                <small style="color:var(--m)">KPG (2017)</small><br>
                                <small style="color:#0284c7">ISBN: 978-602-424-616-3</small>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Sejarah &amp; Antropologi</b><br>
                            <small style="color:var(--m)">Rak S-05-14 • Baris 1<br>Gedung B (Lantai 2)</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">4 Eksemplar</b><br>
                            <span style="color:#059669;font-size:10.5px;background:#d1fae5;padding:1px 6px;border-radius:4px;display:inline-block;margin-top:3px">● Tersedia 2 di Rak</span><br>
                            <small style="color:var(--m)">2 Sedang Dipinjam</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">● Aktif Terbit</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:6px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">📋</button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                        <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                        <td style="padding:12px;display:flex;gap:10px;align-items:flex-start">
                            <div style="width:38px;height:52px;background:#e5e7eb;border-radius:4px;flex-shrink:0;background-size:cover;background-position:center;background-image:url('{{ asset('foto/Filosofi Teras.jpeg') }}')"></div>
                            <div>
                                <b style="font-size:13px;color:var(--t);display:block">Atomic Habits: Perubahan Kecil Hasil Luar Biasa</b>
                                <small style="color:var(--m);display:block">DDC: 158.1 • James Clear</small>
                                <small style="color:var(--m)">Gramedia (2019)</small><br>
                                <small style="color:#0284c7">ISBN: 978-602-06-3317-6</small>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Pengembangan Diri</b><br>
                            <small style="color:var(--m)">Rak PSI-08 • Baris 4<br>Gedung A (Lantai 1)</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">6 Eksemplar</b><br>
                            <span style="color:#b45309;font-size:10.5px;background:#fef3c7;padding:1px 6px;border-radius:4px;display:inline-block;margin-top:3px">⚠️ Sisa 1 di Rak (Stok Kritis)</span><br>
                            <small style="color:var(--m)">5 Sedang Dipinjam</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#ffedd5;color:#c2410c;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">Permintaan Tinggi</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:6px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">📋</button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px;display:flex;gap:10px;align-items:flex-start">
                            <div style="width:38px;height:52px;background:#e5e7eb;border-radius:4px;flex-shrink:0;background-size:cover;background-position:center;background-image:url('{{ asset('foto/Metodologi Penelitian Kualitatif.jpeg') }}')"></div>
                            <div>
                                <b style="font-size:13px;color:var(--t);display:block">Metodologi Penelitian Kualitatif</b>
                                <small style="color:var(--m);display:block">DDC: 001.42 • Prof. Dr. Sugiyono</small>
                                <small style="color:var(--m)">Alfabeta (2022)</small><br>
                                <small style="color:#0284c7">ISBN: 978-602-289-325-9</small>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Pendidikan &amp; Riset</b><br>
                            <small style="color:var(--m)">Rak MET-03 • Baris 2<br>Gedung D (Lantai 2)</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">8 Eksemplar</b><br>
                            <span style="color:#059669;font-size:10.5px;background:#d1fae5;padding:1px 6px;border-radius:4px;display:inline-block;margin-top:3px">● Tersedia 7 di Rak</span><br>
                            <small style="color:var(--m)">1 Sedang Dipinjam</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:4px">● Aktif Terbit</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:6px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">📋</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination Bar -->
            <div style="padding:12px 16px;display:flex;justify-content:space-between;align-items:center;background:#f9fafb;font-size:11.5px;color:var(--m)">
                <span>Menampilkan <b>5 data</b> dari <b>12.450</b> total judul koleksi</span>
                <div style="display:flex;gap:4px;align-items:center">
                    <button style="background:#153223;color:#fff;border:none;width:24px;height:24px;border-radius:4px;font-weight:700">1</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">2</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">3</button>
                    <span>...</span>
                    <button style="background:#fff;border:1px solid var(--ln);padding:0 6px;height:24px;border-radius:4px">2.490</button>
                    <span>›</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Detail Koleksi -->
    <div style="background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px;height:fit-content">
        <!-- Top RFID Card Preview -->
        <div style="background:#153223;color:#fff;border-radius:10px;padding:16px;margin-bottom:16px;position:relative">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <span style="font-size:9.5px;font-weight:700;letter-spacing:.05em">INOVEXA LIBRARY</span>
                <span style="background:#059669;color:#fff;font-size:9px;padding:2px 6px;border-radius:4px;font-weight:700">RFID ACTIVE</span>
            </div>
            <div style="font-size:10px;color:#a3e635;margin-bottom:2px">NO. PANGGIL (CALL NUMBER)</div>
            <div style="font-size:16px;font-weight:800;font-family:monospace;margin-bottom:8px">899.221 HIR L</div>
            <div style="font-size:14px;font-weight:700;margin-bottom:2px">Laskar Pelangi</div>
            <div style="font-size:10.5px;color:#cbd5e1;margin-bottom:12px">Andrea Hirata • Bentang Pustaka</div>
            <div style="font-size:9.5px;color:#94a3b8;margin-bottom:4px">RFID UID / CHIP</div>
            <div style="font-size:11px;font-family:monospace;margin-bottom:10px">E289-3360-2826-9941</div>
            <div style="background:#fff;padding:6px;border-radius:4px;text-align:center">
                <div style="font-family:monospace;font-size:9px;color:#000;letter-spacing:2px">||| | |||| || ||||||</div>
            </div>
        </div>

        <!-- Detail Koleksi & Fisik -->
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <h4 style="font-size:13.5px;font-weight:800;color:var(--t);margin:0">Detail Koleksi &amp; Fisik</h4>
            <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">Terverifikasi</span>
        </div>

        <div style="margin-bottom:12px">
            <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:4px">
                <span style="color:var(--m)">Ketersediaan Eksemplar</span>
                <b style="color:var(--t)">3 / 5 Eksemplar Siap Pinjam</b>
            </div>
            <div style="width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden">
                <div style="width:60%;height:100%;background:#059669"></div>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--m);margin-top:3px">
                <span>Sisa di rak: 3 eksemplar</span>
                <span>Bisa Reservasi Online</span>
            </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:11.5px;margin-bottom:14px;background:#f9fafb;padding:10px;border-radius:8px">
            <div>
                <span style="color:var(--m);font-size:10px;display:block">Klasifikasi DDC</span>
                <b>899.221 (Fiksi Indo)</b>
            </div>
            <div>
                <span style="color:var(--m);font-size:10px;display:block">Bahasa &amp; Edisi</span>
                <b>Indonesia (Cetakan Ke-14)</b>
            </div>
            <div style="margin-top:6px">
                <span style="color:var(--m);font-size:10px;display:block">Lokasi Rak &amp; Lantai</span>
                <b>Rak S-02 (Lantai 1)</b>
            </div>
            <div style="margin-top:6px">
                <span style="color:var(--m);font-size:10px;display:block">Total Sirkulasi Pinjam</span>
                <b>142 Kali Peminjaman</b>
            </div>
        </div>

        <div style="font-size:11.5px;font-weight:700;color:var(--t);margin-bottom:8px">DAFTAR EKSEMPLAR FISIK (5 BUKU)</div>
        <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:14px">
            <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                <div>
                    <b>B1</b> &nbsp; LNK-EK-8994-01<br><small style="color:var(--m)">Kondisi: Sangat Baik</small>
                </div>
                <span style="background:#d1fae5;color:#065f46;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">Di Rak</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                <div>
                    <b>B2</b> &nbsp; LNK-EK-8994-02<br><small style="color:var(--m)">Dipinjam: Herdiman</small>
                </div>
                <span style="background:#fef3c7;color:#b45309;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">Dipinjam</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                <div>
                    <b>B3</b> &nbsp; LNK-EK-8994-03<br><small style="color:var(--m)">Dipinjam: Ahmad F.</small>
                </div>
                <span style="background:#fef3c7;color:#b45309;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">Dipinjam</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                <div>
                    <b>B4</b> &nbsp; LNK-EK-8994-04<br><small style="color:var(--m)">Kondisi: Baik + Rak 1</small>
                </div>
                <span style="background:#d1fae5;color:#065f46;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">Di Rak</span>
            </div>
        </div>

        <button style="width:100%;background:#153223;color:#fff;border:none;padding:10px;border-radius:8px;font-size:12px;font-weight:700;margin-bottom:10px;cursor:pointer">🖨️ Cetak Label Barcode Eksemplar</button>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
            <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">🔍 Audit Opname</button>
            <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📋 Edit MARC</button>
        </div>
    </div>
</div>
