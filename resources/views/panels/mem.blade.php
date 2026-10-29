<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;max-width:1450px;margin:0 auto">
    <div style="min-width:0">
        <!-- Top Title & Buttons -->
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
            <div>
                <div style="font-size:10px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:3px">Dashboard Admin Sirkulasi &rsaquo; Kelola Data Anggota</div>
                <h2 style="font-size:22px;font-weight:800;color:var(--t);margin:0;display:flex;align-items:center;gap:10px">
                    Kelola Data Anggota Perpustakaan
                    <span style="font-size:9.5px;background:#e5e7eb;color:var(--t);padding:2px 8px;border-radius:4px;font-weight:600">Modul Master Sirkulasi</span>
                </h2>
                <p style="font-size:11.5px;color:var(--m);margin:4px 0 0">Pusat kendali basis data anggota terpadu. Verifikasi berkas KTM/KTP, pantau batas kuota peminjaman, perpanjangan smart card, serta audit kepatuhan sirkulasi pemustaka secara real-time.</p>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">🖨️ Cetak Kartu Massal</button>
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📥 Import CSV/Excel</button>
                <button style="background:#153223;color:#fff;border:none;padding:7px 14px;border-radius:8px;font-size:11.5px;font-weight:700;cursor:pointer">+ Tambah Anggota Baru</button>
            </div>
        </div>

        <!-- Top Stats Grid -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px">
            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">TOTAL ANGGOTA TERDAFTAR</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">1.890 <span style="font-size:11px;font-weight:normal;color:var(--m)">Orang</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">+28 registrasi bulan ini</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">👥</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">ANGGOTA AKTIF SIRKULASI</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">1.642 <span style="font-size:11px;font-weight:normal;color:var(--m)">Anggota</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">● Status valid bebas sanksi (86.8%)</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">📜</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">VERIFIKASI KTM / BERKAS</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">14 <span style="font-size:11px;font-weight:normal;color:var(--m)">Orang</span></div>
                <span style="font-size:10px;color:#d97706;font-weight:600;background:#fef3c7;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚠️ Butuh validasi loket hari ini</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">📋</span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">MASA BERLAKU HABIS</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">24 <span style="font-size:11px;font-weight:normal;color:var(--m)">Orang</span></div>
                <span style="font-size:10px;color:#dc2626;font-weight:600;background:#fee2e2;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚡ Perlu perpanjangan masa aktif</span>
                <span style="position:absolute;right:14px;top:14px;font-size:16px">📅</span>
            </div>
        </div>

        <!-- Search & Filters -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px;margin-bottom:14px;display:flex;gap:10px;align-items:center">
            <div style="flex:1;position:relative">
                <span style="position:absolute;left:12px;top:9px;color:var(--m);font-size:12px">🔍</span>
                <input type="text" placeholder="Cari NIA (INX-...), nama lengkap, NIK..." style="width:100%;padding:8px 30px 8px 34px;border:1px solid var(--ln);border-radius:6px;font-size:12px">
                <span style="position:absolute;right:10px;top:8px;background:#f3f4f6;color:var(--m);font-size:10px;padding:2px 5px;border-radius:4px">ESC</span>
            </div>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Semua Kategori Pemustaka</option>
            </select>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Paling Baru Terdaftar</option>
            </select>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 12px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer">⚙️ Filter Lanjutan</button>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 10px;border-radius:6px;font-size:12px;cursor:pointer">📥</button>
        </div>

        <!-- Sub Tabs & Info -->
        <div style="display:flex;gap:8px;margin-bottom:12px;align-items:center">
            <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Semua (1.890)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Aktif (1.642)</button>
            <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Menunggu Verifikasi 14</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Ditangguhkan (10)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Kedaluwarsa (24)</button>
        </div>
        <div style="font-size:11.5px;color:var(--m);margin-bottom:10px">Menampilkan <b>6 data</b> anggota relevan</div>

        <!-- Bulk Bar -->
        <div style="background:#153223;color:#fff;padding:8px 14px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;font-size:12px">
            <div style="display:flex;align-items:center;gap:10px">
                <input type="checkbox" checked style="accent-color:#059669;width:15px;height:15px">
                <span><b>2 Anggota Dipilih</b></span>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">Kirim Notifikasi WhatsApp</button>
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">Cetak Kartu Terpilih</button>
                <button style="background:none;border:none;color:#cbd5e1;font-size:11px;cursor:pointer">Batal</button>
            </div>
        </div>

        <!-- Main Table -->
        <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;overflow:hidden">
            <table style="width:100%;border-collapse:collapse;text-align:left;font-size:12px">
                <thead>
                    <tr style="background:#f9fafb;border-bottom:1px solid var(--ln);color:var(--m);font-size:10.5px;font-weight:700">
                        <th style="padding:12px;width:30px"><input type="checkbox"></th>
                        <th style="padding:12px">ANGGOTA &amp; IDENTITAS</th>
                        <th style="padding:12px">KONTAK &amp; DOMISILI</th>
                        <th style="padding:12px">PINJAMAN AKTIF</th>
                        <th style="padding:12px">STATUS AKUN</th>
                        <th style="padding:12px;text-align:right">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#b45309;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">HM</div>
                                <div>
                                    <b style="color:var(--t)">Herdman <span style="font-size:9px;background:#f3f4f6;color:#374151;padding:1px 6px;border-radius:4px;font-weight:600">Umum</span></b><br>
                                    <small style="color:var(--m)">NIA : INX-2026-08912</small><br>
                                    <small style="color:var(--m)">NIK: 3174092408940003</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t);font-size:11.5px">herdman.library@inovexa.id</b><br>
                            <small style="color:var(--m)">+62 812-9842-1188</small><br>
                            <small style="color:var(--m)">Jakarta Selatan</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">2 Buku</b> <span style="color:#059669;font-size:10px">Tepat Waktu</span><br>
                            <small style="color:var(--m)">Jatuh tempo: 26 Okt 2026</small><br>
                            <small style="color:var(--m)">Denda : Rp 0</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:12px">● Aktif</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">💬</button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#b45309;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">KW</div>
                                <div>
                                    <b style="color:var(--t)">Kevin Wijaya <span style="font-size:9px;background:#e0f2fe;color:#0369a1;padding:1px 6px;border-radius:4px;font-weight:600">Mahasiswa</span></b><br>
                                    <small style="color:var(--m)">NIA : MBR-2026-04321</small><br>
                                    <small style="color:var(--m)">Univ. Indonesia (NIM: 04321)</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t);font-size:11.5px">kevin.wj@campus.ac.id</b><br>
                            <small style="color:var(--m)">+62 857-3319-2041</small><br>
                            <small style="color:var(--m)">Depok, Jawa Barat</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">Bebas Pinjam (0)</b><br>
                            <small style="color:var(--m)">Kuota: 0/3 Terpakai</small><br>
                            <small style="color:var(--m)">Denda : Rp 0</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#fed7aa;color:#c2410c;font-size:10px;font-weight:700;padding:3px 8px;border-radius:12px">Perlu Verifikasi</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">✓</button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#374151;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">PR</div>
                                <div>
                                    <b style="color:var(--t)">Princess <span style="font-size:9px;background:#fae8ff;color:#86198f;padding:1px 6px;border-radius:4px;font-weight:600">Peneliti</span></b><br>
                                    <small style="color:var(--m)">NIA : INX-2026-08912</small><br>
                                    <small style="color:var(--m)">Institusi Riset Regional</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t);font-size:11.5px">princess@research.org</b><br>
                            <small style="color:var(--m)">+62 821-4459-9912</small><br>
                            <small style="color:var(--m)">Bandung, Jawa Barat</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">1 Buku</b> <span style="color:#059669;font-size:10px">Aktif</span><br>
                            <small style="color:var(--m)">Jatuh tempo: 26 Okt 2026</small><br>
                            <small style="color:var(--m)">Denda : Rp 0</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:12px">● Aktif</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">💬</button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr style="border-bottom:1px solid var(--ln);background:#f0fdf4">
                        <td style="padding:12px"><input type="checkbox" checked style="accent-color:#059669"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#9a3412;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">AF</div>
                                <div>
                                    <b style="color:var(--t)">Ahmad Fauzi <span style="font-size:9px;background:#e0f2fe;color:#0369a1;padding:1px 6px;border-radius:4px;font-weight:600">Mahasiswa</span></b><br>
                                    <small style="color:var(--m)">NIA : INX-2026-04118</small><br>
                                    <small style="color:var(--m)">Teknik Informatika S-1</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t);font-size:11.5px">ahmad.fauzi@student.id</b><br>
                            <small style="color:var(--m)">+62 813-2209-8871</small><br>
                            <small style="color:var(--m)">Jakarta Timur</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:#dc2626">1 Buku Telat 1 Hari</b><br>
                            <small style="color:var(--m)">Buku: Metodologi Kuantitatif</small><br>
                            <small style="color:#dc2626;font-weight:700">Denda : Rp 2.000</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#fee2e2;color:#dc2626;font-size:10px;font-weight:700;padding:3px 8px;border-radius:12px">Ada Denda</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">💳</button>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#166534;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">SR</div>
                                <div>
                                    <b style="color:var(--t)">Siti Rahmawati <span style="font-size:9px;background:#dcfce7;color:#166534;padding:1px 6px;border-radius:4px;font-weight:600">Dosen</span></b><br>
                                    <small style="color:var(--m)">NIA : INX-2026-02911</small><br>
                                    <small style="color:var(--m)">Fakultas Psikologi Terapan</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t);font-size:11.5px">siti.rahma@univ.ac.id</b><br>
                            <small style="color:var(--m)">+62 811-2388-901</small><br>
                            <small style="color:var(--m)">Jakarta Pusat</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t)">1 Buku</b> <span style="color:#059669;font-size:10px">Aktif (5 Hari)</span><br>
                            <small style="color:var(--m)">Buku: Atomic Habits</small><br>
                            <small style="color:var(--m)">Denda : Rp 0</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:12px">● Aktif</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">💬</button>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox"></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:28px;height:28px;border-radius:50%;background:#1e3a8a;color:#fff;display:grid;place-items:center;font-size:11px;font-weight:700">DA</div>
                                <div>
                                    <b style="color:var(--t)">Dimas Arya <span style="font-size:9px;background:#f3f4f6;color:#374151;padding:1px 6px;border-radius:4px;font-weight:600">Umum</span></b><br>
                                    <small style="color:var(--m)">NIA : INX-2026-07734</small><br>
                                    <small style="color:var(--m)">NIK: 3275081203920001</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <b style="color:var(--t);font-size:11.5px">dimas.arya@techmail.com</b><br>
                            <small style="color:var(--m)">+62 815-9921-3441</small><br>
                            <small style="color:var(--m)">Bekasi Barat</small>
                        </td>
                        <td style="padding:12px">
                            <b style="color:#d97706">1 Buku Batas Hari Ini</b><br>
                            <small style="color:var(--m)">Buku: Algoritma &amp; Struktur Data</small><br>
                            <small style="color:var(--m)">Denda : Rp 0</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:12px">● Aktif</span>
                        </td>
                        <td style="padding:12px;text-align:right">
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">👁️</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px;margin-right:4px">📋</button>
                            <button style="background:none;border:none;cursor:pointer;font-size:14px">💬</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div style="padding:12px 16px;display:flex;justify-content:space-between;align-items:center;background:#f9fafb;font-size:11.5px;color:var(--m)">
                <div style="display:flex;align-items:center;gap:6px">
                    <span>Menampilkan</span>
                    <select style="padding:4px 8px;border:1px solid var(--ln);border-radius:4px;background:#fff"><option>10 data</option></select>
                </div>
                <span>dari <b>1.890</b> total anggota</span>
                <div style="display:flex;gap:4px;align-items:center">
                    <span>‹</span>
                    <button style="background:#153223;color:#fff;border:none;width:24px;height:24px;border-radius:4px;font-weight:700">1</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">2</button>
                    <button style="background:#fff;border:1px solid var(--ln);width:24px;height:24px;border-radius:4px">3</button>
                    <span>...</span>
                    <button style="background:#fff;border:1px solid var(--ln);padding:0 6px;height:24px;border-radius:4px">189</button>
                    <span>›</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Detail Anggota -->
    <div style="background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px;height:fit-content">
        <!-- Top Digital Card -->
        <div style="background:#153223;color:#fff;border-radius:10px;padding:16px;margin-bottom:16px;position:relative">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <span style="font-size:9px;font-weight:700;letter-spacing:.05em">INOVEXA PUBLIC LIBRARY</span>
                <span style="background:#059669;color:#fff;font-size:9px;padding:2px 6px;border-radius:4px;font-weight:700">NFC ACTIVE</span>
            </div>
            <div style="font-size:9px;color:#a9cbb7;margin-bottom:2px">KARTU IDENTITAS ANGGOTA DIGITAL</div>
            <div style="font-size:10px;color:#cbd5e1;margin-bottom:6px">NAMA LENGKAP PEMUSTAKA</div>
            <div style="font-size:14px;font-weight:800;margin-bottom:2px">Herdman</div>
            <div style="font-size:10px;color:#cbd5e1;margin-bottom:12px">NIA: INX-2026-08912</div>
            <div style="display:flex;justify-content:space-between;align-items:flex-end">
                <div>
                    <span style="font-size:8.5px;color:#94a3b8;display:block">BERLAKU HINGGA</span>
                    <b style="font-size:11px">12 Des 2027</b>
                </div>
                <div style="background:#fff;padding:4px;border-radius:4px">
                    <div style="font-family:monospace;font-size:8px;color:#000;letter-spacing:1px">BARCODE ID VALID</div>
                </div>
            </div>
        </div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <h4 style="font-size:13px;font-weight:800;color:var(--t);margin:0">Detail &amp; Kepatuhan Anggota</h4>
            <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">Terverifikasi</span>
        </div>

        <div style="margin-bottom:12px">
            <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:4px">
                <span style="color:var(--m)">Hak Kuota Buku Fisik</span>
                <b style="color:var(--t)">2 / 3 Eksemplar Terpakai</b>
            </div>
            <div style="width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden">
                <div style="width:66.6%;height:100%;background:#d97706"></div>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--m);margin-top:3px">
                <span>Sisa kuota: 1 Buku</span>
                <span style="color:#059669;font-weight:600">E-Library: Akses Penuh</span>
            </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:11px;margin-bottom:14px;background:#f9fafb;padding:10px;border-radius:8px">
            <div>
                <span style="color:var(--m);font-size:9.5px;display:block">NIK Terdaftar</span>
                <b>317409248946663</b>
            </div>
            <div>
                <span style="color:var(--m);font-size:9.5px;display:block">Kategori Anggota</span>
                <b>Masyarakat Umum &amp; Peneliti</b>
            </div>
            <div style="margin-top:4px">
                <span style="color:var(--m);font-size:9.5px;display:block">Total Riwayat Pinjam</span>
                <b>34 Transaksi Sukses</b>
            </div>
            <div style="margin-top:4px">
                <span style="color:var(--m);font-size:9.5px;display:block">Kunjungan Terakhir</span>
                <b>Hari Ini, 09:14 WIB (Gate B)</b>
            </div>
        </div>

        <div style="font-size:11.5px;font-weight:700;color:var(--t);margin-bottom:8px">BUKU SEDANG DIPINJAM (2)</div>
        <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:14px">
            <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                <div>
                    <b>Sapiens: Riway...</b><br><small style="color:var(--m)">B-380-1 (Rak 300)</small>
                </div>
                <span style="background:#d1fae5;color:#065f46;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">H-3 Jatuh Tempo</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;background:#f9fafb;padding:8px 10px;border-radius:6px;font-size:11px">
                <div>
                    <b>Metodologi Riset</b><br><small style="color:var(--m)">R-412-D (Rak 400)</small>
                </div>
                <span style="background:#d1fae5;color:#065f46;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:4px">H-3 Jatuh Tempo</span>
            </div>
        </div>

        <button style="width:100%;background:#e5e7eb;color:var(--t);border:none;padding:10px;border-radius:8px;font-size:12px;font-weight:700;margin-bottom:10px;cursor:pointer">💬 Kirim Pengingat WhatsApp</button>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
            <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11px;font-weight:600;cursor:pointer">⏱️ Perpanjang 1 Thn</button>
            <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11px;font-weight:600;cursor:pointer">🖨️ Cetak Smartcard</button>
        </div>
    </div>
</div>
