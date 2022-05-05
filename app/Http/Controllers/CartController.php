<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.index-cart', compact('carts'));

    }

    public function store(Request $request){


        $duplicatess = Cart::where('product_id', $request->item_id)->first();

        if($duplicatess){
            return redirect('/index-cart')->with('error', 'barang sudah ada dicart');
        }else{
            Cart::create([ //() mapping
                'user_id' => Auth::user()->id,
                'product_id' => $request->item_id,
                'qty' => 1
            ]);
    
            return redirect('/index-cart')->with('success', 'succes menambah barang');

        }

    }

    public function update(Request $request, $id){
        Cart::where('id', $id)->update([
            'qty'=>$request->quantity
        ]);
        return response()->json([
            'success'=>true
        ]);
    }
}
