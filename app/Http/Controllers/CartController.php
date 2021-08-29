<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    public function index() {
        return view('cart.index')->with(array('cart' => $this->cart ?? array()));
    }

    public function add($id, $remove = false) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if ($remove && $cart[$id]['qty'] == 1) {
            $this->remove($id);
            return redirect()->back()->withSuccess('Added.');
        }
        if ($product && isset($cart[$id])) {
            if ($remove) {
                $cart[$id]['qty']--;
            } else {
                $cart[$id]['qty']++;
            }
            
        } else {
            $cart[$id] = [
                'id' => $id,
                'qty' => 1,
                'name' => $product->name,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->withSuccess('Added.');
    }

    public function update(Request $request) {
        if ($request->id && $request->qty) {
            $cart = session()->get('cart');
            $cart[$request->id]['qty'] = $request->qty;
            session()->put('cart', $cart);
            return redirect()->back()->withSuccess('Updated cart');
        }
    }

    public function remove($id) {
        $cart = session()->get('cart');
        if ($id && isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->withSuccess('Removed.');
    }

    public function checkout() {
        return view('cart.checkout')->with(array('cart' => $this->cart ?? array()));
    }

    private function getCartSum() {
        $sum = 0;
        foreach ($this->cart as $key => $value) {
            $sum += $value['price'] * $value['qty'];
        }
        return $sum;
    }

    public function placeOrder() {
        if (!Auth::check()) {
            return redirect()->route('login',['path'=> 'cart.checkout']);
        }

        $user = Auth::user();

        $data = array(
            'user_id' => $user->id,
            'order_total' => $this->getCartSum(),
            'order_notes' => '',
        );
        $order = Order::create($data);
        $itemAdded = false;
        if ($order) {
            foreach ($this->cart as $key => $item) {
                $itemAdded = OrderItem::create(array(
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'qty' => $item['qty'],
                    'price' => $item['price']
                ));
            }
        }

        if ($order && $itemAdded) {
            session()->put('cart', array());
        }

        return redirect('orders')->withSuccess('order created.');
    }

}
