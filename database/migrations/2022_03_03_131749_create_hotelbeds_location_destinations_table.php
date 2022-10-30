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
        Schema::create('hotelbeds_location_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('countryCode');
            $table->string('isoCode');
            $table->json('zones');

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
        Schema::dropIfExists('hotelbeds_location_destinations');
    }
};
