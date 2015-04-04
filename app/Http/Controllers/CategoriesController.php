<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Category;

class CategoriesController extends Controller {

    public function __construct() {

        $this->middleware('auth');
        $this->beforeFilter('csrf', ['on' => 'post']);
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


    public function postCreate(Request $request) {

        $validator = Validator::make($request->all(), Category::$rules);

        if ($validator->passes()) {
            $category = new Category;

            $category->name = $request->input('name');
            $category->save();
            return redirect('admin/categories/index');
        }

        return redirect('admin/categories/index')->withErrors($validator)->withInput();
    }

}
