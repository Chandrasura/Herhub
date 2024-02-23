<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 'admin',
                'name' => 'Default User',
                'username' => 'default_user',
                'phone' => '123456789',
                'gender' => 'male',
                'withdrawal_pin' => Hash::make(1234),
                'referral_code' => 'AGRBJO',
                'password' => Hash::make('adminuser'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            )
        ));

    }
}
