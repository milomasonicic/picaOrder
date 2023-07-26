<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //

   public function index(){
    return view("allpizza", [
        "pizzas"=>Pizza::all()
    ]);
   }

   public function show($id){

    return view("pica", [
        "pizza"=>Pizza::find($id)
    ]);
   }
}
