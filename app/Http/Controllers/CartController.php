<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function store(Request $request)
    {
       Cart::create([
        "user_id"=>auth()->user()->id,
        "pizza_id"=>$request->pizza_id,
       ]);
       
       return back();
    }

    public function index()
    {

        return view("karta", [
            "carts"=>Cart::all()
        ]);
    }
}
