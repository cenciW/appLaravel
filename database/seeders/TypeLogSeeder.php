<?php

namespace Database\Seeders;

use App\Models\TypeLog;
use Illuminate\Database\Seeder;

class TypeLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeLog::factory(3)->create();
    }
}
