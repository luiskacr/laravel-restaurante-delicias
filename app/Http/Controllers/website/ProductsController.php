<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('website.products')->with('products', $products);
    }

    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return view('website.product')
            ->with('product',$product )
            ->with('relates', Product::where('category', '=', $product->category)->where('id' ,'!=' , $product->id)->take(4)->get());
    }
}
