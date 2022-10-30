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
        Schema::create('travelomatix_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_code')->nullable();
            $table->string('city_id')->nullable();
            $table->json('hotel_facilities')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->json('images')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('travelomatix_hotels');
    }
};
