<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            [
                'nickname' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('12345678'),
                'type' => 0
            ],
            [
                'nickname' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'type' => 1
            ]
        ]);
    }
}
