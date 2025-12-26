<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@ehb.be')->first();

        $newsData = [
            [
                'title' => 'New app!!',
                'content' => 'Freshly deployed new app with Laravel!',
            ],
            [
                'title' => 'Working hard!!',
                'content' => "Working on the Laravel framework website very hard!\n\nNoOne",
            ],
            [
                'title' => 'Sad weather',
                'content' => "Weather is quite sad today, a good day to code ! :smile_cat:\n\nDominique",
            ],
            [
                'title' => 'News seeding',
                'content' => 'Almost done with the seeding part of the News :+1:',
            ],
        ];

        // Upload news image to public folder ...
        $imagePaths = collect(glob(database_path('seeders/images/news/*')))
            ->map(fn($image) => Storage::disk('public')->putFile('news_images', new \Illuminate\Http\File($image)));

        foreach ($newsData as $index => $data) {
            $user->news()->create([
                'title'         => $data['title'],
                'content'       => $data['content'],
                'is_published'  => true,
                'image_path'    => $imagePaths[$index % $imagePaths->count()] ?? null,
                'published_at'  => now()->subMinutes(rand(5, 1440)),
                'created_at'    => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
