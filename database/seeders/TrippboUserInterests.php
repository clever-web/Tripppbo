<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TrippboUserInterests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intrests = [
            ['interest_name' => 'Golf'],
            ['interest_name' => 'Music'],
            ['interest_name' => 'Football'],
            ['interest_name' => 'Workout'],
            ['interest_name' => 'Technology']
         
      
        ];


        DB::table('trippbo_user_interests')->insert($intrests);
    }
}
