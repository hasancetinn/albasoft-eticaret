<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index($slug){

        $products = Product::where('deleted_at', null)->where('slug',$slug)->firstOrFail();

        return view('product-list', compact('products'));
    }
}
