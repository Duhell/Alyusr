<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        User::factory()->create([
             'name' => 'Omar',
             'email' => 'omar@alyusr.website',
             'password' => Hash::make('Alyusr_2023'),
             'email_verified_at' => now(),
             'role' => 1,
             'remember_token' => Str::random(10)
        ]);

        User::factory()->create([
             'name' => 'Al Yusr',
             'email' => 'admin@alyusr.website',
             'password' => Hash::make('Alyusr@2023'),
             'email_verified_at' => now(),
             'role' => 1,
             'remember_token' => Str::random(10)
        ]);
    }
}
