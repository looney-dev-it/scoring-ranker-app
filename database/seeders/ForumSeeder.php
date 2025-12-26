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

        // --- 1) Some topics needs boosted threads for pagination testing
        $boostedTopics = $faker->randomElements($topics, 2); 

        $threadId = 1;

        foreach ($topics as $topicId) {

            // Nb of threads for this topic
            $threadCount = in_array($topicId, $boostedTopics)
                ? rand(12, 18)  // boosted topics
                : rand(3, 7);   // normal topics

            for ($i = 0; $i < $threadCount; $i++) {

                $threads[] = [
                    'title' => $faker->sentence(6),
                    'pinned' => $faker->boolean(20),
                    'user_id' => $faker->randomElement($users),
                    'scoretopic_id' => $topicId,
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

                $threadId++;
            }
        }

        DB::table('threads')->insert($threads);
        DB::table('posts')->insert($posts);

        // --- 2) Some threads needs morez posts to ensure pagination ---
        $threadIds = DB::table('threads')->pluck('id')->toArray();
        $boostedThreads = $faker->randomElements($threadIds, 3);

        $extraPosts = [];

        foreach ($boostedThreads as $tid) {
            $extraCount = rand(15, 25);

            for ($i = 0; $i < $extraCount; $i++) {
                $extraPosts[] = [
                    'content' => $faker->paragraph(rand(2, 5)),
                    'user_id' => $faker->randomElement($users),
                    'thread_id' => $tid,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('posts')->insert($extraPosts);

        // --- 3) Random likes 
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