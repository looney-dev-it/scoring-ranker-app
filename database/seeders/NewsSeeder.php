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
        $news = json_decode('[
            {
                "title": "New app!!",
                "content": "Freshly deployed new app with Laravel!"
            },
            {
                "title": "Working hard!!",
                "content": "Working on the Laravel framework website very hard!"
            },
            {
                "title": "Sad weather",
                "content": "Weather is quite sad today, a good day to code ! :smile_cat:"
            },
            {
                "title": "News seeding",
                "content": "Almost done with the seeding part of the News :+1:"
            }
        ]');

        // Crée les news associées à des utilisateurs aléatoires
        foreach ($news as $n) {
            $users->random()->news()->create([
                'title' => $n->title,
                'content' => $n->content,
                'is_published' => true,
                'published_at' => now()->subMinutes(rand(5, 1440)),
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
