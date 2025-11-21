<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScoreSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $types = [
            ['name' => 'Games', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sport', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('score_types')->insert($types);

        $gamesTypeId = DB::table('score_types')->where('name', 'Games')->value('id');
        $sportTypeId = DB::table('score_types')->where('name', 'Sport')->value('id');

        $topics = [
            ['title' => 'Running', 'unit' => 'KM', 'type_id' => $sportTypeId, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Swimming', 'unit' => 'M', 'type_id' => $sportTypeId, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Fortnite', 'unit' => 'Pts', 'type_id' => $gamesTypeId, 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('score_topics')->insert($topics);

        $runningId = DB::table('score_topics')->where('title', 'Running')->value('id');
        $swimmingId = DB::table('score_topics')->where('title', 'Swimming')->value('id');
        $gamingId = DB::table('score_topics')->where('title', 'Fortnite')->value('id');

        $users = [1, 2, 3, 4];
        $scores = [];

        foreach ($users as $userId) {
            // Running : 1 to 20 KM
            $scores[] = [
                'topic_id' => $runningId,
                'user_id' => $userId,
                'score' => rand(1, 20),
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // Swimming : 50 to 2000 M
            $scores[] = [
                'topic_id' => $swimmingId,
                'user_id' => $userId,
                'score' => rand(50, 2000),
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // Gaming : 10 to 1000 Points
            $scores[] = [
                'topic_id' => $gamingId,
                'user_id' => $userId,
                'score' => rand(10, 1000),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('scores')->insert($scores);
    }
}