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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_method_name')->nullable();
            $table->string('payment_reference_id')->nullable();
            $table->boolean('refunded')->default(false);
            $table->boolean('paid')->default(false);
            $table->unsignedBigInteger('applied_coupon_id')->nullable();
            $table->boolean('cancelled')->default(false);
            $table->boolean('completed')->default(false); // indicates that the user should have another order created for them when they try to checkout the next time.
            $table->string('order_reference')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
