<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Http\Request;
use Auth;
use Laracasts\Flash\Flash;
use Cart;
use App\WishList;
class SavedCartsController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::id()) {
            $saved_carts = DB::table('wish_lists')
                ->select('cart_id', 'updated_at', 'qty_of_items')
                ->where('user_id', Auth::id())
                ->distinct()
                ->get();

            return view('store.saved_carts', compact('saved_carts'));
        }

        else {
            return view('auth.login');
        }
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
        $content = Cart::content();

        if ($content && Auth::id()) {

            $cart_id = 'SC' . rand(1000000000, 9999999999);

            foreach ($content as $product) {

                DB::table('wish_lists')->insert([

                    'cart_id'      => $cart_id,
                    'user_id'      => Auth::id(),
                    'product_id'   => $product->id,
                    'qty'          => $product->qty,
                    'created_at'   => date('Y-m-d-H:i:s'),
                    'updated_at'   => date('Y-m-d-H:i:s'),
                    'total'        => Cart::total(),
                    'qty_of_items' => Cart::count()
                ]);
            }
            Cart::destroy();
            return redirect()->route('store.cart.saved_carts.index');
        }

        else {
            Flash::error('Please Login to save or to view saved cart!');
            return redirect()->to('store/cart');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cart_id)
	{
        $carts = WishList::all()->where('cart_id', $cart_id)
                                ->where('user_id', Auth::id());

        return view('store.saved_cart', compact('carts'));
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
	public function destroy($cart_id)
	{
        $records = WishList::all()->where('cart_id', $cart_id)
                                  ->where('user_id', Auth::id());

        foreach ($records as $record) {
            WishList::find($record->id)->delete();
        }

        return redirect()->to('store/cart/saved_carts');
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_item($id)
    {
        WishList::find($id)->delete();

        return redirect()->to('store/cart/saved_carts');
    }
}
