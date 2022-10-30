<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitesCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['first_id' => '1', 'name' => 'Air, Helicopter & Balloon Tours', 'code' => 'Air-Helicopter-and-Balloon-Tours', 'category_id' => '1'],
            ['first_id' => '2', 'name' => 'Classes & Workshops', 'code' => 'Classes-and-Workshops', 'category_id' => '26051'],
            ['first_id' => '3', 'name' => 'Cruises, Sailing & Water Tours', 'code' => 'Cruises-Sailing-and-Water-Tours', 'category_id' => '3'],
            ['first_id' => '4', 'name' => 'Cultural & Theme Tours', 'code' => 'Cultural-and-Theme-Tours', 'category_id' => '4'],
            ['first_id' => '5', 'name' => 'Day Trips & Excursions', 'code' => 'Day-Trips-and-Excursions', 'category_id' => '5'],
            ['first_id' => '6', 'name' => 'Family Friendly', 'code' => 'Family-Friendly', 'category_id' => '21'],
            ['first_id' => '7', 'name' => 'Food, Wine & Nightlife', 'code' => 'Food-Wine-and-Nightlife', 'category_id' => '6'],
            ['first_id' => '8', 'name' => 'Holiday & Seasonal Tours', 'code' => 'Holiday-and-Seasonal-Tours', 'category_id' => '7'],
            ['first_id' => '9', 'name' => 'Luxury & Special Occasions', 'code' => 'Luxury-and-Special-Occasions', 'category_id' => '25'],
            ['first_id' => '10', 'name' => 'Multi-day & Extended Tours', 'code' => 'Multi-day-and-Extended-Tours', 'category_id' => '20'],
            ['first_id' => '11', 'name' => 'Outdoor Activities', 'code' => 'Outdoor-Activities', 'category_id' => '9'],
            ['first_id' => '12', 'name' => 'Private & Custom Tours', 'code' => 'Private-and-Custom-Tours', 'category_id' => '26'],
            ['first_id' => '13', 'name' => 'Shopping & Fashion', 'code' => 'Shopping-and-Fashion', 'category_id' => '10'],
            ['first_id' => '14', 'name' => 'Shore Excursions', 'code' => 'Shore-Excursions', 'category_id' => '24'],
            ['first_id' => '15', 'name' => 'Shows, Concerts & Sports', 'code' => 'Shows-Concerts-and-Sports', 'category_id' => '11'],
            ['first_id' => '16', 'name' => 'Sightseeing Tickets & Passes', 'code' => 'Sightseeing-Tickets-and-Passes', 'category_id' => '8'],
            ['first_id' => '17', 'name' => 'Spa Tours', 'code' => 'Spa-Tours', 'category_id' => '5335'],
            ['first_id' => '18', 'name' => 'Theme Parks', 'code' => 'Theme-Parks', 'category_id' => '14'],
            ['first_id' => '19', 'name' => 'Tours & Sightseeing', 'code' => 'Tours-and-Sightseeing', 'category_id' => '12'],
            ['first_id' => '22', 'name' => 'Walking & Biking Tours', 'code' => 'Walking-and-Biking-Tours', 'category_id' => '16'],
            ['first_id' => '23', 'name' => 'Water Sports', 'code' => 'Water-Sports', 'category_id' => '17'],
            ['first_id' => '24', 'name' => 'Weddings & Honeymoons', 'code' => 'Weddings-and-Honeymoons', 'category_id' => '18'],

        ];

        DB::table('activites_categories')->insert($categories);
    }
}
