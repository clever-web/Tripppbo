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
        Schema::create('airport_autocompletes', function (Blueprint $table) {
            $table->id();
            $table->string('Code');
            $table->string('CityName');
            $table->string('CountryName');
            $table->string('AirportName')->nullable();
            $table->string('logoName');
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
        Schema::dropIfExists('airport_autocompletes');
    }
};
