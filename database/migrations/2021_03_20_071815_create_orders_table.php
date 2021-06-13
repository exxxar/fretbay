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
            $table->double("summary_delivery_range")
                ->default(0)
                ->comment("Суммарное расстояние доставки");

            $table->json("properties")->comment("Параметры груза");
            $table->dateTime("shipping_date_from")->comment("Дата погрузки c");
            $table->dateTime("shipping_date_to")->comment("Дата погрузки по");
            $table->dateTime("unshipping_date_from")->comment("Дата разгрузки с");
            $table->dateTime("unshipping_date_to")->comment("Дата разгрузки по");
            $table->text("comment")->comment("Комментарий к заказу");
            $table->json("shipping_points_from")->comment("Точки, с которых груз забрать");
            $table->json("shipping_delivery_address")->comment("Точка, на которую груз выгрузить");

            $table->json("additional_properties")->comment("Дополнительные параметры");
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
