<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Cart;
use DB;
use Laracasts\Flash\Flash;


class CartController extends Controller {

    private $DEFAULT_QTY = 1;

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Cart::content();
        return view('store.cart', compact('products'))->with('total', Cart::total());
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
        $product = Product::find(Input::get('id'));

        Cart::add($product->id, $product->title, $this->DEFAULT_QTY, $product->price, [

            'image'        =>$product->image,
            'description'  =>$product->description,
            'availability' =>$product->availability
        ]);

        return redirect()->to('store/cart');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function update($rowid, Request $request)
	{
        $qty = $request->get('qty');
        Cart::update($rowid, $qty);
        $row = Cart::get($rowid);
        $results = ['rowid' => $row->rowid, 'subtotal' => $row->subtotal, 'total' => Cart::total()];

        if($request->ajax()) return $results;

		return redirect()->to('store/cart');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($rowid)
	{
        Cart::remove($rowid);

        return redirect()->to('store/cart');
	}

    /**
     * Empty the cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function clearCart()
    {
        Cart::destroy();

        return redirect()->to('store/cart');
    }



}
