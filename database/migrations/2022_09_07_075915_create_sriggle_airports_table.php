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
        Schema::create('sriggle_airports', function (Blueprint $table) {
            $table->id();
            $table->string("airport_id")->nullable();
            $table->string("Code")->nullable();
            $table->string("Name")->nullable();
            $table->string("Desc1")->nullable();
            $table->string("Desc2")->nullable();
            $table->string("Display")->nullable();
            $table->string("Type")->nullable();
            $table->string("Count")->nullable();


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
        Schema::dropIfExists('sriggle_airports');
    }
};
