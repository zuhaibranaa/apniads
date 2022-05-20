<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\cart;
use App\Models\Ad;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::all()->where('user_id','=',auth()->user()->id);
        return view('livewire.dashboard-orders')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $request)
    {
        $cartItems = cart::all()->where('user_id','=',auth()->user()->id);
        $orderItem = [];
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            array_push($orderItem,$cartItem['item_id']);
            array_push($totalPrice,Ad::find($cartItem['item_id'])['price']);
        }

        $order = new order();
        $order['user_id'] = auth()->user()->id;
        $order['item_ids'] = $orderItem;
        $order['total_price'] = $totalPrice;
        $order['order_date'] = now();
        $order['status'] = false;
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
