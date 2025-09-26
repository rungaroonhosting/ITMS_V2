<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Incident;

class IncidentSeeder extends Seeder
{
    public function run(): void
    {
        Incident::factory(25)->create();
    }
}

