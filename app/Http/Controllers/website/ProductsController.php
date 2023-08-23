<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {

        return view('website.products')
            ->with('products', Product::all())
            ->with('categories', Category::all());
    }

    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return view('website.product')
            ->with('product',$product )
            ->with('relates', Product::where('category', '=', $product->category)->where('id' ,'!=' , $product->id)->take(4)->get());
    }
}
