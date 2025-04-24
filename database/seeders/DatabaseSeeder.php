<?php

namespace Database\Seeders;

use App\Models\Login;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Login::create([
            'role' => 'admin',
            'login' => "admin",
            'password' => "As123456"
        ]);
        
        Login::create([
            'role' => 'teacher',
            'login' => "teacher",
            'password' => "As123456"
        ]);

        User::factory()->create([
            'name' => 'Tojiddin Fayzullayev',
            'email' => 'tfayzullaev66@gmail.com',
            'password' => bcrypt('As123456'),
            'role' => "admin",
            'login_id' => 1,
        ]);

        User::factory()->create([
            'name' => "Teacher Fayzullayev",
            'email' => "teacher@gmail.com",
            'password' => bcrypt('As123456'),
            'role' => "teacher",
            'login_id' => 2
        ]);
    }
}
