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
        Schema::create('hotelbeds_rooms_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('characteristic')->nullable();
            $table->string('minPax')->nullable();
            $table->string('maxPax')->nullable();
            $table->string('maxAdults')->nullable();
            $table->string('maxChildren')->nullable();
            $table->string('minAdults')->nullable();
            $table->string('description')->nullable();
            $table->string('typeDescription')->nullable();
            $table->string('characteristicDescription')->nullable();
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
        Schema::dropIfExists('hotelbeds_rooms_types');
    }
};
