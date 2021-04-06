<?php

use App\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);
        User::create([
            'name' => 'user1',
            'email' => 'user1@test.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'user2',
            'email' => 'user2@test.com',
            'password' => Hash::make('password')
        ]);
    }
}
