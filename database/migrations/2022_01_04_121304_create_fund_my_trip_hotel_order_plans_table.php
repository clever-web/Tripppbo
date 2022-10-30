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
        Schema::create('fund_my_trip_hotel_order_plans', function (Blueprint $table) {
            $table->id();
            $table->string('fund_my_trip_order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('trip_id');
            $table->string('city_code');
            $table->string('hotel_name');
            $table->string('hotel_code');
            $table->string('room_code');
            $table->string('checkin_date');
            $table->string('checkout_date');
            $table->string('numberOfNights');
            $table->boolean('refreshed')->default(false);
            $table->string('block_room_id')->nullable();
            $table->string('result_token')->nullable();
            $table->string('last_price')->nullable();
            $table->string('last_price_currency')->nullable();

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
        Schema::dropIfExists('fund_my_trip_hotel_order_plans');
    }
};
