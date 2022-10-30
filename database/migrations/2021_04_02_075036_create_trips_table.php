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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('start_month');
            $table->string('duration')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('host_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->boolean('active')->default(true);

            $table->string('trip_img')->nullable();
            $table->string('destination_city_code')->nullable();
            
            $table->unsignedBigInteger('destination_country_id')->nullable();
            $table->unsignedBigInteger('destination_city_id')->nullable();
            $table->boolean('type_of_trip')->default(false);

            $table->boolean('is_on_hold')->default(false);
            $table->boolean('completed')->default(false);

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
        Schema::dropIfExists('trips');
    }
};
