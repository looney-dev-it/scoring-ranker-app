<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $now = Carbon::now();

        $users = [1, 2, 3, 4];
        $profiles = [1, 2, 3];
        $news = [1, 2, 3, 4];

        $commentNews = [];
        $commentProfiles = [];

        for ($i = 0; $i < 20; $i++) {
            $commentNews[] = [
                'content' => $faker->paragraph(rand(2, 4)),
                'user_id' => $faker->randomElement($users),
                'news_id' => $faker->randomElement($news),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        for ($i = 0; $i < 20; $i++) {
            $commentProfiles[] = [
                'content' => $faker->paragraph(rand(2, 4)),
                'user_id' => $faker->randomElement($users),
                'profile_id' => $faker->randomElement($profiles),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('comment_news')->insert($commentNews);
        DB::table('comment_profiles')->insert($commentProfiles);
    }
}