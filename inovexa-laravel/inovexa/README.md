# Inovexa Public Library — Aplikasi Laravel

Aplikasi demo sistem perpustakaan berbasis Laravel, Blade, dan penyimpanan data berbasis **session file**. Tidak membutuhkan MySQL untuk dijalankan.

## Fitur yang tersedia

- Beranda publik dengan katalog, pencarian judul/pengarang, dan filter topik.
- Login dengan tiga peran: Anggota, Admin Petugas, dan Super Admin.
- Pendaftaran anggota mandiri (NIK 16 digit) dan penerbitan kartu digital instan.
- Reset kata sandi anggota menggunakan ID kartu atau NIK.
- Reservasi buku dan pembatalan reservasi.
- Dashboard anggota: pinjaman, status denda, notifikasi dinamis, e-library, dan kartu anggota.
- E-Library dengan pembaca buku digital, daftar bab, navigasi bab, dan pengatur ukuran teks.
- Kartu anggota dengan barcode SVG unik, salin ID, dan mode cetak.
- Dashboard admin: catat peminjaman/pengembalian, hitung denda otomatis, tambah buku, dan daftar anggota.
- Dashboard super admin: aktif/nonaktifkan pengguna dan ubah lama peminjaman serta tarif denda.

> **Catatan:** Ini adalah aplikasi demo. Data pengguna dan kata sandi tersimpan dalam session pada server, bukan database produksi. Reset session akan mengembalikan data demo awal.

## Cara Menjalankan

### Prasyarat

- PHP 8.2 atau yang lebih baru
- Composer

### 1. Buat proyek Laravel utuh

Direktori ini berisi source aplikasi. Buat proyek Laravel baru, lalu salin source ini ke sana:

```bash
cd "/d/24670092/file tugas"
composer create-project laravel/laravel inovexa-app

# Salin source Inovexa ke proyek Laravel baru
cp -R inovexa-laravel/inovexa/app inovexa-app/
cp -R inovexa-laravel/inovexa/public inovexa-app/
cp -R inovexa-laravel/inovexa/resources inovexa-app/
cp -R inovexa-laravel/inovexa/routes inovexa-app/

cd inovexa-app
```

### 2. Konfigurasikan mode demo tanpa database

Buka `.env` dan atur nilai berikut:

```dotenv
APP_NAME="Inovexa Public Library"
SESSION_DRIVER=file
CACHE_STORE=file
```

Kemudian buat application key dan jalankan server:

```bash
php artisan key:generate
php artisan optimize:clear
php artisan serve
```

Buka alamat berikut di browser:

```text
http://127.0.0.1:8000
```

## Akun Demo Awal

| Peran | ID | Password |
|---|---|---|
| Anggota | `INX-2026-8820` atau `3271040801990002` | `123456` |
| Admin | `admin` | `admin123` |
| Super Admin | `super` | `super123` |

## Data Session Demo

Data dibuat saat kunjungan pertama dan disimpan dalam session browser/server. Jika ingin mengembalikan seluruh katalog, peminjaman, akun baru, serta konfigurasi ke kondisi awal, hapus file session Laravel lalu muat ulang aplikasi.

Pada konfigurasi `SESSION_DRIVER=file`, file tersebut berada di:

```text
storage/framework/sessions/
```

## Struktur Penting

```text
app/Support/Library.php                data + aturan bisnis demo berbasis session
app/Http/Controllers/AuthController.php login, daftar anggota, reset sandi
app/Http/Controllers/DashboardController.php dashboard, sirkulasi, e-reader
routes/web.php                         seluruh route aplikasi
resources/views/reader.blade.php       halaman pembaca buku digital
resources/views/register.blade.php     pendaftaran anggota mandiri
resources/views/forgot-password.blade.php reset kata sandi mandiri
resources/views/panels/                tampilan tiap menu dashboard
public/css/app.css                     seluruh gaya tampilan
public/js/app.js                       toast, password toggle, modal
```
