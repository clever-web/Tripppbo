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
        Schema::create('book_flight_order_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_flight_order_id');
            $table->enum('status', [
                'initiated',
                'cancellation_requested',
                'cancellation_pending',
                'cancellation_approved',
                'cancellation_denied',
                'fulfilled'
            ]);
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
        Schema::dropIfExists('book_flight_order_statuses');
    }
};
