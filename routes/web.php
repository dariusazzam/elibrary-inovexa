<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\EnsureRole;
use Illuminate\Support\Facades\Route;

// Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/reservasi/{id}', [HomeController::class, 'reserve'])->whereNumber('id')->name('reserve');

// Auth & Akses Akun
Route::get('/masuk/{role?}', [AuthController::class, 'form'])->where('role', 'member|admin|super')->name('login');
Route::get('/login/{role?}', function (?string $role = null) {
    return redirect()->route('login', $role ? ['role' => $role] : []);
});
Route::post('/masuk', [AuthController::class, 'login'])->name('login.post');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);

// Pendaftaran mandiri & Lupa Sandi
Route::get('/daftar', [AuthController::class, 'registerForm'])->name('register');
Route::post('/daftar', [AuthController::class, 'register'])->name('register.post');
Route::get('/lupa-sandi', [AuthController::class, 'forgotForm'])->name('password.forgot');
Route::post('/lupa-sandi', [AuthController::class, 'resetPassword'])->name('password.reset');

// Semua peran yang sudah login
Route::middleware(EnsureRole::class.':member,admin,super')->group(function () {
    Route::get('/dashboard/elib/baca/{id}', [DashboardController::class, 'reader'])->whereNumber('id')->name('elib.read');
    Route::get('/dashboard/{menu?}', [DashboardController::class, 'show'])->name('dashboard');
});

// Anggota
Route::middleware(EnsureRole::class.':member')->group(function () {
    Route::delete('/reservasi/{id}', [DashboardController::class, 'cancel'])->whereNumber('id')->name('reserve.cancel');
    Route::post('/dashboard/profil', [DashboardController::class, 'updateProfile'])->name('profile.update');
});

// Petugas & Super Admin
Route::middleware(EnsureRole::class.':admin,super')->group(function () {
    Route::post('/sirkulasi', [DashboardController::class, 'lend'])->name('lend');
    Route::post('/sirkulasi/{id}/kembali', [DashboardController::class, 'giveBack'])->whereNumber('id')->name('return');
    Route::post('/stok', [DashboardController::class, 'addBook'])->name('stock.add');
});

