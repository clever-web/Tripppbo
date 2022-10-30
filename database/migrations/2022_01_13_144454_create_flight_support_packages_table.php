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
        Schema::create('flight_support_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name')->nullable();
            $table->integer('price_percentage')->nullable();
            $table->boolean('makes_flight_cancellation_available')->nullable();
            $table->boolean('makes_flight_change_available')->nullable();
            $table->boolean('makes_airport_help_available')->nullable();

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
        Schema::dropIfExists('flight_support_packages');
    }
};
