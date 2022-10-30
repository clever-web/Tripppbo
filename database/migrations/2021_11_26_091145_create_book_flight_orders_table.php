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
        Schema::create('book_flight_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('AppReference');
            $table->string('SequenceNumber')->default(0);
            $table->string('ResultToken');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('numOfAdults')->nullable();
            $table->unsignedInteger('numOfChildren')->nullable();
            $table->unsignedInteger('numOfInfants')->nullable();
            $table->boolean('is_on_hold')->nullable();
            $table->boolean('submitted')->default(false);
            $table->json('commit_book_response')->nullable();
            $table->boolean('requires_attention')->default(false);
            $table->unsignedBigInteger('flight_service_package_id')->nullable();

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
        Schema::dropIfExists('book_flight_orders');
    }
};
