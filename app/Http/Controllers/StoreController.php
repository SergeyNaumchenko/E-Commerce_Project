<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;

class StoreController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('store.index')->with('products', Product::take(4)
            ->orderBy('created_at', 'DESC')->paginate(4));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, Product $product)
	{
        $product = $product->find($id);

		return view('store.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * Display products by specified category.
     *
     * @param  int  $id
     * @return Response
     */
    public function getCategory($cat_id) {

        return view('store.index')->with('products', Product::where('category_id', '=', $cat_id)->paginate(4))
                                     ->with('category', Category::find($cat_id));
    }


    public function search(Request $request) {

        $q = $request->get('q');

        return view('store.search')->with('products', Product::where('title', 'LIKE', '%'.$q.'%')->get())
                                   ->with('keyword', $q);
    }
    
}
