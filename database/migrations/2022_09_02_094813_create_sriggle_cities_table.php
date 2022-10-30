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
        Schema::create('sriggle_cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_id');
            $table->string('Code');
            $table->string('Name');
            $table->string('Desc1');
            $table->string('Desc2');
            $table->string('Display');
            $table->string('Type');
            $table->string('Count');
            $table->string('Lat');
            $table->string('Long');


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
        Schema::dropIfExists('sriggle_cities');
    }
};
