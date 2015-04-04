<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Category;
Use App\Http\Requests\CreateCategoryRequest;


class CategoriesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function getIndex() {
        return view('categories.index')->with('categories', Category::all());
    }

    public function postDestroy(Request $request) {

        $category = Category::find($request->get('id'));

        if ($category) {
            $category->delete();
        }

        return redirect('admin/categories/index');
    }


    public function postCreate(CreateCategoryRequest $request, Category $category) {

            $category->name = $request->input('name');
            $category->save();

            return redirect('admin/categories/index');
    }

}
