<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Profile;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Récupère les utilisateurs sauf "User Demo 3"
        $users = User::where('name', '!=', 'User Demo 3')->get();

        // Upload des photos depuis le dossier seeders/images/profiles
        $profileImages = collect(glob(database_path('seeders/images/profiles/*')))
            ->map(fn($image) => Storage::disk('public')->putFile('profile_images', new \Illuminate\Http\File($image)));

        foreach ($users as $index => $user) {
            Profile::create([
                'user_id'    => $user->id,
                'bio'        => $faker->sentence(12), // Bio aléatoire
                'birth_date' => $faker->date('Y-m-d', '-20 years'), // Date aléatoire avant aujourd'hui
                'photo'      => $profileImages[$index % $profileImages->count()] ?? null,
            ]);
        }

    }
}
