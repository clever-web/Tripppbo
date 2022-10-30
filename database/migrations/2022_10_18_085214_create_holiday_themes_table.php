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
        Schema::create('holiday_themes', function (Blueprint $table) {
            $table->id();
            $table->string("theme_id");
            $table->string("theme_name");
            $table->boolean("is_featured")->nullable();
            $table->string("theme_picture")->nullable();
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
        Schema::dropIfExists('holiday_themes');
    }
};
