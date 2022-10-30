<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Hotelbeds_facilities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__.'/hotelbeds_facilities.json');
        $room_types = json_decode($string_json, true);

        for ($x = 0; $x < count($room_types); $x += 2000) {
            $chunk = [];
            if ($x + 2000 > (count($room_types) - 1)) {
                $chunk = array_slice($room_types, $x);
            } else {
                $chunk = array_slice($room_types, $x, 2000);
            }
            DB::table('hotelbeds_facilities')->insert(
                $chunk
            );
        }
    }
}
