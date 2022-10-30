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
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->boolean("is_fixed_coupon")->default(true);
            $table->integer('coupon_fixed_amount')->nullable();
            $table->integer('coupon_off_percentage')->nullable();
            $table->string('currency')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('valid_until');
            $table->boolean('redeemed')->default(false);
            $table->boolean('active')->default(true);

            $table->integer("number_of_redeems")->default(0)->nullable();

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
        Schema::dropIfExists('coupon_codes');
    }
};
