<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BaseController extends Controller
{
    public $cart;
    public $cartTotal;
    public function __construct(Request $request) {
        $this->cart = session()->get('cart', []);
    }
     
}
