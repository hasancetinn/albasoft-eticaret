<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return view('category');
    }

    public function fetch(){

        $categories = Category::all();

        return datatables($categories)->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function add(Request $request)
    {
        $this->validate(request(), [
            'category_name' => 'required',
            'slug'=>'required',
        ]);

        $category = new Category();

        $category->category_name = $request->get('category_name');
        $category->slug = $request->get('slug');
        $category->save();

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
            'category_name' => 'required',
            'slug'=>'required',
        ]);

        $category = Category::find($request->get('id'));
        $category->category_name = $request->get('category_name');
        $category->slug = $request->get('slug');

        $category->save();

        return success();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $category = Category::where('id', $request->v_id);
        $category->delete();

        return success();
    }
}
