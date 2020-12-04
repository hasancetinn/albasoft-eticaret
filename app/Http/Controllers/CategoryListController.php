<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryListController extends Controller
{
    public function index($slug){

        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)->get();


        return view('category-list', compact('category', 'products'));
    }
}
