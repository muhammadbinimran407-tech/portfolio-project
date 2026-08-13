<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL', 'thinkcode@muhammadbinimran.online'),
            'password' => env('ADMIN_PASSWORD', '123Mbi@@'),
            'is_admin' => true,
        ]);
    }
}
