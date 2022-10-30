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
        Schema::create('featured_packages', function (Blueprint $table) {
            $table->id();
            $table->string("package_id");
            $table->string("airport_id")->nullable();
            $table->string("is_featured")->default(false);
            $table->string("include_flight")->default(true);
            $table->date("default_package_date")->nullable();
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
        Schema::dropIfExists('featured_packages');
    }
};
