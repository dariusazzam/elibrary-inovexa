<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Category;
use App\Models\Role;
use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::create(['role_name' => 'Super Admin']);
        $librarianRole = Role::create(['role_name' => 'Admin Pegawai']);
        $memberRole = Role::create(['role_name' => 'Anggota']);

        SystemSetting::create(['key' => 'fine_per_day', 'value' => '2000']);
        SystemSetting::create(['key' => 'max_borrow_days', 'value' => '7']);
        SystemSetting::create(['key' => 'max_books_borrowed', 'value' => '3']);
        SystemSetting::create(['key' => 'reservation_expiry_hours', 'value' => '24']);

        User::create([
            'role_id' => $superAdminRole->id,
            'member_number' => null,
            'name' => 'Super Administrator',
            'email' => 'superadmin@perpus.test',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'status' => 'active',
        ]);

        User::create([
            'role_id' => $librarianRole->id,
            'member_number' => null,
            'name' => 'Admin Pegawai Perpustakaan',
            'email' => 'petugas@perpus.test',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'status' => 'active',
        ]);

        $members = [
            ['Adinda Zahwa Aprilia', '24670095'],
            ['Muhammad Dzaky Zidane', '24670090'],
            ['Carendra Aldiansyah', '24670104'],
            ['Juniari Nur Shofa', '24670082'],
            ['syalna kurnia putri', '24670083'],
            ['rendi dwiki h', '24670102'],
            ['Robiatul Adawiyyah', '24670075'],
            ['Eka Bayu Prasetio', '24670092'],
            ['frendy wahyu p', '24670091'],
            ['Darius Fikram Azzam', '24670089'],
            ['nopal', '24670081'],
            ['Muhammad Okta Ramadhani', '24670016'],
        ];

        foreach ($members as $index => $m) {
            User::create([
                'role_id' => $memberRole->id,
                'member_number' => 'MBR-'.$m[1],
                'name' => $m[0],
                'email' => 'mhs'.$m[1].'@perpus.test',
                'password' => Hash::make('password'),
                'phone' => '08'.str_pad($m[1], 10, '0', STR_PAD_LEFT),
                'status' => 'active',
            ]);
        }

        $cat1 = Category::create(['category_name' => 'Teknologi & Komputer']);
        $cat2 = Category::create(['category_name' => 'Sains & Matematika']);
        $cat3 = Category::create(['category_name' => 'Sastra & Fiksi']);

        $book1 = Book::create([
            'category_id' => $cat1->id,
            'isbn' => '978-602-03-8822-1',
            'title' => 'Arsitektur Backend Modern dengan Laravel',
            'author' => 'Ahmad Rasyid',
            'publisher' => 'Informatika Press',
            'publish_year' => 2024,
        ]);

        BookCopy::create([
            'book_id' => $book1->id,
            'inventory_code' => '978-602-03-8822-1-001',
            'shelf_location' => 'Rak A-01',
            'condition_status' => 'baik',
            'is_available' => true,
        ]);

        BookCopy::create([
            'book_id' => $book1->id,
            'inventory_code' => '978-602-03-8822-1-002',
            'shelf_location' => 'Rak A-01',
            'condition_status' => 'baik',
            'is_available' => true,
        ]);

        $book2 = Book::create([
            'category_id' => $cat3->id,
            'isbn' => '978-979-3062-79-2',
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'publish_year' => 2005,
        ]);

        BookCopy::create([
            'book_id' => $book2->id,
            'inventory_code' => '978-979-3062-79-2-001',
            'shelf_location' => 'Rak C-05',
            'condition_status' => 'baik',
            'is_available' => false,
        ]);
    }
}
