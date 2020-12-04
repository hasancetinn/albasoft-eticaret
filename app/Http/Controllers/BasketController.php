<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
    {
        $products = Basket::with('product')->get();

        return view('basket', compact('products'));
    }

    public function add(Request $request)
    {

        $product = Product::find(\request('id'));

        $cart = new Basket();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $product->id;
        $cart->price = $product->price;
        $cart->number = 1;
        $cart->save();

        return redirect()->route('basket');
    }

    static function cartItem(){


        $user_id = Auth::user()->id;

        $total = Basket::where('user_id', $user_id)->count();

        return $total;
    }

    public function delete(Request $request){

        Basket::destroy($request->id);

        return redirect()->route('basket');
    }
}
