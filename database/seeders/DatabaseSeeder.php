<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\RestaurantTable;
use App\Models\User;
use App\Models\WarungSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Default
        User::firstOrCreate(
            ['email' => 'admin@warungenak.com'],
            [
                'name' => 'Admin Warung Enak',
                'username' => 'admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Pengaturan Warung
        WarungSetting::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Warung Enak',
                'description' => 'Sistem Pemesanan Makanan dan Minuman Berbasis Web Menggunakan QR Code. Menyajikan aneka masakan dan minuman lezat khas nusantara.',
                'address' => 'Jl. Kuliner Lezat No. 88, Kupang',
                'phone_whatsapp' => '6281234567890',
                'maps_url' => 'https://maps.google.com',
                'opening_time' => '09:00:00',
                'closing_time' => '22:00:00',
                'is_open' => true,
            ]
        );

        // 3. Kategori Menu
        $makanan = Category::firstOrCreate(
            ['slug' => 'makanan'],
            ['name' => 'Makanan', 'is_active' => true]
        );

        $minuman = Category::firstOrCreate(
            ['slug' => 'minuman'],
            ['name' => 'Minuman', 'is_active' => true]
        );

        $camilan = Category::firstOrCreate(
            ['slug' => 'camilan'],
            ['name' => 'Camilan', 'is_active' => true]
        );

        // 4. Data Menu Awal
        $menus = [
            // Makanan
            [
                'category_id' => $makanan->id,
                'name' => 'Nasi Goreng Spesial',
                'slug' => 'nasi-goreng-spesial',
                'description' => 'Nasi goreng dengan bumbu khas, telur mata sapi, suwiran ayam, dan kerupuk.',
                'price' => 25000,
                'is_available' => true,
            ],
            [
                'category_id' => $makanan->id,
                'name' => 'Mie Goreng Jawa',
                'slug' => 'mie-goreng-jawa',
                'description' => 'Mie goreng bumbu tradisional dengan sayuran segar dan telur.',
                'price' => 22000,
                'is_available' => true,
            ],
            [
                'category_id' => $makanan->id,
                'name' => 'Ayam Bakar Madu + Nasi',
                'slug' => 'ayam-bakar-madu-nasi',
                'description' => 'Ayam bakar dengan lumuran madu manis gurih disajikan lengkap dengan nasi hangat dan sambal.',
                'price' => 30000,
                'is_available' => true,
            ],
            [
                'category_id' => $makanan->id,
                'name' => 'Ayam Goreng Kremes + Nasi',
                'slug' => 'ayam-goreng-kremes-nasi',
                'description' => 'Ayam goreng gurih renyah dengan taburan kremesan dan lalapan.',
                'price' => 28000,
                'is_available' => true,
            ],
            [
                'category_id' => $makanan->id,
                'name' => 'Soto Ayam Lamongan',
                'slug' => 'soto-ayam-lamongan',
                'description' => 'Soto ayam kuah kuning segar dengan koya gurih dan sambal cabai rawit.',
                'price' => 20000,
                'is_available' => true,
            ],

            // Minuman
            [
                'category_id' => $minuman->id,
                'name' => 'Es Teh Manis',
                'slug' => 'es-teh-manis',
                'description' => 'Teh wangi melati dingin menyegarkan.',
                'price' => 5000,
                'is_available' => true,
            ],
            [
                'category_id' => $minuman->id,
                'name' => 'Es Jeruk Peras',
                'slug' => 'es-jeruk-peras',
                'description' => 'Jeruk peras murni dengan es batu segar.',
                'price' => 8000,
                'is_available' => true,
            ],
            [
                'category_id' => $minuman->id,
                'name' => 'Kopi Hitam Tubruk',
                'slug' => 'kopi-hitam-tubruk',
                'description' => 'Kopi hitam pilihan diseduh panas dengan aroma mantap.',
                'price' => 7000,
                'is_available' => true,
            ],
            [
                'category_id' => $minuman->id,
                'name' => 'Kopi Susu Gula Aren',
                'slug' => 'kopi-susu-gula-aren',
                'description' => 'Espresso dengan susu creamy dan manis legit gula aren asli.',
                'price' => 15000,
                'is_available' => true,
            ],
            [
                'category_id' => $minuman->id,
                'name' => 'Air Mineral Botol',
                'slug' => 'air-mineral-botol',
                'description' => 'Air mineral 600ml sejuk.',
                'price' => 4000,
                'is_available' => true,
            ],

            // Camilan
            [
                'category_id' => $camilan->id,
                'name' => 'Pisang Goreng Keju',
                'slug' => 'pisang-goreng-keju',
                'description' => 'Pisang raja goreng krispi dengan taburan keju cheddar parut dan susu kental manis.',
                'price' => 15000,
                'is_available' => true,
            ],
            [
                'category_id' => $camilan->id,
                'name' => 'Kentang Goreng Renyah',
                'slug' => 'kentang-goreng-renyah',
                'description' => 'French fries renyah disajikan dengan saus sambal dan mayones.',
                'price' => 15000,
                'is_available' => true,
            ],
            [
                'category_id' => $camilan->id,
                'name' => 'Tahu Crispy Pedas Gurih',
                'slug' => 'tahu-crispy-pedas-gurih',
                'description' => 'Tahu goreng renyah dengan taburan bumbu cabai garam gurih.',
                'price' => 12000,
                'is_available' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::firstOrCreate(['slug' => $menu['slug']], $menu);
        }

        // 5. Data Meja (Meja 01 s/d Meja 05)
        for ($i = 1; $i <= 5; $i++) {
            $tableNumber = str_pad((string)$i, 2, '0', STR_PAD_LEFT);
            RestaurantTable::firstOrCreate(
                ['table_number' => $tableNumber],
                [
                    'qr_token' => 'MEJA-' . $tableNumber . '-' . Str::random(16),
                    'status' => 'available',
                    'is_active' => true,
                ]
            );
        }
    }
}
