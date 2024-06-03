<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Create a user
    $user = User::create([
        'name' => 'Admin',
        'phone_number' => 1234567890,
        'address' => 'addis ababa',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('12345678')
    ]);

    // Output success message
    $this->command->info('User seeder completed.');
}
}
