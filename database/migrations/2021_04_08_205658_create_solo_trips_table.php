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
        Schema::create('solo_trips', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('description');
            $table->unsignedInteger('goal');
            $table->string('title');
            $table->date('startdate');
            $table->date('enddate');
            $table->unsignedBigInteger('destination_country_id')->nullable();
            $table->unsignedBigInteger('destination_city_id')->nullable();
            $table->string('destination');
            $table->string('picture_url')->nullable();
            $table->unsignedInteger('fund_duration')->nullable();
            $table->Integer('durationInDays')->default(30);
            $table->integer('donations')->default(0);
            $table->boolean('ended')->default(false);
            $table->boolean('redeemed')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('solo_trips');
    }
};
