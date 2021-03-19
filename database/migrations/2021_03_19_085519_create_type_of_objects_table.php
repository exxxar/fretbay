<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_objects', function (Blueprint $table) {
            $table->id();
            $table->string("title", 2000);

            $table->string("img", 1000);
            $table->double("volume")->default(0)->comment("объем");
            $table->double("weight")->default(0)->comment('масса, в кг');
            $table->integer("object_category_id");
            $table->integer("position")->default(0);
            $table->boolean("is_active")->default(true);
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
        Schema::dropIfExists('type_of_objects');
    }
}
