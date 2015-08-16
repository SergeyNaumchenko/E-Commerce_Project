<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use Image;
use View;
use Auth;
use App\User;

class ProductsController extends Controller {


    /**
     * Only authenticated users may enter.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::user()->is_admin()) {

            $categories = [];

            foreach(Category::all() as $category){
                $categories[$category->id] = $category->name;
            }

            return view('products.products_table')->with('products', Product::all())
                                                  ->with('categories', $categories);
        }

        else {
            return view('store.sections.access_denied');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return redirect()->route('products.index');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProductRequest $request, Product $product)
	{
        $product->category_id = $request->get('category_id');
        $product->title       = $request->get('title');
        $product->description = $request->get('description');
        $product->price       = $request->get('price');
        $product->quantity    = $request->get('quantity');

        $image = $request->file('image');
        $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();

        Image::make($image->getRealPath())->resize(468, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save('img/products/' . $filename);

        $product->image = 'img/products/'.$filename;
        $product->save();

        return redirect()->route('admin.index');
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
	public function update(Request $request, $id)
	{
        $product = Product::find($request->get('id'));

        if($product) {
            $product->availability = $request->get('availability');
            $product->save();
        }

        return redirect()->route('admin.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
        $product = Product::find($request->get('id'));

        if ($product) {
            unlink($product->image);
            $product->delete();
        }

        return redirect()->route('admin.index');
	}

    public function getCreateView()
    {
        $categories = [];

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }

        return view('products.create_product')->with('products', Product::all())
            ->with('categories', $categories);
    }


    public function getHomeView()
    {
        return view('products.home');
    }

}
