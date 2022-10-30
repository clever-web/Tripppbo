<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_trip_hotelbeds_hotel_orders', function (Blueprint $table) {
            $table->id();
            $table->string('client_reference')->nullable();
            $table->string('holder_first_name')->nullable();
            $table->string('holder_last_name')->nullable();
            $table->string('rate_key')->nullable();
            $table->json('booking_response')->nullable();
            $table->integer('amount_of_rooms')->nullable();
            $table->string('email')->nullable();
            $table->string('contactno')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->string('passkey')->nullable();

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
        Schema::dropIfExists('book_trip_hotelbeds_hotel_orders');
    }
};
