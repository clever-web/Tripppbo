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
        Schema::create('ticket_lottery_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_lottery_id');
            $table->integer('amount_of_tickets')->default(1);
            $table->string('payment_intent_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('refunded')->default(false);
            $table->boolean('winner')->default(false);
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
        Schema::dropIfExists('ticket_lottery_orders');
    }
};
