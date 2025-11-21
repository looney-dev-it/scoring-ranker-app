<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ForumSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $now = Carbon::now();

        $users = DB::table('users')->pluck('id')->toArray();
        $topics = DB::table('score_topics')->pluck('id')->toArray();

        $threads = [];
        $posts = [];

        for ($i = 0; $i < 10; $i++) {
            $threadId = $i + 1;

            $threads[] = [
                'title' => $faker->sentence(6),
                'pinned' => $faker->boolean(20),
                'user_id' => $faker->randomElement($users),
                'scoretopic_id' => $faker->randomElement($topics),
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $postCount = rand(3, 8);
            for ($j = 0; $j < $postCount; $j++) {
                $posts[] = [
                    'content' => $faker->paragraph(rand(2, 5)),
                    'user_id' => $faker->randomElement($users),
                    'thread_id' => $threadId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('threads')->insert($threads);
        DB::table('posts')->insert($posts);

        $postIds = DB::table('posts')->pluck('id')->toArray();
        $likes = [];

        foreach ($postIds as $postId) {
            $likeCount = rand(0, 3);
            $likedUsers = $faker->randomElements($users, $likeCount);
            foreach ($likedUsers as $userId) {
                $likes[] = [
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('post_user_like')->insert($likes);
    }
}