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
        Schema::create('hotelbeds_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('code');
            $table->unsignedInteger('facilityGroupCode');
            $table->unsignedInteger('facilityTypologyCode');
            $table->string('description');
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
        Schema::dropIfExists('hotelbeds_facilities');
    }
};
