<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        //Get all the products
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function store(Request $request) {
        //Create a product with the model
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return response()->json(compact('product'), 200);
    }

    public function show($id) {
        //Get the product by id and their warehouse
        $product = Product::find($id);
        $product->warehouse = $product->warehouse;

        return response()->json(compact('product'), 200);
    }

    public function update($id, Request $request) {
        //update a product with the model
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();

        return response()->json(compact('product'), 200);
    }
}
