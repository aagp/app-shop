<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = "Pending";
        $cart->save(); // update

        $notification = "Tu orden ha sido registrada. Se te contactará vía email";
        return back()->with(compact("notification"));
    }
}
