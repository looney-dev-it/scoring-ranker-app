<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;
use Faker\Factory as Faker;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create();
        $categorie_names = ['General', 'Score', 'Forum', 'Profile', 'ScoreTopic']
        $categories = collect();
        for ($i = 0; $i < 5; $i++) {
            $categories->push(Category::create([
                'name' => $categorie_names[$i],
            ]));
        }

        foreach ($categories as $category) {
            for ($j = 0; $j < 5; $j++) {
                Question::create([
                    'question'    => $faker->sentence(8), 
                    'answer'      => $faker->paragraph(3),
                    'category_id' => $category->id,
                ]);
            }
        }

    }
}
