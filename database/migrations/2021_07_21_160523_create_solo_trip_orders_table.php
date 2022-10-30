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
        Schema::create('solo_trip_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->integer('amount');
            $table->string('payment_intent_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('refunded')->default(false);

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
        Schema::dropIfExists('solo_trip_orders');
    }
};
