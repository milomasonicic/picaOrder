<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        $onGoingOrder = Order::where('user_id', auth()->user()->id)->where('status', 'pending')->first();

        if(!$onGoingOrder) {
            $onGoingOrder = Order::create([
                'total' => 0,
                'user_id' => auth()->user()->id,
            ]);
        }

        $alredyExistingCart = Cart::where('pizza_id', $request->pizza_id)->where('order_id', $onGoingOrder->id)->first();

        if($alredyExistingCart) {
            $alredyExistingCart->qty += $request->qty;
            $alredyExistingCart->save();
        } else {
            $cart = Cart::create([
                'pizza_id' => $request->pizza_id,
                'qty' => (int) $request->qty,
                'order_id' => $onGoingOrder->id
            ]);
        }

        $total = 0;
        foreach ($onGoingOrder->carts as $cart) {
                $price = $cart->qty * $cart->pizza->price;
                $total += $price;
        }

        $onGoingOrder->total = $total;

        $onGoingOrder->save();

        return redirect()->route('allpizza');
    }

    public function show()
    {
        $order = Order::where('user_id', auth()->user()->id)->where('status', 'pending')->first();

        $carts = $order->carts;

        /*compact('order', ' carts');*/
        return view('carts.index', ['order' => $order, 'carts' => $carts]);
    }
}
