<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name' => env('SEEDED_USERNAME'),
            'email' => env('SEEDED_EMAIL'),
        ], [
            'password' => bcrypt(env('SEEDED_PASSWORD')),
        ]);

        Note::factory()->times(5)->create();
        Article::factory()->times(5)->create();
    }
}
