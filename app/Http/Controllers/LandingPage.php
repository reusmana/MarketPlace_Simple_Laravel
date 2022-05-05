<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class LandingPage extends Controller
{
    //
    public function index(){
        $products = Product::take(3)->get();
        return view ('welcome', compact('products'));
    }
}
