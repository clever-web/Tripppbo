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
        Schema::create('hotelbeds_rate_comments', function (Blueprint $table) {
            $table->id();
            $table->string('incoming')->nullable();
            $table->string('hotelCode')->nullable();
            $table->string('rateCommentCode')->nullable();
            $table->json('commentsByRates')->nullable();

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
        Schema::dropIfExists('hotelbeds_rate_comments');
    }
};
