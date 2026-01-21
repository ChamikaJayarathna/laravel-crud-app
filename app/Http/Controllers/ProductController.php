<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // view all products (read)
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    // create  product feature
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,5',
            'description' => 'required|nullable'
        ]);

        Product::create($data);
        return redirect()->route('products.index');
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    // update product
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,5',
            'description' => 'required|nullable'
        ]);

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product update successfully');
    }

    // delete product
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
