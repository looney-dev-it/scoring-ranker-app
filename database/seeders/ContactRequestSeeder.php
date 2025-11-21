<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ContactRequestSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $now = Carbon::now();

        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'from'       => $faker->name(),
                'email'      => $faker->safeEmail(),
                'subject'    => $faker->sentence(6),
                'message'    => $faker->paragraph(3),
                'treated'    => $faker->boolean(), // true ou false aléatoire
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('contact_requests')->insert($data);
    }
}