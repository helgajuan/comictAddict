<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comic;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Helga Juan',
            'username' => 'helgajuan',
            'email' => 'helgajuan@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(5)->create();

        Comic::factory(40)->create();

        Category::create([
            'name' => 'Comedy',
            'slug' => 'comedy'
        ]);

        Category::create([
            'name' => 'Sci-fi',
            'slug' => 'scifi'
        ]);

        Category::create([
            'name' => 'Action',
            'slug' => 'action'
        ]);
    }
}
