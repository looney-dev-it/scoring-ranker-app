<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $users = User::get();

        // Sample news
        $news = [
            'Freshly deployed new app with Laravel!',
            'Working on the Laravel framework website very hard!',
            'Weather is quite sad today, a good day to code ! :smile_cat: ',
            'Almost done with the seeding part of the News :+1:',
        ];

        // Create News from random users
        foreach ($news as $message) {
            $users->random()->news()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
