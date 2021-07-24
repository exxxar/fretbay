<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->json('articles');
            $table->json('place_of_loading');
            $table->json('place_of_delivery');
            $table->dateTime('shipping_date_from');
            $table->dateTime('shipping_date_to');
            $table->dateTime('unshipping_date_from');
            $table->dateTime('unshipping_date_to');
          //  $table->json('messages');
            $table->longText('additional_info');
            $table->json('images');
            $table->string('status');
            $table->string('moving_package')->nullable();
            $table->date('expiration_date');
            $table->double('summary_volume', 8,2 );
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('thing_id')->nullable();
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('listings');
    }
}
