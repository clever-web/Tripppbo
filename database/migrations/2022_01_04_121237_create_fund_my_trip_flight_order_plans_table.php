<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_my_trip_flight_order_plans', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger("user_id");
            $table->json('flight');
            $table->json('search_data');
            $table->unsignedBigInteger('trip_id');
            $table->dateTime("last_price_update")->nullable();
            $table->dateTime("last_price_validation")->nullable();
            $table->string("last_price")->nullable();
            $table->string("currency")->nullable();


/*             $table->string('fund_my_trip_order_id');
            $table->unsignedBigInteger('user_id');
            $table->string('departure_date');
            $table->string('return_date');
            $table->string('origin_airport_code');
            $table->string('destination_airport_code');
            $table->string('operator_code');
            $table->string('flight_number');
            $table->string('return_operator_code');
            $table->string('return_flight_number');
            $table->string('updated_result_token');
            $table->string('last_price');
            $table->string('last_price_currency');
            $table->boolean('updated');
            $table->string('trip_1_time');
            $table->string('trip_1_arrival_time');
            $table->string('trip_2_time');
            $table->string('trip_2_arrival_time'); */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fund_my_trip_flight_order_plans');
    }
};
