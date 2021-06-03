<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryHasCategoryPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('category_has_category_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("category_id")->nullable();
            $table->unsignedInteger("category_property_id")->nullable();
            $table->boolean( 'required')->default(false);
           /// $table->string('custom_title')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_has_category_properties');
    }
}
