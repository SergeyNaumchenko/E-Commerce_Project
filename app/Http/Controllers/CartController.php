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

        if($request->ajax()) return $qty;

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

    /**
     * Save the cart.
     *
     * @return Response
     */
    public function saveCart()
    {
        $content = Cart::content();

        if ($content && Auth::id()) {

            $cart_id = 'SC' . rand(0, 9999999999);

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

            $saved_carts = DB::table('wish_lists')
                                ->select('cart_id', 'updated_at', 'qty_of_items')
                                ->where('user_id', Auth::id())
                                ->distinct()
                                ->get();

            return view('store/saved_carts', compact('saved_carts'));
        }

        else {
            Flash::error('Please Login to save or to view saved cart!');
            return redirect()->to('store/cart');
        }
    }

}
