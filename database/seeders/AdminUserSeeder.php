<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@mabastore.com'], // cek apakah sudah ada
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // ubah sesuai keinginan
                'is_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
