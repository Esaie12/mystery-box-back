<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Mystery',
            'email' => 'admin@mlb.com',
            'password' => Hash::make('P@ssw0rd'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'User Test',
            'email' => 'user@mlb.com',
            'password' => Hash::make('P@ssw0rd'),
            'email_verified_at' => now(),
        ]);
    }
}
