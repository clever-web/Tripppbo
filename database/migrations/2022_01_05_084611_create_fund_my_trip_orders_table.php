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
        Schema::create('fund_my_trip_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->boolean('isSubmitted')->default(false);
            $table->boolean('submittedSuccessfully')->nullable();
            $table->dateTime('last_finalized')->nullable();
            $table->string('stripe_intent_id')->nullable();
            $table->boolean('successfully_paid')->nullable();

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
        Schema::dropIfExists('fund_my_trip_orders');
    }
};
