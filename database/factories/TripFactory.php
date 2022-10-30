<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->text(15),
            'description' => $this->faker->text(),
            'destination' => $this->faker->country(),
            'destination_country_id' => $this->faker->numberBetween(1, 243),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'user_id' => '1',
            'should_book' => $this->faker->boolean(),
            //       $table->string('title');
            //     $table->string('description');
            //$table->string('destination');
            //  $table->date('start_date');
            //    $table->date('end_date');
            // $table->unsignedBigInteger('user_id');
            // $table->boolean('active')->default(true);
            //  $table->boolean('should_book');
        ];
    }
}
