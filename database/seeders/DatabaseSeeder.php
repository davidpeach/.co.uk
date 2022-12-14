<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ],[
            'password' => bcrypt(env('SEEDED_PASSWORD')),
         ]);
    }
}
