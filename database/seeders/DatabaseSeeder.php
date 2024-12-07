<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'cnttnt@gmail.com',
            'password' => Hash::make('Abcd@1234'),
        ]);

        DB::table( 'categories')->insert([
            [
                'name' => 'News',
                'slug' => 'news',
            ],
            [
                'name' => 'Product',
                'slug' => 'product',
            ],
        ]);

        DB::table( 'posts' )->insert([
            [
                'title' => 'Introduce',
                'slug' => 'introduce',
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
            ]
        ]);

    }
}
