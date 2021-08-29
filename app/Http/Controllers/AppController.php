<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Product;

class AppController extends BaseController
{
    //
    public function index() {
        $products = Product::all();
        return view('home')->with(array('products' => $products, 'cart' => $this->cart ?? array()));
    }
}
