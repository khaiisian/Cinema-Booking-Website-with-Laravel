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
     */
    public function run(): void
    {
        //
        $user = User::create([
            'u_name' => 'admin',
            'acc_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Hash the password
            'u_type' => 'admin',
            // 'u_code' => uniqid('User_'), // Generate a unique user code
        ]);

        $u_code = uniqid('USER_') . $user->u_id;
        $user->u_code = $u_code;
        $user->save();
    }
}