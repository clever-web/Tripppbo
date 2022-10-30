<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemporaryCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__ . '/cards.json');
        $room_types = json_decode($string_json, true);


        DB::table('gift_cards')->insert(
            $room_types
        );
    }
}
