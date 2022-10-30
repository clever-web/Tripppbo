<?php

namespace Database\Seeders;

use App\Models\SoloTrip;
use App\Models\Trip;
use App\Models\TripJoinRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Trip::factory(1)->create();
        TripJoinRequest::factory(10)->create();
        */
      //  SoloTrip::factory(20)->create();







        $this->call([adminSeeder::class]);
        $this->call([countriesSeeder::class]);
        $this->call([AirportAutocompleteSeeder::class]);
        $this->call([hotelsAutocompleteSeeder::class]);
        $this->call([CurrencyCodesSeeder::class]);
        $this->call([AirlinesSeeder::class]);
        $this->call([activitiesAutocompleteSeeder::class]);
        $this->call([FlightSupportPackagesSeeder::class]);
        $this->call([WorldCitiesSeeder::class]);
        $this->call([HotelbedsRoomTypes::class]);
        $this->call([Hotelbeds_facilities::class]);
        $this->call([TemporaryCardSeeder::class]);
        $this->call([HotelbedsLocationDestinationSeeder::class]);
        $this->call([TrippboUserInterests::class]);
        $this->call([TrippboUserLanguages::class]);
        $this->call([countriesFlagsSeeder::class]);
        $this->call([CountriesDialCodes::class]);
        $this->call([SriggleCitySeeder::class]);
        $this->call([SriggleAirportsSeeder::class]);

        //  $this->call([ActivitesCategories::class]);
    }
}
