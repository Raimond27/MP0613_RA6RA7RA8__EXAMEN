<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([            
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'role' => 'client',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'role' => 'client',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carol Davis',
                'email' => 'carol@example.com',
                'role' => 'client',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Lee',
                'email' => 'david@example.com',
                'role' => 'client',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eva Martinez',
                'email' => 'eva@example.com',
                'role' => 'client',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'jiyooo@pizzeria.com',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('youfoundme'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
