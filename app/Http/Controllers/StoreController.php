<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use View;
use Gloudemans\Shoppingcart\Cart as Cart2;

class StoreController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('store.index')->with('products', Product::take(4)
            ->orderBy('created_at', 'DESC')->get());
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

        return view('store.category')->with('products', Product::where('category_id', '=', $cat_id)->paginate(6))
                                     ->with('category', Category::find($cat_id));
    }


    public function search(Request $request) {

        $q = $request->get('q');

        return view('store.search')->with('products', Product::where('title', 'LIKE', '%'.$q.'%')->get())
                                   ->with('keyword', $q);
    }

    /**
     * Add a row to the cart
     *
     * @param string|Array $id      Unique ID of the item|Item formated as array|Array of items
     * @param string       $name    Name of the item
     * @param int          $qty     Item qty to add to the cart
     * @param float        $price   Price of one item
     */
    public function addToCart() {

        $product = Product::find(Input::get('id'));
        $defaultQty = 1;

        Cart::add(array(

            'id'      =>$product->id,
            'name'    =>$product->title,
            'price'   =>$product->price,
            'qty'     =>$defaultQty,
            'image'   =>$product->image
        ));

        return Redirect::to('store/cart');
    }

    /**
     * Get the cart content
     *
     * @return CartCollection
     */
    public function getCart() {

        $products = Cart::content();

        return View::make('store.cart', compact('products'));
    }

    public function deleteFromCart($rowid) {

        Cart::remove($rowid);

        return Redirect::to('store/cart');
    }

}
