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
        Schema::create('book_activity_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('BlockTourId');
            $table->string('AppReference');
            $table->string('ProductCode');
            $table->string('BookingDate');
            $table->string('GradeCode');
            $table->json('commit_book_response')->nullable();
            $table->boolean('requires_attention')->default(false);
            $table->boolean('booked_successfully')->default(false);
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
        Schema::dropIfExists('book_activity_orders');
    }
};
