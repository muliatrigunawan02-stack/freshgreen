<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Matikan Foreign Key Constraints & Kosongkan Tabel Kategori dan Produk
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        // 2. Buat Kategori Produk
        $sayur = Category::create(['name' => 'Sayur Segar', 'slug' => 'sayur-segar']);
        $buah  = Category::create(['name' => 'Buah Segar', 'slug' => 'buah-segar']);
        $bumbu = Category::create(['name' => 'Bumbu Dapur', 'slug' => 'bumbu-dapur']);
        $ikan  = Category::create(['name' => 'Ikan Segar', 'slug' => 'ikan-segar']);

        // 3. Data Produk Sayuran
        Product::create([
            'category_id' => $sayur->id,
            'name'        => 'Bayam Hijau Organik',
            'slug'        => Str::slug('Bayam Hijau Organik'),
            'description' => 'Bayam segar dipetik langsung dari petani lokal FreshGreen.',
            'price'       => 15000,
            'stock'       => 50,
            'unit'        => 'ikat',
            'image'       => 'images/Bayam Organik.jpeg'
        ]);

        Product::create([
            'category_id' => $sayur->id,
            'name'        => 'Kangkung',
            'slug'        => Str::slug('Kangkung'),
            'description' => 'Kangkung segar dipetik langsung dari petani berkualitas.',
            'price'       => 12000,
            'stock'       => 50,
            'unit'        => 'ikat',
            'image'       => 'images/Kangkung.jpeg'
        ]);

        Product::create([
            'category_id' => $sayur->id,
            'name'        => 'Sawi Hijau',
            'slug'        => Str::slug('Sawi Hijau'),
            'description' => 'Sawi Hijau segar dipanen langsung dari petani lokal FreshGreen.',
            'price'       => 15000,
            'stock'       => 50,
            'unit'        => 'ikat',
            'image'       => 'images/Sawi Hijau.jpeg'
        ]);

        Product::create([
            'category_id' => $sayur->id,
            'name'        => 'Sawi Putih',
            'slug'        => Str::slug('Sawi Putih'),
            'description' => 'Sawi Putih segar dipanen langsung dari petani lokal FreshGreen.',
            'price'       => 17000,
            'stock'       => 50,
            'unit'        => 'ikat',
            'image'       => 'images/Sawi Putih.jpeg'
        ]);

        Product::create([
            'category_id' => $sayur->id,
            'name'        => 'Selada Segar',
            'slug'        => Str::slug('Selada Segar'),
            'description' => 'Selada segar dipetik langsung dari petani lokal FreshGreen.',
            'price'       => 8000,
            'stock'       => 50,
            'unit'        => 'ikat',
            'image'       => 'images/Selada.jpeg'
        ]);

        Product::create([
            'category_id' => $sayur->id,
            'name'        => 'Kubis (Kol)',
            'slug'        => Str::slug('Kubis Kol'),
            'description' => 'Kubis segar dipanen langsung dari petani lokal FreshGreen.',
            'price'       => 19000,
            'stock'       => 50,
            'unit'        => 'kg',
            'image'       => 'images/Kubis.jpeg'
        ]);

        // 5. Data Produk Buah-Buahan
        Product::create([
            'category_id' => $buah->id,
            'name'        => 'Apel Fuji Manis',
            'slug'        => Str::slug('Apel Fuji Manis'),
            'description' => 'Apel fuji renyah dan manis, cocok untuk konsumsi harian keluarga.',
            'price'       => 25000,
            'stock'       => 25,
            'unit'        => 'kg',
            'image'       => 'images/Apel Fuji.jpeg'
        ]);

        Product::create([
            'category_id' => $buah->id,
            'name'        => 'Semangka Merah',
            'slug'        => Str::slug('Semangka Merah'),
            'description' => 'Semangka segar yang manis siap dikonsumsi untuk keluarga sehat.',
            'price'       => 25000,
            'stock'       => 50,
            'unit'        => 'kg',
            'image'       => 'images/Semangka.jpeg'
        ]);

        Product::create([
            'category_id' => $buah->id,
            'name'        => 'Melon Segar',
            'slug'        => Str::slug('Melon Segar'),
            'description' => 'Melon segar yang manis dan siap untuk dikonsumsi oleh keluarga sehat.',
            'price'       => 22000,
            'stock'       => 50,
            'unit'        => 'kg',
            'image'       => 'images/Melon.jpeg'
        ]);

        Product::create([
            'category_id' => $buah->id,
            'name'        => 'Mangga Harumanis',
            'slug'        => Str::slug('Mangga Harumanis'),
            'description' => 'Mangga yang manis cocok untuk dikonsumsi dengan cuaca yang sedang panas.',
            'price'       => 20000,
            'stock'       => 50,
            'unit'        => 'kg',
            'image'       => 'images/Mangga Harumanis.jpeg'
        ]);

        Product::create([
            'category_id' => $buah->id,
            'name'        => 'Jeruk Mandarin',
            'slug'        => Str::slug('Jeruk Mandarin'),
            'description' => 'Jeruk segar dan manis siap dikonsumsi di cuaca panas.',
            'price'       => 23000,
            'stock'       => 50,
            'unit'        => 'kg',
            'image'       => 'images/Jeruk Mandarin.jpeg'
        ]);
    }
}
