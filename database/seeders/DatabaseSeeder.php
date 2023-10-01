<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Auther;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Reader;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(4)->create();

        //$this->call([
            User::factory(4)->create();
            Category::factory(10)->create();
            Publisher::factory(10)->create();
            Reader::factory(10)->create();
            Auther::factory(10)->create();
            Setting::factory(2)->create();
            Book::factory(10)->create();
        //]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
