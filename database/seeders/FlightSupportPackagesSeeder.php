<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSupportPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'package_name' => 'Basic',
                'price_percentage' => 0,
                'makes_flight_cancellation_available' => false,
                'makes_flight_change_available' => false,
                'makes_airport_help_available' => false,
            ],
            [
                'package_name' => 'Plus',
                'price_percentage' => 20,
                'makes_flight_cancellation_available' => false,
                'makes_flight_change_available' => true,
                'makes_airport_help_available' => true,
            ],
            [
                'package_name' => 'Ultra',
                'price_percentage' => 30,
                'makes_flight_cancellation_available' => true,
                'makes_flight_change_available' => true,
                'makes_airport_help_available' => true,
            ],

        ];

        DB::table('flight_support_packages')->insert(
            $packages
        );
    }
}
