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
        Schema::create('ticket_lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('city')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('entry_fee');
            $table->date('expiry_date')->nullable();
            $table->string('type_of_lottery');
            $table->integer('gift_card_value')->nullable();
            $table->unsignedBigInteger('winner_user_id')->nullable();
            $table->string('terms_box_1')->nullable();
            $table->string('terms_box_2')->nullable();
            $table->date('lottery_end_date')->nullable();
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
        Schema::dropIfExists('ticket_lotteries');
    }
};
