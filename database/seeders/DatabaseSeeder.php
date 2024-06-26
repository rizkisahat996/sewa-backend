<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Building;
use App\Models\BuildingCategory;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\User;
use Database\Factories\BuildingFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create([
        //     'name' => 'Konrix',
        //     'email' => 'konrix@coderthemes.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);

        // User::factory()->count(10)->create();
        // BuildingCategory::create(['name' => 'Event']);
        // BuildingCategory::create(['name' => 'Building']);
        Building::factory()->count(20)->create();
        // Transaction::factory()->count(20)->create();
        // Invoice::factory()->count(20)->create();
    }
}
