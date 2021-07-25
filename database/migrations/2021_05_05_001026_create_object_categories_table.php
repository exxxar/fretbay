<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_categories', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->double('min_price')->default(0);
            $table->string('image')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('mode');
            $table->string('additional_menu_title')->default('');
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
        Schema::dropIfExists('categories');
    }
}
