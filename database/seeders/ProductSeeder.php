<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory()->count(25)->create();
        Product::factory()->create([
            'name' => 'Producto 1',
            'quantity' => 10,
            'description' => 'Producto de prueba 1',
        ]);
        Product::factory()->create([
            'name' => 'Producto 2',
            'quantity' => 20,
            'description' => 'Producto de prueba 2',
        ]);
        Product::factory()->create([
            'name' => 'Producto 3',
            'quantity' => 30,
            'description' => 'Producto de prueba 3',
        ]);
    }
}
