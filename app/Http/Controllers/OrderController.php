<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProperyStoreRequest;
use App\Http\Requests\CategoryProperyUpdateRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\CategoryProperty;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json([
            'order' => $orders
        ])->paginate(15);
    }


    public function acceptOrder(Request $request){

    }

    public function changeOrderStatus(Request $request){
            //start mission
    }



    public function create(Request $request)
    {
        return view('admin.pages.orders.create');
    }


    public function store(OrderStoreRequest $request)
    {
        Order::create($request->validated());

        return response()->noContent();
    }


    public function show(Request $request, $id)
    {
        $order = Order::find($id);
        return view('admin.pages.orders.show', compact('order'));
    }


    public function edit(Request $request, $id)
    {
        $order = Order::find($id);
        return view('admin.pages.orders.update', compact('order'));
    }


    public function update(OrderUpdateRequest $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->validated());

        return response()->noContent();
    }


    public function destroy(Request $request, $id)
    {
        Order::find($id)->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {
        Order::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }
}
