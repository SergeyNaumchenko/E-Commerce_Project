<?php namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use App\Product;

abstract class Controller extends BaseController {

    public function __construct() {
        $this->beforeFilter(function() {
            View::share('catnav', Category::all());
            View::share('products', Product::all());
        });
    }

	use DispatchesCommands, ValidatesRequests;

}
