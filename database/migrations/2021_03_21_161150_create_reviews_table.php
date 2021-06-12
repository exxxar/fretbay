<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->longText('text')->default('');
            $table->integer('type')->default(0)->comment("Раздел, для которого отзыв");
            $table->boolean("is_visible")->default(false)->comment("флаг модерации");
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('review_id')->nullable()->comment("комментарий на комментарий");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
