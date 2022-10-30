<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HotelbedsRoomTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__.'/hotelbeds_rooms_types.json');
        $room_types = json_decode($string_json, true);

        for ($x = 0; $x < count($room_types); $x += 2000) {
            $chunk = [];
            if ($x + 2000 > (count($room_types) - 1)) {
                $chunk = array_slice($room_types, $x);
            } else {
                $chunk = array_slice($room_types, $x, 2000);
            }
            DB::table('hotelbeds_rooms_types')->insert(
                $chunk
            );
        }
    }
}
