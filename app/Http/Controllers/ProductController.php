<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index() {
        $products = Product::all();
        return view('products.index')->with(array('products' => $products, 'cart' => $this->cart ?? array()));
    }

    public function create() {
        return view('products.form')->with(array('cart' => $this->cart ?? array()));
    }

    public function update($id) {
        $product = Product::find($id);
        return view('products.form')->with(array('product' => $product, 'cart' => $this->cart ?? array()));
    }

    public function saveProduct(Request $request, $id = null) {
        $request->validate([
            'name' => 'required|max:100|min:2',
            'price' => 'required',
            'description' => 'max:1000'
        ]);
        $status = null;
        $data = $request->only('name', 'price', 'description');
        if ($id > 0 && $product = Product::find($id)) {
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $status = $product->save();
        } else {
            $status = Product::create($data);
        }
        
        if ($status) {
            return redirect('products')->withSuccess('product saved');
        }

        return redirect('product');
    }


    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('products');
    }


    public function viewProduct($id) {
        $product = Product::find($id);

        return view('products.view')->with(array('product' => $product));
    }
}
