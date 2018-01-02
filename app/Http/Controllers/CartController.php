<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function update()
    {
        $client = auth()->user();
        $cart = $client->cart;
        $cart->status = "Pending";
        $cart->order_date = Carbon::now();
        $cart->save(); // update

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder($client, $cart));

        $notification = "Tu orden ha sido registrada. Se te contactará vía email";
        return back()->with(compact("notification"));
    }
}
