<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.products.index')
            ->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('admin.products.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request):RedirectResponse
    {
        DB::beginTransaction();
        try{

            Product::create([
                'name'=>$request->request->get('name'),
                'description'=>$request->request->get('description'),
                'price'=>$request->request->getInt('price'),
                'category' => $request->request->getInt('category'),
                'image'=> $this->handleCreateImage($request)
            ]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return redirect()->route('products.create');
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id):View
    {
        return view('admin.products.show')
            ->with('product', Product::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id):View
    {
        return view('admin.products.edit')
            ->with('product', Product::findOrFail($id) )
            ->with('categories', Category::all() );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductRequest $request,int $id):RedirectResponse
    {
        DB::beginTransaction();
        try{
            $product = Product::findOrFail($id);
            $product->update([
                'name'=>$request->request->get('name'),
                'description'=>$request->request->get('description'),
                'price'=>$request->request->getInt('price'),
                'category' => $request->request->getInt('category'),
                'image'=> $this->handleUpdateImage($product->image , $request)
            ]);

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            toastr()->error($e->getMessage(), 'Error');

            return redirect()->route('products.edit', $id);
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        DB::beginTransaction();
        try{
            $product = Product::findOrFail($id);

            $this->handleDeleteImage(public_path($product->image));

            $product->delete();

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return response(['message' => $e->getMessage()], 500);;
        }
        return response(['message' => 'ok'], 200);
    }

    /**
     * @param string|null $oldImage
     * @param Request $request
     * @return string|null
     */
    private function handleUpdateImage(string|null $oldImage, Request $request):string|null
    {
        $oldImage != null
            ? $this->handleDeleteImage($oldImage)
            : '';

        return $this->handleCreateImage($request);
    }

    /**
     * Validate if the Request Have an image an storage
     *
     * @param Request $request
     * @return string|null
     */
    private function handleCreateImage(Request $request):string|null
    {
        if($request->hasFile('image')){

            $file = $request->file('image');
            $destinationPath = 'img/products/';
            $filename = time() . strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $request->get('name'))).'.'. $file->extension();
            $uploadSuccess = $request->file('image')->move($destinationPath,$filename);

            return $destinationPath . $filename;
        }else{
            return null;
        }
    }

    /**
     * Delete the Image if Exists
     *
     * @param string $imagePath
     * @return void
     */
    private function handleDeleteImage(string $imagePath): void
    {
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
