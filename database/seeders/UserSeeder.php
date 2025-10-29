<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3
                    ? collect([
                        User::create([
                            'name' => 'User Test 1',
                            'email' => 'user1@example.com',
                            'password' => bcrypt('password'),
                        ]),
                        User::create([
                            'name' => 'User Test 2',
                            'email' => 'user2@example.com',
                            'password' => bcrypt('password'),
                        ]),
                        User::create([
                            'name' => 'User Test 3',
                            'email' => 'user3@example.com',
                            'password' => bcrypt('password'),
                        ]),
                    ])
                    : User::take(3)->get();
    }
}
