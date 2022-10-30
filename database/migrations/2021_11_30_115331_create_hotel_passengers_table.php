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
        Schema::create('hotel_passengers', function (Blueprint $table) {
            $table->id();
            $table->string('IsLeadPax');
            $table->string('Title');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Gender');
            $table->string('DateOfBirth');
            $table->string('CountryCode');
            $table->string('CountryName');
            $table->string('ContactNo');
            $table->string('City');
            $table->string('PinCode');
            $table->string('AddressLine1');
            $table->string('Email');
            $table->integer('PaxType');
            $table->string('RoomId')->default(0);
            $table->unsignedBigInteger('hotel_order_id');
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
        Schema::dropIfExists('hotel_passengers');
    }
};
