<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
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
}
