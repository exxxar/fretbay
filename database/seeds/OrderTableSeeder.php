<?php

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order();
        $order->title = "Test title";
        $order->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus pharetra nibh,
            sed varius ligula congue eget. In hac habitasse platea dictumst. Sed molestie nisi sed aliquam iaculis.";
        $order->price = 2000;
        $order->summary_delivery_range = 5;
        $order->properties = json_encode(['{width:20, height:20, deapth:20}']);
        $order->shipping_date_from = \Carbon\Carbon::today();
        $order->shipping_date_to = \Carbon\Carbon::today();
        $order->unshipping_date_from = \Carbon\Carbon::today();
        $order->unshipping_date_to = \Carbon\Carbon::today();
        $order->comment = "comment";
        $order->shipping_points_from = json_encode('{[coordinates_x:20.4433, coordinates_y:31.32432]}');
        $order->shipping_delivery_address = json_encode('{[coordinates_x:20.4433,coordinates_y:31.32432]}');
        $order->additional_properties = json_encode(['dop_parametr']);
        $order->save();

    }
}
