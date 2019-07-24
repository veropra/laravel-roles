<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::all();
      return view('products.index', compact('products'));
    }

    public function create()
    {
      return view('products.create');
    }

    public function store(Request $request)
    {
        $dati = $request->all();
        $new_product = new Product();
        $new_product->fill($dati);
        $new_product->save();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
