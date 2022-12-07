<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Gita Kartika 2071',
            'email' => 'gitakartika2071@gmail.com',
            'password' => Hash::make('gitakartika2071'),
            'role_id' => 1
        ]);
    }
}
