<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->double('price')->default(0);
            $table->timestamp('valid_until_date');
            $table->json('additional_info')->nullable();
            $table->json('formula')->nullable();
            $table->integer('status')->default(0);
            $table->integer('type_of_transport')->default(0);
            $table->integer('quote_validity')->default(0);
            $table->string('currency',2)->default('$');
            $table->unsignedInteger('listing_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('quote');
    }
}
