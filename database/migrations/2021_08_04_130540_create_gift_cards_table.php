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
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number');
            $table->string('reference_number');
            $table->string('code')->unique();
            $table->integer('value');
            $table->string('currency')->default('EUR');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('expires_at')->nullable();
            $table->boolean('redeemed')->default(false);
            $table->integer('redeemed_portion')->default(0); // in case someone uses for example just 50% of the card
            $table->boolean('on_hold')->default(false);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('gift_cards');
    }
};
