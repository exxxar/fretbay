<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("type")->default('');
            $table->string("brand")->default('');
            $table->string("model")->default('');
            $table->string("plate_number")->default('');
            $table->integer("total_laden_weight")->default(0);
            $table->integer("cubing")->default(0);
            $table->json('images');
            $table->unsignedInteger("profile_id")->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
