<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_trip_orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('paid')->nullable();
            $table->boolean('processed')->default(false);
            $table->boolean('processing')->default(false);
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('klarna_order_id')->nullable();
            $table->boolean('paid_with_klarna')->default(false);
            $table->boolean('paid_with_stripe')->default(false);
            $table->boolean('for_a_trip')->default(false);
            $table->unsignedBigInteger('to_be_paid_from')->nullable();
            $table->boolean('submitted')->default(false);
            $table->unsignedBigInteger('gift_card_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

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
        Schema::dropIfExists('book_trip_orders');
    }
};
