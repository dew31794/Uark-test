<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'org_id' => 1,
            'name' => 'Jimmy',
            'birthday' => '2023/07/30',
            'email' => 'admin@example.com',
            'account' => 'admin',
            'password' => Hash::make('password'),
            'status' => 0
        ]);
    }
}
