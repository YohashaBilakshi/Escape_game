<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name' => 'Yohasha',
            'email' => 'yoha@example.com',
        ]);

        \App\Models\GameList::factory()->createMany([
            [
                'name' => 'Room 1',
                'description' => 'First Level',
            ],
            [
                'name' => 'Room 2',
                'description' => 'Second Level',
            ],
            [
                'name' => 'Room 2',
                'description' => 'Third Level',
            ],
        ]);
    }
}
