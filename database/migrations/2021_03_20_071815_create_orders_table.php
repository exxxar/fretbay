<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("title")->comment("Название заказа");
            $table->text("description")->comment("Описание заказа");
            $table->double("price")->default(0)->comment("Сумма заказа");

            $table->integer("status")->default(0);

            $table->unsignedInteger("listing_id")->nullable();
            $table->unsignedInteger("user_id")->nullable();
            $table->unsignedInteger("transporter_id")->nullable();

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
        Schema::dropIfExists('orders');
    }
}
