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
        $users = User::count() < 4
                    ? collect([
                        User::create([
                            'name' => 'admin',
                            'email' => 'admin@ehb.be',
                            'password' => bcrypt('Password!321'),
                            'admin' => (boolean) 'true'
                        ]),
                        User::create([
                            'name' => 'User Demo 1',
                            'email' => 'demo1@example.com',
                            'password' => bcrypt('password'),
                            'admin' => (boolean) 'fase'
                        ]),
                        User::create([
                            'name' => 'User Demo 2',
                            'email' => 'demo2@example.com',
                            'password' => bcrypt('password'),
                            'admin' => (boolean) 'fase'
                        ]),
                        User::create([
                            'name' => 'User Demo 3',
                            'email' => 'demo3@example.com',
                            'password' => bcrypt('password'),
                            'admin' => (boolean) 'fase'
                        ]),
                    ])
                    : User::take(4)->get();
    }
}
