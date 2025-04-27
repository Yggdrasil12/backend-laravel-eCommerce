<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test',
            'email' => 'jhon_doe@gmail.com',
            'password' => '123456789',
            'role' => 'admin',
            'phone' => 123456,
            'address' => 'calle 12 '
        ]);

        $this->call(ProductSeeder::class); // Agrega aquí tu seeder
    }
}
