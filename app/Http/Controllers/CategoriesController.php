<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;
use Validator;
use App\Category;
use Input;
use Redirect;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getIndex()
    {

        return View::make('categories.index')->with('categories', Category::all());
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), Category::$rules);

        if ($validator->passes()) {
            $category = new Category;

            $category->name = Input::get('name');
            $category->save();

            return Redirect::to('admin/categories/index')->with('message', 'Category Created');
        }

        return Redirect::to('admin/categories/index')->with('message', 'Oh Snap! Something went wrong')
            ->withErrors($validator)->withInput();
    }

    public function postDestroy()
    {
        $category = Category::find(Input::get('id'));

        if ($category) {
            $category->delete();
            return Redirect::to('admin/categories/index')
                ->with('message', 'Whoops! Something went wrong, please try again');
        }
    }

}
