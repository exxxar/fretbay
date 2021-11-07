<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("description", 1000)->nullable();
            $table->unsignedInteger("user_id")->nullable();
            $table->unsignedInteger("listing_id")->nullable();
            $table->unsignedInteger("quote_id")->nullable();
            $table->unsignedInteger("order_id")->nullable();
            $table->boolean("success")->default(false);
            $table->double("amount")->default(0);
            $table->double("tax_amount")->default(0);
            $table->string("currency")->default('EUR');
            $table->string("source", 1000)->nullable();
            $table->string("type")->nullable(); //card
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
        Schema::dropIfExists('payment_histories');
    }
}