// Super Admin
Route::middleware(EnsureRole::class.':super')->group(function () {
    Route::post('/pengguna/{i}/toggle', [DashboardController::class, 'toggleUser'])->whereNumber('i')->name('user.toggle');
    Route::post('/pengaturan', [DashboardController::class, 'saveSettings'])->name('settings.save');

    // Modul 2: Kelola & Hak Akses Pengguna
    Route::post('/super/user/create', [DashboardController::class, 'superCreateUser'])->name('super.user.create');
    Route::post('/super/user/update', [DashboardController::class, 'superUpdateUser'])->name('super.user.update');
    Route::delete('/super/user/{id}', [DashboardController::class, 'superDeleteUser'])->name('super.user.delete');
    Route::post('/super/user/{id}/toggle', [DashboardController::class, 'superToggleUser'])->name('super.user.toggle');
    Route::post('/super/user/{id}/reset-password', [DashboardController::class, 'superResetPassword'])->name('super.user.reset_password');
    Route::post('/super/user/{id}/revoke-session', [DashboardController::class, 'superRevokeSession'])->name('super.user.revoke_session');
    Route::post('/super/user/{id}/revoke', [DashboardController::class, 'superRevokeSession'])->name('super.user.revoke');
    Route::post('/super/users/{id}/revoke', [DashboardController::class, 'superRevokeSession']);
    Route::post('/super/rbac/update', [DashboardController::class, 'superUpdateRbac'])->name('super.rbac.update');
    Route::post('/super/role/custom', [DashboardController::class, 'superCreateRole'])->name('super.role.create');
    Route::get('/super/export/users', [DashboardController::class, 'superExportUsers'])->name('super.export.users');

    // Modul 3: Kelola Data Anggota
    Route::post('/super/member/register', [DashboardController::class, 'superRegisterMember'])->name('super.member.register');
    Route::post('/super/member/quota', [DashboardController::class, 'superUpdateMemberQuota'])->name('super.member.quota');
    Route::post('/super/member/verify/{nia}', [DashboardController::class, 'superVerifyMember'])->name('super.member.verify');
    Route::post('/super/member/{nia}/toggle', [DashboardController::class, 'superToggleMember'])->name('super.member.toggle');
    Route::post('/super/members/{nia}/toggle', [DashboardController::class, 'superToggleMember']);
    Route::delete('/super/member/{nia}', [DashboardController::class, 'superDeleteMember'])->name('super.member.delete');
    Route::get('/super/export/members', [DashboardController::class, 'superExportMembers'])->name('super.export.members');

    // Modul 4: Kelola Eksemplar Buku
    Route::post('/super/book/create', [DashboardController::class, 'superCreateBook'])->name('super.book.create');
    Route::post('/super/book/update', [DashboardController::class, 'superUpdateBook'])->name('super.book.update');
    Route::delete('/super/book/{id}', [DashboardController::class, 'superDeleteBook'])->name('super.book.delete');
    Route::delete('/super/books/{id}', [DashboardController::class, 'superDeleteBook']);
    Route::post('/super/book/{id}/copy', [DashboardController::class, 'superAddBookCopy'])->name('super.book.add_copy');
    Route::delete('/super/book/{id}/copy/{barcode}', [DashboardController::class, 'superDeleteBookCopy'])->name('super.book.delete_copy');
    Route::get('/super/export/books', [DashboardController::class, 'superExportBooks'])->name('super.export.books');

    // Modul 5: Kelola Sirkulasi
    Route::post('/super/circ/policy', [DashboardController::class, 'superUpdateCircPolicy'])->name('super.circ.policy');
    Route::post('/super/circ/lend', [DashboardController::class, 'superLend'])->name('super.circ.lend');
    Route::post('/super/circ/return/{id}', [DashboardController::class, 'superReturn'])->name('super.circ.return');
    Route::post('/super/circ/dispensation/{id}/approve', [DashboardController::class, 'superApproveDispensation'])->name('super.circ.dispensation.approve');
    Route::post('/super/circ/dispensation/{id}/reject', [DashboardController::class, 'superRejectDispensation'])->name('super.circ.dispensation.reject');
    Route::get('/super/export/circulation', [DashboardController::class, 'superExportCirculation'])->name('super.export.circulation');

    // Modul 6: Kelola Reservasi & Notifikasi
    Route::post('/super/reservation/status/{id}', [DashboardController::class, 'superUpdateReservationStatus'])->name('super.reservation.status');
    Route::post('/super/reservation/create', [DashboardController::class, 'superCreateReservation'])->name('super.reservation.create');
    Route::post('/super/reservation/config', [DashboardController::class, 'superConfigReservation'])->name('super.reservation.config');

    // Modul 7: Kelola E-Library
    Route::post('/super/elib/create', [DashboardController::class, 'superCreateEbook'])->name('super.elib.create');
    Route::post('/super/elib/update', [DashboardController::class, 'superUpdateEbook'])->name('super.elib.update');
    Route::delete('/super/elib/{id}', [DashboardController::class, 'superDeleteEbook'])->name('super.elib.delete');
    Route::post('/super/elib/{id}/drm', [DashboardController::class, 'superToggleEbookDrm'])->name('super.elib.drm');

    // Modul 8: Audit Log & Backup Sistem
    Route::post('/super/backup/trigger', [DashboardController::class, 'superTriggerBackup'])->name('super.backup.trigger');
    Route::get('/super/backup/download/{filename?}', [DashboardController::class, 'superDownloadBackup'])->name('super.backup.download');
    Route::post('/super/backup/verify', [DashboardController::class, 'superVerifyBackup'])->name('super.backup.verify');
    Route::get('/super/export/audit-logs', [DashboardController::class, 'superExportAuditLogs'])->name('super.export.audit_logs');

    // Modul 9: Laporan Keseluruhan
    Route::get('/super/reports/export/{type}', [DashboardController::class, 'superExportReport'])->name('super.reports.export');
});
