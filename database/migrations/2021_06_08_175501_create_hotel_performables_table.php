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
        Schema::create('hotel_performables', function (Blueprint $table) {
            $table->id();
            $table->string('action_name');
            $table->string('hotel_offer_id');
            $table->string('passenger_title');
            $table->string('passenger_first_name');
            $table->string('passenger_last_name');

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
        Schema::dropIfExists('hotel_performables');
    }
};
