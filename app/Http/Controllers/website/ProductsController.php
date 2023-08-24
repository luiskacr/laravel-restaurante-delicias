<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductsController extends Controller
{
    /**
     * Display a Products/Menu view
     *
     * @return View
     */
    public function index():View
    {

        return view('website.products')
            ->with('products', Product::all())
            ->with('categories', Category::all());
    }

    /**
     * Display a specific Product View
     *
     * @param int $id
     * @return View
     */
    public function show(int $id):View
    {
        $product = Product::findOrFail($id);

        return view('website.product')
            ->with('product',$product )
            ->with('relates', Product::where('category', '=', $product->category)->where('id' ,'!=' , $product->id)->take(4)->get());
    }
}
