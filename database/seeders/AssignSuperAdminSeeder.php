<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AssignSuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $u = User::find(1); // เปลี่ยนเป็น id ผู้ใช้ของคุณ
        if ($u && !$u->hasRole('SUPER ADMIN')) {
            $u->assignRole('SUPER ADMIN');
        }
    }
}
