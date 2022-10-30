<?php

namespace Database\Factories;

use App\Models\SoloTrip;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoloTripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' => '1',
            'description' => $this->faker->text(),
            'goal' => $this->faker->numberBetween(1, 2000),
            'title' => $this->faker->text(15),
            'startdate' => $this->faker->date(),
            'enddate' => $this->faker->dateTimeBetween('now', '+14 days'),
            'destination' => $this->faker->country(),
            /*    $table->string("user_id");
            $table->string("description");
            $table->string("goal");
            $table->string("title");
            $table->date("startdate");
            $table->date("enddate");
            $table->string("destination");
            $table->integer("donations")->default(0);*/
        ];
    }
}
