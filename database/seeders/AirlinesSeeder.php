<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AirlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__.'/airlines.json');
        $airlines = json_decode($string_json, true);
        DB::table('airlines')->insert(
            $airlines
        );
    }
}
