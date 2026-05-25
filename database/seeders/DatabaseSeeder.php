<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event
        $category = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertaiment',
            'slug' => 'entertaiment',
        ]);

        // 3. Insert Sampel Events (Total 6 Event untuk Tugas)
        
        // Event 1
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        // Event 2
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Hackaton - Unleash Your Inner Developer',
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi inovatif untuk tantangan masa depan!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // Event 3
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan bersama para ahli di bidangnya.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        // Event 4 (Tambahan Latihan)
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain interface yang user-friendly dari ahlinya.',
            'date' => '2026-06-01 09:00:00',
            'location' => 'Ruang Cinema',
            'price' => 35000,
            'stock' => 50,
            'poster_path' => 'posters/event-4.png',
        ]);

        // Event 5 (Tambahan Latihan)
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen Mobile Legends antar mahasiswa Amikom.',
            'date' => '2026-06-15 13:00:00',
            'location' => 'Basement Unit 3',
            'price' => 20000,
            'stock' => 200,
            'poster_path' => 'posters/event-5.png',
        ]);

        // Event 6 (Tambahan Latihan)
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Workshop Laravel Advanced',
            'description' => 'Kupas tuntas fitur canggih Laravel 11 untuk project skala besar.',
            'date' => '2026-07-01 08:00:00',
            'location' => 'Lab ICT',
            'price' => 75000,
            'stock' => 30,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}