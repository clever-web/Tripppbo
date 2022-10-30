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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('current_city_id')->nullable();
            $table->unsignedBigInteger('hometown_city_id')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_verification_code')->nullable();
            $table->string('phone_number_verification_code_sent_at')->nullable();
            $table->string('phone_number_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('isAdmin')->default(false);
            $table->unsignedBigInteger('ticket_lottery_entries')->default(0);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
