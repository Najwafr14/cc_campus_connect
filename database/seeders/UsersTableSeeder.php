<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user and assign the "Admin" role (assuming role_id 1 is Admin)
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'),
            'role_id' => 1,  // Assuming 1 is the "Admin" role in the roles table
        ]);
    }
}
