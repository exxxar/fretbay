<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "title",//Название заказа
        "description",//Описание заказа
        "price",//Сумма заказа
        "summary_delivery_range",///Суммарное расстояние доставки

        "properties",///Параметры груза
        "shipping_date_from",//Дата погрузки c
        "shipping_date_to",///Дата погрузки по
        "unshipping_date_from",//Дата разгрузки с
        "unshipping_date_to",//Дата разгрузки по
        "comment",//Комментарий к заказу
        "shipping_points_from",//Точки, с которых груз забрать
        "shipping_delivery_address",//Точка, на которую груз выгрузить

        "additional_properties",//Дополнительные параметры
    ];

    protected $casts = [
        "price" => "double",
        "summary_delivery_range" => "double",
        "properties" => "array",
        "shipping_date_from" => "datetime",
        "shipping_date_to" => "datetime",
        "unshipping_date_from" => "datetime",
        "unshipping_date_to" => "datetime",
        "additional_properties" => "array",
    ];
}
