@php
    $profile = session('member_profile', [
        'name'     => 'Herdman',
        'nia'      => 'INX-2026-08912',
        'nik'      => '3374*********01',
        'email'    => 'herdman.library@inovexa.id',
        'phone'    => '+62 812-3456-7890',
        'category' => 'Masyarakat Umum / Peneliti Mandiri',
        'reg_date' => '15 Januari 2024',
        'address'  => 'Jl. Pemuda No. 88, Kel. Pandansari, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132',
    ]);
@endphp

{{-- ================================================================= --}}
{{-- HALAMAN PROFIL & KARTU ANGGOTA DIGITAL PERSIS GAMBAR 1            --}}
{{-- ================================================================= --}}

<div class="profile-card-page">
    {{-- Breadcrumb & Header Halaman --}}
    <div class="profile-header-wrap">
        <nav class="profile-breadcrumb">
            <a href="{{ route('dashboard', 'ov') }}">Portal Anggota</a>
            <span class="profile-breadcrumb-sep">&gt;</span>
            <span class="profile-breadcrumb-cur">Profil &amp; Kartu Digital</span>
        </nav>
        <h1 class="profile-main-title">Profil &amp; Kartu Anggota Digital</h1>
        <p class="profile-main-desc">
            Kelola data pribadi keanggotaan, verifikasi identitas resmi, dan akses kartu digital untuk transaksi peminjaman fisik di loket sirkulasi serta gerbang presensi mandiri.
        </p>
    </div>

    {{-- Layout Dua Kolom: Kiri (Kartu & Kuota) | Kanan (Tabs & Data Pribadi) --}}
    <div class="profile-two-col-grid">
        {{-- KOLOM KIRI: Kartu Digital, NFC Switch, Action Buttons, Kuota & Masa Aktif --}}
        <div class="profile-left-col">
            {{-- 1. Kartu Digital Smartpass (Desain Hijau Tua Gradient Metalik) --}}
            <div class="digital-smartpass-card" id="digitalSmartpassCard">
                {{-- Ambient card lighting effects --}}
                <div class="smartpass-glow-orb"></div>
                <div class="smartpass-mesh-lines"></div>

                {{-- Header Kartu --}}
                <div class="smartpass-head-row">
                    <div class="smartpass-brand-lockup">
                        <svg class="smartpass-brand-icon" width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="4" width="20" height="16" rx="3" stroke="#86efac" stroke-width="2"/>
                            <path d="M7 10h10M7 14h6" stroke="#86efac" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="17" cy="14" r="1.5" fill="#86efac"/>
                        </svg>
                        <div class="smartpass-brand-text">
                            <span class="smartpass-tag-label">DIGITAL SMARTPASS</span>
                            <span class="smartpass-brand-title">INOVEXA LIBRARY</span>
                        </div>
                    </div>
                    <span class="smartpass-status-pill" id="cardStatusBadge">STATUS: AKTIF</span>
                </div>

                {{-- Baris EMV Gold Chip & Kontak RFID / NFC --}}
                <div class="smartpass-chip-row">
                    {{-- Realistic Metallic Gold EMV Microchip --}}
                    <div class="emv-gold-chip" title="EMV Smart Contact">
                        <div class="emv-chip-line h1"></div>
                        <div class="emv-chip-line h2"></div>
                        <div class="emv-chip-line v1"></div>
                        <div class="emv-chip-core"></div>
                    </div>

                    {{-- RFID / NFC Contactless Waves Indicator --}}
                    <div class="smartpass-rfid-block">
                        <span class="smartpass-rfid-txt">RFID / NFC</span>
                        <svg class="smartpass-wave-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8.5 16.5a5 5 0 0 1 0-9" stroke-linecap="round"/>
                            <path d="M5 19.5a9 9 0 0 1 0-15" stroke-linecap="round"/>
                            <path d="M12 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" fill="currentColor"/>
                        </svg>
                    </div>
                </div>

                {{-- Nomor Kartu Anggota Besar Terformat --}}
                <div class="smartpass-num-wrap">
                    <div class="smartpass-card-digits">8912 • 4022 •</div>
                    <div class="smartpass-card-digits">9012 • 0026</div>
                    <div class="smartpass-sid-line">SID Transponder : RFID-HEX-9901A</div>
                </div>

                {{-- Footer Kartu: Nama Pemegang & QR Code OPAC --}}
                <div class="smartpass-foot-row">
                    <div class="smartpass-holder-info">
                        <span class="smartpass-holder-lbl">NAMA PEMEGANG KARTU</span>
                        <div class="smartpass-holder-name">{{ strtoupper($profile['name'] ?? 'HERDMAN') }}</div>
                        <div class="smartpass-holder-meta">Anggota Reguler / Umum</div>
                        <div class="smartpass-holder-expiry">Berlaku s/d: 31 Desember 2026</div>
                    </div>

                    {{-- Box Putih QR Code dengan Label SCAN OPAC --}}
                    <div class="smartpass-qr-badge" title="Pindai di Kios OPAC & Meja Sirkulasi" onclick="toast('QR Code siap dipindai di loket sirkulasi & turnstile')">
                        <div class="smartpass-qr-svg-wrap">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                                {{-- Background putih bersih --}}
                                <rect width="42" height="42" fill="#ffffff" rx="2"/>
                                {{-- Finder Pattern Kiri Atas --}}
                                <rect x="3" y="3" width="11" height="11" rx="2" fill="#0f172a"/>
                                <rect x="5" y="5" width="7" height="7" rx="1" fill="#ffffff"/>
                                <rect x="7" y="7" width="3" height="3" fill="#0f172a"/>
                                {{-- Finder Pattern Kanan Atas --}}
                                <rect x="28" y="3" width="11" height="11" rx="2" fill="#0f172a"/>
                                <rect x="30" y="5" width="7" height="7" rx="1" fill="#ffffff"/>
                                <rect x="32" y="7" width="3" height="3" fill="#0f172a"/>
                                {{-- Finder Pattern Kiri Bawah --}}
                                <rect x="3" y="28" width="11" height="11" rx="2" fill="#0f172a"/>
                                <rect x="5" y="30" width="7" height="7" rx="1" fill="#ffffff"/>
                                <rect x="7" y="32" width="3" height="3" fill="#0f172a"/>
                                {{-- Modul QR Data Acak Teratur --}}
                                <rect x="17" y="3" width="3" height="3" fill="#0f172a"/>
                                <rect x="22" y="3" width="3" height="3" fill="#0f172a"/>
                                <rect x="17" y="8" width="3" height="3" fill="#0f172a"/>
                                <rect x="22" y="8" width="3" height="3" fill="#0f172a"/>
                                <rect x="17" y="13" width="3" height="3" fill="#0f172a"/>
                                <rect x="3" y="17" width="3" height="3" fill="#0f172a"/>
                                <rect x="8" y="17" width="3" height="3" fill="#0f172a"/>
                                <rect x="13" y="17" width="3" height="3" fill="#0f172a"/>
                                <rect x="18" y="18" width="6" height="6" rx="1" fill="#0f172a"/>
                                <rect x="28" y="17" width="3" height="3" fill="#0f172a"/>
                                <rect x="33" y="17" width="3" height="3" fill="#0f172a"/>
                                <rect x="17" y="26" width="3" height="3" fill="#0f172a"/>
                                <rect x="22" y="26" width="3" height="3" fill="#0f172a"/>
                                <rect x="28" y="26" width="3" height="3" fill="#0f172a"/>
                                <rect x="33" y="26" width="3" height="3" fill="#0f172a"/>
                                <rect x="28" y="31" width="3" height="3" fill="#0f172a"/>
                                <rect x="33" y="31" width="3" height="3" fill="#0f172a"/>
                                <rect x="17" y="36" width="3" height="3" fill="#0f172a"/>
                                <rect x="28" y="36" width="3" height="3" fill="#0f172a"/>
                                <rect x="33" y="36" width="3" height="3" fill="#0f172a"/>
                            </svg>
                        </div>
                        <span class="smartpass-qr-label">SCAN OPAC</span>
                    </div>
                </div>
            </div>

            {{-- 2. Box NFC Auto-Checkin & Toggle Switch --}}
            <div class="nfc-autocheckin-box">
                <div class="nfc-box-left">
                    <div class="nfc-icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="2" width="14" height="20" rx="3"/>
                            <path d="M12 18h.01"/>
                            <path d="M9 7.5a4 4 0 0 1 6 0"/>
                            <path d="M7.5 5a6.5 6.5 0 0 1 9 0"/>
                        </svg>
                    </div>
                    <div class="nfc-text-wrap">
                        <div class="nfc-title">NFC Auto-Checkin</div>
                        <div class="nfc-subtitle">Otomatisasi turnstile gerbang masuk</div>
                    </div>
                </div>
                <label class="toggle-switch-ui" title="Aktifkan/Nonaktifkan Otomasi NFC">
                    <input type="checkbox" id="nfcToggleInput" checked onchange="handleNfcToggle(this)">
                    <span class="toggle-slider-round"></span>
                </label>
            </div>

            {{-- 3. Tombol Aksi: Ubah PIN Sirkulasi & Bekukan Kartu --}}
            <div class="card-action-btn-row">
                <button type="button" class="btn-card-action" onclick="openModal('pin-change-modal')">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="5" width="20" height="14" rx="2"/>
                        <line x1="2" y1="10" x2="22" y2="10"/>
                    </svg>
                    <span>Ubah PIN Sirkulasi</span>
                </button>
                <button type="button" class="btn-card-action btn-freeze-action" id="freezeCardBtn" onclick="toggleFreezeCard()">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <span id="freezeBtnText">Bekukan Kartu</span>
                </button>
            </div>

            {{-- 4. Hak Akses & Kuota Anggota (Periode 2026) --}}
            <div class="quota-section-wrap">
                <div class="quota-head-row">
                    <h3 class="quota-title">Hak Akses &amp; Kuota Anggota</h3>
                    <span class="quota-period-badge">PERIODE 2026</span>
                </div>

                {{-- Box Kuota Pinjam Buku Fisik (2 / 3 Buku, Bar Oranye) --}}
                <div class="quota-item-card">
                    <div class="quota-item-top">
                        <div class="quota-item-name">
                            <span class="quota-icon-badge orange-badge">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#ea580c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                    <path d="M6 6h10M6 10h10M6 14h6"/>
                                </svg>
                            </span>
                            <b>Kuota Pinjam Buku Fisik</b>
                        </div>
                        <span class="quota-count-val">2 / 3 Buku</span>
                    </div>
                    <div class="quota-progress-track">
                        <div class="quota-progress-fill" style="width: 66.6%;"></div>
                    </div>
                    <div class="quota-item-desc">Tersisa 1 kuota peminjaman aktif di perpustakaan fisik.</div>
                </div>

                {{-- Box Akses E-Library & E-Book (Unlimited) --}}
                <div class="quota-item-card">
                    <div class="quota-item-top">
                        <div class="quota-item-name">
                            <span class="quota-icon-badge green-badge">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="2" width="16" height="20" rx="2" ry="2"/>
                                    <line x1="12" y1="18" x2="12.01" y2="18"/>
                                </svg>
                            </span>
                            <b>Akses E-Library &amp; E-Book</b>
                        </div>
                        <span class="quota-pill-unlimited">Unlimited</span>
                    </div>
                    <div class="quota-item-desc">EPUB, PDF Interaktif, &amp; audio</div>
                </div>

                {{-- 2 Kotak Ringkas Bawah: Masa Aktif Kartu & Denda Berjalan --}}
                <div class="quota-stats-grid">
                    <div class="stat-mini-box">
                        <span class="stat-mini-label">Masa Aktif Kartu</span>
                        <div class="stat-mini-value">285 Hari</div>
                        <div class="stat-mini-sub green-sub">
                            <span class="stat-icon-sync">🔄</span> Auto-renewal
                        </div>
                    </div>

                    <div class="stat-mini-box">
                        <span class="stat-mini-label">Denda Berjalan</span>
                        <div class="stat-mini-value">Rp 0</div>
                        <div class="stat-mini-sub green-sub">
                            <span class="stat-icon-shield">🛡️</span> Bebas Tanggungan
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Tabs Navigasi & Form Data Pribadi --}}
        <div class="profile-right-col">
            {{-- Tabs Navigasi Horizontal --}}
            <div class="profile-tabs-bar">
                <button type="button" class="profile-tab-btn active" onclick="switchProfileTab('pribadi', this)">Data Pribadi</button>
                <button type="button" class="profile-tab-btn" onclick="switchProfileTab('kontak', this)">Kontak &amp; Alamat</button>
                <button type="button" class="profile-tab-btn" onclick="switchProfileTab('preferensi', this)">Preferensi Baca &amp; Notifikasi</button>
                <button type="button" class="profile-tab-btn" onclick="switchProfileTab('keamanan', this)">Keamanan Akun</button>
            </div>

            {{-- Kartu Formulir Data Pribadi Sesuai Image 1 --}}
            <div class="profile-form-card">
                {{-- Baris Avatar Profil & Aksi Foto --}}
                <div class="profile-avatar-row">
                    <div class="profile-avatar-lockup">
                        <div class="profile-avatar-large" id="avatarPreviewContainer">
                            <span class="profile-avatar-initial" id="avatarInitial">H</span>
                            <button type="button" class="avatar-camera-btn" onclick="document.getElementById('avatarFileInput').click()" title="Unggah Foto Baru">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                                    <circle cx="12" cy="13" r="4"/>
                                </svg>
                            </button>
                        </div>
                        <input type="file" id="avatarFileInput" accept="image/png, image/jpeg" style="display:none" onchange="previewAvatarImage(this)">
                        <div class="profile-avatar-meta">
                            <h2 class="profile-user-heading" id="displayUserName">{{ $profile['name'] ?? 'Herdman' }}</h2>
                            <div class="profile-user-sub">Anggota Reguler Aktif • ID #8841</div>
                            <div class="profile-user-hint">Format: JPG, PNG maks. 2MB</div>
                        </div>
                    </div>

                    <div class="profile-avatar-actions">
                        <button type="button" class="btn-avatar-pill" onclick="document.getElementById('avatarFileInput').click()">Ubah Foto</button>
                        <button type="button" class="btn-avatar-delete" onclick="resetAvatarImage()">Hapus</button>
                    </div>
                </div>

                {{-- Formulir Data Pribadi --}}
                <form method="POST" action="{{ route('profile.update') }}" id="memberProfileForm" onsubmit="handleProfileSubmit(event)">
                    @csrf

                    <div class="profile-input-grid">
                        {{-- 1. Nama Lengkap Sesuai KTP --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_name">Nama Lengkap Sesuai KTP</label>
                                <span class="verified-pill">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="3">
                                        <polyline points="20 6 9 17 4 12"/>
                                    </svg>
                                    Terverifikasi
                                </span>
                            </div>
                            <div class="profile-input-wrap readonly-wrap">
                                <input type="text" id="inp_name" name="name" value="{{ $profile['name'] ?? 'Herdman' }}" readonly>
                                <span class="input-suffix-icon" title="Data identitas resmi terkunci">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    </svg>
                                </span>
                            </div>
                            <span class="profile-field-hint">Perubahan nama resmi wajib konfirmasi ke loket sirkulasi fisik.</span>
                        </div>

                        {{-- 2. Nomor Induk Anggota (NIA) --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_nia">Nomor Induk Anggota (NIA)</label>
                            </div>
                            <div class="profile-input-wrap mono-wrap">
                                <input type="text" id="inp_nia" value="{{ $profile['nia'] ?? 'INX-2026-08912' }}" readonly>
                                <button type="button" class="input-suffix-btn" onclick="copyNia('{{ $profile['nia'] ?? 'INX-2026-08912' }}')" title="Salin NIA">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#b45309" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="profile-field-hint">Terdaftar di Pangkalan Data Induk Perpustakaan Nasional.</span>
                        </div>

                        {{-- 3. NIK / No. KTP Warga Negara --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_nik">NIK / No. KTP Warga Negara</label>
                            </div>
                            <div class="profile-input-wrap mono-wrap">
                                <input type="text" id="inp_nik" value="3374*********01" readonly>
                                <button type="button" class="input-suffix-btn" id="nikEyeBtn" onclick="toggleNikMask()" title="Tampilkan/Sembunyikan NIK">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            <span class="profile-field-hint">Tersensor otomatis sesuai standar privasi data warga.</span>
                        </div>

                        {{-- 4. Alamat Surel (Email) --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_email">Alamat Surel (Email)</label>
                                <span class="active-txt-pill">Aktif</span>
                            </div>
                            <div class="profile-input-wrap editable-wrap">
                                <input type="email" id="inp_email" name="email" value="{{ $profile['email'] ?? 'herdman.library@inovexa.id' }}" required>
                                <span class="input-suffix-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                </span>
                            </div>
                            <span class="profile-field-hint">Digunakan untuk konfirmasi peminjaman &amp; struk reservasi.</span>
                        </div>

                        {{-- 5. Nomor Telepon / WhatsApp --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_phone">Nomor Telepon / WhatsApp</label>
                            </div>
                            <div class="profile-input-wrap editable-wrap">
                                <input type="text" id="inp_phone" name="phone" value="{{ $profile['phone'] ?? '+62 812-3456-7890' }}" required>
                                <span class="input-suffix-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                                        <line x1="12" y1="18" x2="12.01" y2="18"/>
                                    </svg>
                                </span>
                            </div>
                            <span class="profile-field-hint">Notifikasi pengingat pengembalian otomatis via WA Gateway.</span>
                        </div>

                        {{-- 6. Kategori Pemustaka --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_cat">Kategori Pemustaka</label>
                            </div>
                            <div class="profile-input-wrap">
                                <input type="text" id="inp_cat" value="{{ $profile['category'] ?? 'Masyarakat Umum / Peneliti Mandiri' }}" readonly>
                            </div>
                            <span class="profile-field-hint">Menentukan batas maksimum reservasi koleksi langka.</span>
                        </div>

                        {{-- 7. Tanggal Registrasi Awal --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_reg">Tanggal Registrasi Awal</label>
                            </div>
                            <div class="profile-input-wrap readonly-wrap">
                                <input type="text" id="inp_reg" value="{{ $profile['reg_date'] ?? '15 Januari 2024' }}" readonly>
                            </div>
                        </div>

                        {{-- 8. Koneksi Katalog Induk Nasional --}}
                        <div class="profile-field-group">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl">Koneksi Katalog Induk Nasional</label>
                            </div>
                            <div class="sso-status-indicator">
                                <span class="sso-dot-live"></span>
                                <b>Terhubung (SSO Perpusnas Aktif)</b>
                            </div>
                        </div>

                        {{-- 9. Alamat Tempat Tinggal / Domisili Lengkap (Span 2 Kolom) --}}
                        <div class="profile-field-group full-width">
                            <div class="profile-field-head">
                                <label class="profile-field-lbl" for="inp_address">Alamat Tempat Tinggal / Domisili Lengkap</label>
                            </div>
                            <div class="profile-input-wrap textarea-wrap editable-wrap">
                                <textarea id="inp_address" name="address" rows="2" required>{{ $profile['address'] ?? 'Jl. Pemuda No. 88, Kel. Pandansari, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132' }}</textarea>
                            </div>
                            <span class="profile-field-hint">Diperlukan untuk verifikasi pengiriman buku via Layanan Antar Komunitas.</span>
                        </div>
                    </div>

                    {{-- Tombol Bawah Formulir --}}
                    <div class="profile-form-footer-actions">
                        <button type="reset" class="btn-form-cancel" onclick="toast('Formulir direset ke data tersimpan')">Batal / Reset</button>
                        <button type="submit" class="btn-form-save">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/>
                                <polyline points="7 3 7 8 15 8"/>
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- BAGIAN BAWAH PENUH: Riwayat Pemindaian & Aktivitas Kartu Digital --}}
    <div class="profile-audit-card">
        <div class="audit-head-row">
            <div class="audit-head-left">
                <div class="audit-icon-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/>
                    </svg>
                </div>
                <div class="audit-title-meta">
                    <h3 class="audit-title">Riwayat Pemindaian &amp; Aktivitas Kartu Digital</h3>
                    <p class="audit-desc">Log audit keamanan penggunaan identitas anggota di seluruh fasilitas perpustakaan.</p>
                </div>
            </div>
            <a href="javascript:void(0)" class="audit-view-all" onclick="openModal('full-audit-modal')">
                Lihat Semua Log Sirkulasi &rarr;
            </a>
        </div>

        {{-- Tabel Log Audit Keamanan Aktivitas --}}
        <div class="audit-table-responsive">
            <table class="audit-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">WAKTU &amp; TANGGAL</th>
                        <th style="width: 22%;">JENIS TRANSAKSI</th>
                        <th style="width: 23%;">LOKASI &amp; POS SIRKULASI</th>
                        <th style="width: 25%;">RINCIAN / JUDUL KOLEKSI</th>
                        <th style="width: 15%;">STATUS VALIDASI</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Baris 1: 18 Okt 2026, 09:15 WIB --}}
                    <tr>
                        <td>
                            <div class="audit-date-primary">18 Okt 2026</div>
                            <div class="audit-time-sub">09:15 WIB</div>
                        </td>
                        <td>
                            <div class="audit-type-flex">
                                <span class="audit-type-icon icon-book-tan">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9a3412" stroke-width="2" stroke-linecap="round">
                                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                        <path d="M6 6h10M6 10h10"/>
                                    </svg>
                                </span>
                                <span class="audit-type-text">Peminjaman Buku Fisik</span>
                            </div>
                        </td>
                        <td>
                            <div class="audit-loc-title">Meja Sirkulasi Lt. 1</div>
                            <div class="audit-loc-sub">Petugas: Budi Santoso</div>
                        </td>
                        <td>
                            <div class="audit-item-title">Laskar Pelangi</div>
                            <div class="audit-item-barcode">Barcode: BUK-0994-LP</div>
                        </td>
                        <td>
                            <span class="audit-badge-approved">
                                <span class="audit-badge-dot"></span>
                                Sukses Disetujui
                            </span>
                        </td>
                    </tr>

                    {{-- Baris 2: 14 Okt 2026, 14:30 WIB --}}
                    <tr>
                        <td>
                            <div class="audit-date-primary">14 Okt 2026</div>
                            <div class="audit-time-sub">14:30 WIB</div>
                        </td>
                        <td>
                            <div class="audit-type-flex">
                                <span class="audit-type-icon icon-gate-teal">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="2" stroke-linecap="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                                        <path d="M9 3v18M15 3v18"/>
                                    </svg>
                                </span>
                                <span class="audit-type-text">Presensi Turnstile Gate</span>
                            </div>
                        </td>
                        <td>
                            <div class="audit-loc-title">Pintu Masuk Gedung Utama</div>
                            <div class="audit-loc-sub">Gate B - Tap NFC Digital</div>
                        </td>
                        <td>
                            <div class="audit-item-title">Kunjungan Ruang Baca Terbuka</div>
                        </td>
                        <td>
                            <span class="audit-badge-approved">
                                <span class="audit-badge-dot"></span>
                                Masuk Berhasil
                            </span>
                        </td>
                    </tr>

                    {{-- Baris 3: 12 Okt 2026, 10:00 WIB --}}
                    <tr>
                        <td>
                            <div class="audit-date-primary">12 Okt 2026</div>
                            <div class="audit-time-sub">10:00 WIB</div>
                        </td>
                        <td>
                            <div class="audit-type-flex">
                                <span class="audit-type-icon icon-book-tan">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9a3412" stroke-width="2" stroke-linecap="round">
                                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                        <path d="M6 6h10M6 10h10"/>
                                    </svg>
                                </span>
                                <span class="audit-type-text">Peminjaman Buku Fisik</span>
                            </div>
                        </td>
                        <td>
                            <div class="audit-loc-title">Meja Sirkulasi Lt. 1</div>
                            <div class="audit-loc-sub">Petugas: Ratna W.</div>
                        </td>
                        <td>
                            <div class="audit-item-title">Sapiens: Riwayat Singkat Umat Manusia</div>
                            <div class="audit-item-barcode">Barcode: BUK-0821-SP</div>
                        </td>
                        <td>
                            <span class="audit-badge-approved">
                                <span class="audit-badge-dot"></span>
                                Sukses Disetujui
                            </span>
                        </td>
                    </tr>

                    {{-- Baris 4: 05 Okt 2026, 16:45 WIB --}}
                    <tr>
                        <td>
                            <div class="audit-date-primary">05 Okt 2026</div>
                            <div class="audit-time-sub">16:45 WIB</div>
                        </td>
                        <td>
                            <div class="audit-type-flex">
                                <span class="audit-type-icon icon-exit-slate">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2" stroke-linecap="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                        <polyline points="16 17 21 12 16 7"/>
                                        <line x1="21" y1="12" x2="9" y2="12"/>
                                    </svg>
                                </span>
                                <span class="audit-type-text">Presensi Gerbang Keluar</span>
                            </div>
                        </td>
                        <td>
                            <div class="audit-loc-title">Pintu Keluar Utama</div>
                            <div class="audit-loc-sub">Scanner Optik QR Gerbang A</div>
                        </td>
                        <td>
                            <div class="audit-item-title">Pemeriksaan Deteksi RFID Aman</div>
                        </td>
                        <td>
                            <span class="audit-badge-exit">
                                <span class="audit-badge-dot-slate"></span>
                                Keluar Berhasil
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Footer Paginasi Audit --}}
        <div class="audit-pagination-row">
            <span class="audit-pagi-info">Menampilkan 4 dari 28 riwayat interaksi kartu (Bulan Berjalan)</span>
            <div class="audit-pagi-btns">
                <button type="button" class="pagi-btn" disabled>Sebelumnya</button>
                <button type="button" class="pagi-btn active">1</button>
                <button type="button" class="pagi-btn" onclick="toast('Halaman 2: Menampilkan riwayat bulan September 2026')">Selanjutnya</button>
            </div>
        </div>
    </div>

    {{-- Footer Sistem Beranda Figma Asli --}}
    <footer class="figma-dashboard-footer" style="margin-top:34px">
        <div>&copy; 2026 Inovexa Library System. Terhubung dengan Katalog Induk Perpustakaan Nasional RI.</div>
        <div class="footer-links-row">
            <a href="javascript:void(0)" onclick="openModal('contact-modal')" style="color:var(--m);text-decoration:none">Bantuan Sirkulasi</a>
            <span>•</span>
            <a href="javascript:void(0)" onclick="toast('Ketentuan: Batas peminjaman maksimal 3 buku, perpanjangan 1x secara mandiri via portal.')" style="color:var(--m);text-decoration:none">Tata Tertib &amp; Sanksi Denda</a>
            <span>•</span>
            <span>Versi 4.2.1-Prod</span>
        </div>
    </footer>
</div>

{{-- MODAL 1: UBAH PIN SIRKULASI --}}
<div class="modal" id="pin-change-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('pin-change-modal')">
    <div class="modal-box" style="max-width:420px">
        <button class="modal-close" type="button" onclick="closeModal('pin-change-modal')">×</button>
        <div class="lbl">KEAMANAN TRANSAKSI MANDIRI</div>
        <h2 style="margin:4px 0 10px;font-size:18px">Ubah PIN Sirkulasi &amp; Kios</h2>
        <p style="color:var(--m);font-size:12px;line-height:1.5">
            PIN 6-digit digunakan saat meminjam buku fisik di mesin Self-Service Kiosk atau memvalidasi reservasi ruang baca.
        </p>

        <form onsubmit="handlePinChange(event)" style="margin-top:14px;display:grid;gap:12px">
            <div>
                <label style="display:block;font-size:11px;font-weight:700;margin-bottom:4px">PIN Lama (Default: 123456)</label>
                <input type="password" id="pinOld" maxlength="6" pattern="\d{6}" placeholder="••••••" required
                       style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;letter-spacing:0.2em;text-align:center">
            </div>
            <div>
                <label style="display:block;font-size:11px;font-weight:700;margin-bottom:4px">PIN Baru (6 Angka)</label>
                <input type="password" id="pinNew" maxlength="6" pattern="\d{6}" placeholder="••••••" required
                       style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;letter-spacing:0.2em;text-align:center">
            </div>
            <div>
                <label style="display:block;font-size:11px;font-weight:700;margin-bottom:4px">Konfirmasi PIN Baru</label>
                <input type="password" id="pinConfirm" maxlength="6" pattern="\d{6}" placeholder="••••••" required
                       style="width:100%;padding:8px 12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;letter-spacing:0.2em;text-align:center">
            </div>

            <div style="display:flex;gap:8px;margin-top:10px">
                <button type="button" class="btn ghost" style="flex:1" onclick="closeModal('pin-change-modal')">Batal</button>
                <button type="submit" class="btn" style="flex:1">Simpan PIN</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 2: LIHAT SEMUA LOG SIRKULASI --}}
<div class="modal" id="full-audit-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('full-audit-modal')">
    <div class="modal-box" style="max-width:680px">
        <button class="modal-close" type="button" onclick="closeModal('full-audit-modal')">×</button>
        <div class="lbl">AUDIT LOG SIRKULASI LENGKAP</div>
        <h2 style="margin:4px 0 10px;font-size:18px">Rekam Jejak Presensi &amp; Sirkulasi</h2>
        <p style="color:var(--m);font-size:12px;line-height:1.5">
            Log mencatat seluruh interaksi RFID kartu Smartpass, pembacaan QR OPAC, dan turnstile gerbang perpustakaan.
        </p>

        <div style="max-height:300px;overflow-y:auto;margin-top:14px;border:1px solid #e2e8f0;border-radius:8px">
            <table class="audit-table" style="font-size:11.5px">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Aktivitas</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>18 Okt 2026, 09:15</td>
                        <td>Peminjaman: Laskar Pelangi</td>
                        <td>Meja Sirkulasi Lt. 1</td>
                        <td><span class="audit-badge-approved">Sukses</span></td>
                    </tr>
                    <tr>
                        <td>14 Okt 2026, 14:30</td>
                        <td>Presensi Gate Masuk</td>
                        <td>Gate B - Tap NFC</td>
                        <td><span class="audit-badge-approved">Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>12 Okt 2026, 10:00</td>
                        <td>Peminjaman: Sapiens</td>
                        <td>Meja Sirkulasi Lt. 1</td>
                        <td><span class="audit-badge-approved">Sukses</span></td>
                    </tr>
                    <tr>
                        <td>05 Okt 2026, 16:45</td>
                        <td>Presensi Gerbang Keluar</td>
                        <td>Pintu Keluar Utama</td>
                        <td><span class="audit-badge-exit">Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>28 Sep 2026, 11:20</td>
                        <td>Pengembalian Buku Fisik</td>
                        <td>Dropbox Mandiri Lt. 1</td>
                        <td><span class="audit-badge-approved">Tepat Waktu</span></td>
                    </tr>
                    <tr>
                        <td>20 Sep 2026, 08:45</td>
                        <td>Reservasi Kursi Belajar</td>
                        <td>Kios Mandiri Lt. 2</td>
                        <td><span class="audit-badge-approved">Valid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn" style="width:100%;margin-top:16px" onclick="closeModal('full-audit-modal')">Tutup Log Audit</button>
    </div>
</div>

{{-- SCRIPT INTERAKTIF KHUSUS HALAMAN PROFIL & KARTU DIGITAL --}}
<script>
let isCardFrozen = false;
let isNikMasked = true;
const fullNik = "3374081504990001";
const maskedNik = "3374*********01";

function copyNia(nia) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(nia).then(() => {
            toast('Nomor Induk Anggota (NIA) berhasil disalin: ' + nia);
        });
    } else {
        toast('NIA: ' + nia);
    }
}

function toggleNikMask() {
    const input = document.getElementById('inp_nik');
    isNikMasked = !isNikMasked;
    input.value = isNikMasked ? maskedNik : fullNik;
    toast(isNikMasked ? 'NIK disamarkan kembali' : 'NIK ditampilkan');
}

function handleNfcToggle(el) {
    if (el.checked) {
        toast('NFC Auto-Checkin diaktifkan untuk gerbang turnstile');
    } else {
        toast('NFC Auto-Checkin dinonaktifkan');
    }
}

function toggleFreezeCard() {
    isCardFrozen = !isCardFrozen;
    const badge = document.getElementById('cardStatusBadge');
    const card = document.getElementById('digitalSmartpassCard');
    const freezeBtnText = document.getElementById('freezeBtnText');
    const freezeBtn = document.getElementById('freezeCardBtn');

    if (isCardFrozen) {
        badge.textContent = 'STATUS: DIBEKUKAN';
        badge.style.background = 'rgba(239, 68, 68, 0.25)';
        badge.style.borderColor = 'rgba(239, 68, 68, 0.6)';
        badge.style.color = '#fca5a5';
        card.style.filter = 'grayscale(0.65) brightness(0.85)';
        freezeBtnText.textContent = 'Aktifkan Kartu';
        freezeBtn.style.background = '#dcfce7';
        freezeBtn.style.borderColor = '#86efac';
        freezeBtn.style.color = '#15803d';
        toast('Kartu Digital dibekukan sementara. Transaksi sirkulasi ditangguhkan.');
    } else {
        badge.textContent = 'STATUS: AKTIF';
        badge.style.background = 'rgba(34, 197, 94, 0.18)';
        badge.style.borderColor = 'rgba(74, 222, 128, 0.4)';
        badge.style.color = '#4ade80';
        card.style.filter = 'none';
        freezeBtnText.textContent = 'Bekukan Kartu';
        freezeBtn.style.background = '#fee2e2';
        freezeBtn.style.borderColor = '#fecaca';
        freezeBtn.style.color = '#dc2626';
        toast('Kartu Digital aktif kembali.');
    }
}

function switchProfileTab(tab, btn) {
    document.querySelectorAll('.profile-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    if (tab === 'pribadi') {
        toast('Menampilkan Tab: Data Pribadi');
    } else if (tab === 'kontak') {
        toast('Fokus ke Alamat & Nomor Kontak');
        document.getElementById('inp_phone')?.focus();
    } else if (tab === 'preferensi') {
        toast('Preferensi Baca: Notifikasi WhatsApp & Surel aktif');
    } else if (tab === 'keamanan') {
        openModal('pin-change-modal');
    }
}

function previewAvatarImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if (file.size > 2 * 1024 * 1024) {
            toast('Ukuran file maksimal 2MB!');
            return;
        }
        const reader = new FileReader();
        reader.onload = function(e) {
            const container = document.getElementById('avatarPreviewContainer');
            const initial = document.getElementById('avatarInitial');
            if (initial) initial.style.display = 'none';
            container.style.backgroundImage = 'url(' + e.target.result + ')';
            container.style.backgroundSize = 'cover';
            container.style.backgroundPosition = 'center';
            toast('Foto profil berhasil diunggah!');
        };
        reader.readAsDataURL(file);
    }
}

function resetAvatarImage() {
    const container = document.getElementById('avatarPreviewContainer');
    const initial = document.getElementById('avatarInitial');
    container.style.backgroundImage = 'none';
    if (initial) initial.style.display = 'block';
    const input = document.getElementById('avatarFileInput');
    if (input) input.value = '';
    toast('Foto profil dihapus, menggunakan avatar inisial.');
}

function handlePinChange(e) {
    e.preventDefault();
    const pNew = document.getElementById('pinNew').value;
    const pConf = document.getElementById('pinConfirm').value;
    if (pNew !== pConf) {
        toast('Konfirmasi PIN baru tidak cocok!');
        return;
    }
    closeModal('pin-change-modal');
    toast('PIN Sirkulasi berhasil diperbarui.');
}

function handleProfileSubmit(e) {
    // izinkan form submit normal ke backend Laravel
}
</script>