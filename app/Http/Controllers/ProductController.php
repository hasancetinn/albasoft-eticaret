<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class ProductController extends Controller
{
    public function index(){

        return view('product');
    }

    public function fetch(){

        $products = Product::with('category')->get();

        return datatables($products)->make(true);
    }

    public function fetchCategories(){

        $categories = Category::all();


        return success($categories);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function add(Request $request)
    {
        $this->validate(request(), [
            'product_name' => 'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required',
            'category_id'=>'required',
        ]);

        if($request->get('image'))
        {
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Intervention\Image\Facades\Image::make($request->get('image'))->save(public_path('uploads/urunler/').$name);
        }

        $product = new Product();

        $product->product_name = $request->get('product_name');
        $product->slug = $request->get('slug');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->picture = $name;
        $product->category_id = 2;
        $product->save();

        return success();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $this->validate(request(), [
            'product_name' => 'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required',
            'category_id'=>'required',
        ]);



        if($request->get('image'))
        {
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('image'))->save(public_path('uploads/urunler/').$name);
        }

        $product = Product::find($request->get('id'));
        $product->product_name = $request->get('product_name');
        $product->slug = $request->get('slug');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->picture = $name;
        $product->category_id = 1;
        $product->save();

        return success();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $category = Product::where('id', $request->v_id);
        $category->delete();

        return success();
    }
}
