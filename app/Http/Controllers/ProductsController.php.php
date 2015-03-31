<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Validator;
use App\Category;

class ProductsController extends Controller {

    public function __construct() {

        $this->middleware('auth');
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function getIndex() {

        $categories = [];

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }

        return view('products.index')->with('products', Product::all())
                                     ->with('categories', $categories);
    }

    public function postDestroy(Request $request) {

        $product = Product::find($request->get('id'));

        if ($product) {
            File::delete('public/'.$product->name);
            $product->delete();
        }

        return redirect('admin/products/index');
    }


    public function postCreate(Request $request) {

        $validator = Validator::make($request->all(), Product::$rules);

        if ($validator->passes()) {
            $product = new Product;
            $product->category_id = $request->get('category_id');
            $product->title = $request->get('description');
            $product->price = $request->get('price');
            $image = $request::file('image');
            $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(468, 249)->save('public/img/products/'.$filename);
            $product->image = 'img/products/'.$filename;
            $product->save();
        }

        return redirect('admin/products/index')->withErrors($validator);
    }


    public function postToggleAvailability(Request $request) {
        $product = Product::find($request->get('id'));

        if($product) {
            $product->availability = $request->get('availavility');
            $product->save();
            return redirect('admin/products/index');
        }

        return redirect('admin/products/index');
    }

}
