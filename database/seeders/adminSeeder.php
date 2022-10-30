<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@trippbo.com',
            'password' => Hash::make('testadminpassword'),
            'isAdmin' => true,
        ]);
        DB::table('user_profiles')->insert([
            'user_id' => '1',
        ]);

        //test user
        DB::table('users')->insert([
            'name' => 'tester',
            'email' => 'tester@trippbo.com',
            'password' => Hash::make('tester'),
            'isAdmin' => false,
        ]);
        DB::table('user_profiles')->insert([
            'user_id' => '2',
        ]);

    }
}
