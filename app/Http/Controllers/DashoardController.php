<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class DashoardController extends BaseController
{
    public function index()
    {
        if(Auth::check()){
            return view('dashboard')->with(array('cart' => $this->cart ?? array()));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function orders() {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $orderData = array();
        foreach ($orders as $key => $value) {
            $orderData[$key] = $value;
            $orderData[$key]['itemCount'] = OrderItem::where('order_id', $value->id)->count();
        }
        // print_r($orderData); exit;
        return view('orders')->with(array('orders' => $orderData));
    }
}
