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
        Schema::create('flight_passengers', function (Blueprint $table) {
            $table->id();
            $table->string('IsLeadPax')->nullable();
            $table->string('Title')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Gender')->nullable();
            $table->string('DateOfBirth')->nullable();
            $table->string('CountryCode')->nullable();
            $table->string('CountryName')->nullable();
            $table->string('ContactNo')->nullable();
            $table->string('City')->nullable();
            $table->string('PinCode')->nullable();
            $table->string('AddressLine1')->nullable();
            $table->string('Email')->nullable();
            $table->string('baggage_id')->nullable();
            $table->string('meal_id')->nullable();
            $table->string('seat_id')->nullable();

            $table->integer('PaxType');
            $table->unsignedBigInteger('flight_order_id');
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
        Schema::dropIfExists('flight_passengers');
    }
};
