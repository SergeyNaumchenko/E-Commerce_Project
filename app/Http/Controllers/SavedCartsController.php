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
            $saved_carts = WishList::select('cart_id', 'updated_at', 'qty_of_items')
                ->where('user_id', Auth::id())
                ->groupBy('cart_id')
                ->get();

            return view('store.saved_carts', compact('saved_carts'));
        }
        else return view('auth.login');
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

        return view('store.saved_cart', compact('carts'))->with('cart', $cart_id);
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
	public function update($id, Request $request)
	{
        $qty = $request->get('qty');

        $wishlist = WishList::find($id);
        $wishlist->qty = $qty;
        $wishlist->save();

        if($request->ajax()) return $qty;

        return redirect()->to('store/cart/saved_carts/' . $id);
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
        $wishlist = WishList::find($id);
        $wishlist->delete();
        return redirect()->to('store/cart/saved_carts/' . $wishlist->cart_id);
    }


    /**
     * Add All to The Cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function addAllToCart($cart_id)
    {
        $wishList = WishList::all()->where('cart_id', $cart_id);

        foreach($wishList as $cart) {

            Cart::add($cart->product->id, $cart->product->title, $cart->qty, $cart->product->price, [

                'image'        => $cart->product->image,
                'description'  => $cart->product->description,
                'availability' => $cart->product->availability
            ]);
        }

        return redirect()->to('store/cart');
    }
}
