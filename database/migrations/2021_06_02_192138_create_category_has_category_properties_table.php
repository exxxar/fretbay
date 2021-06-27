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
            $table->unsignedBigInteger("object_category_id")->nullable();
            $table->unsignedBigInteger("category_property_id")->nullable();
            $table->foreign('object_category_id')->references('id')->on('object_categories')->onDelete('cascade');
            $table->foreign('category_property_id')->references('id')->on('category_properties')->onDelete('cascade');
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
