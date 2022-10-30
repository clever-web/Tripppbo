<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WorldCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = file_get_contents(__DIR__.'/cities.json');
        $cities = json_decode($string_json, true);

        for ($x = 0; $x < count($cities); $x += 10000) {
            $chunk = [];
            if ($x + 10000 > (count($cities) - 1)) {
                $chunk = array_slice($cities, $x);
            } else {
                $chunk = array_slice($cities, $x, 10000);
            }
            DB::table('world_cities')->insert(
                $chunk
            );
        }
    }
}
