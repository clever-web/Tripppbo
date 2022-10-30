<?php

namespace Database\Factories;

use App\Models\TripJoinRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripJoinRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'user_id' => 2,
            'trip_id' => 1,
            'message' => $this->faker->text(),
            'country' => $this->faker->country(),
            'fund_hotel' => 0,
            'fund_flight' => 0,
            'created_at' => $this->faker->date('Y-m-d', 'now'),

        ];
    }
}
