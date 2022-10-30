<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SriggleAirportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__ . '/Sriggle_AIRPORT.json');
        $airports = json_decode($string_json, true);

        for ($x = 0; $x < count($airports); $x += 2000) {
            $chunk = [];
            if ($x + 2000 > (count($airports) - 1)) {
                $chunk = array_slice($airports, $x);
            } else {
                $chunk = array_slice($airports, $x, 2000);
            }
            DB::table('sriggle_airports')->insert(
                $chunk
            );
        }
    }
}
