<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutMail;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(){
        $carts = Cart::where('user_id', Auth::user()->id); //looping cart, dan masukan ke tabel transctaion detail

        $cartUser = $carts->get();
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);

        foreach($cartUser as $cart){
            $transaction->detail()->create([ //cara memakai relationship insert
                'product_id' => $cart->product_id,
                'qty' => $cart->qty
            ]);
        }

        Mail::to($carts->first()->user->email)->send(new CheckoutMail($cartUser)); //cartuser isi dari cartnya dimasukan kedalam template mailnya

        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect('/home');
    }
}
