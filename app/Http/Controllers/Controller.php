<?php namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;

abstract class Controller extends BaseController {

    public function __construct() {
        $this->beforeFilter(function() {
            View::share('catnav', Category::all());
        });
    }

	use DispatchesCommands, ValidatesRequests;

}
