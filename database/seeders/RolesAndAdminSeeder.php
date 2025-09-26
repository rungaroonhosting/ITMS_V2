<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // สร้าง Roles
        foreach (['admin','it','manager','employee'] as $r) {
            Role::firstOrCreate(['name'=>$r]);
        }

        // สร้าง Admin User เริ่มต้น
        $admin = User::firstOrCreate(
            ['email' => 'wittaya.j@better-groups.com'],
            [
                'name' => 'System Admin',
                'password' => bcrypt('Admin!234'),
            ]
        );

        // กำหนด role admin ให้ user นี้
        $admin->assignRole('admin');
    }
}
