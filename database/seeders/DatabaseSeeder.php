<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AutorSeeder::class,
            ProjectSeeder::class,
            PersonalUserSeeder::class,
            CardSeeder::class,
            PrioritySeeder::class,
            TypeLogSeeder::class,
        ]);
    }
}
