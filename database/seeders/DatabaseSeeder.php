<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder อื่น ๆ ของคุณ...
        $this->call([
            RoleSeeder::class,
            AssignSuperAdminSeeder::class, // ถ้าใช้ตัว assign
        ]);
    }
}
