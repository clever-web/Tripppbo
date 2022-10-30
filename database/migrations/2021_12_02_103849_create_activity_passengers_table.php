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
        Schema::create('activity_passengers', function (Blueprint $table) {
            $table->id();
            $table->string('IsLeadPax');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('ContactNo');
            $table->string('Email');
            $table->integer('PaxType');
            $table->unsignedBigInteger('activity_order_id');
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
        Schema::dropIfExists('activity_passengers');
    }
};
