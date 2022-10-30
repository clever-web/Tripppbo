<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TrippboUserLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__.'/languages.json');
        $languages = json_decode($string_json, true);
        DB::table('trippbo_user_languages')->insert(
            $languages
        );


    
    }
}
