<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        $electronics = Category::create([
            'name'        => 'Electrónica',
            'description' => 'Gadgets y dispositivos electrónicos',
        ]);

        $clothing = Category::create([
            'name'        => 'Ropa',
            'description' => 'Prendas de vestir',
        ]);

        Product::create([
            'name'        => 'Smartphone X',
            'description' => 'Último modelo de smartphone',
            'price'       => 15000.00,
            'category_id' => $electronics->id,
        ]);

        Product::create([
            'name'        => 'Camiseta básica',
            'description' => 'Algodón 100%, varias tallas',
            'price'       => 500.00,
            'category_id' => $clothing->id,
        ]);
    }
}
