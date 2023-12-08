<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Category::factory()->create([
        //     'name' => 'Test User',
        //     'image' => 'test@example.com',
        // ]);
        Admin::factory()->count(10)->create();
         //$this->call([
        // AdminSeeder::class,
        // ]);

    }
}
