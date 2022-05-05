<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Product;


class Shop extends Controller
{
    //
    public function index(Request $request, $id = null){
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', '%', $request->search, '%' )->paginate(6);
        return view ('shop.index-shop', compact('products', 'categories', 'id'));
    }


    public function category($id){
        $categories = Category::all();
        $products = Product::where('category_id', $id)->paginate(6);
        return view ('shop.index-shop',  compact('products', 'categories', 'id'));
    }

    public function showDetail($id){
        $product = Product::findOrFail($id);
        return view ('shop.show', compact('product'));
    }
}
