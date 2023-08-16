<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.categories.index')
            ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request):RedirectResponse
    {
        DB::beginTransaction();
        try{
            Category::create([
                'name'=>$request->request->get('name'),
            ]);
            DB::commit();

        }catch (\Exception $e){
            DB::rollback();

            toastr()->error('Hubo un error Interno al crear la Categoria', 'Error');

            return redirect()->route('categories.create');
        }
        toastr()->success('Se ha creado la Categoria correctamente','Exito!');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id):View
    {
        return view('admin.categories.show')
            ->with('category', Category::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id):View
    {
        return view('admin.categories.edit')
            ->with('category', Category::findOrFail($id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request,int $id):RedirectResponse
    {
        DB::beginTransaction();
        try{

            Category::whereId($id)->update([
                'name'=>$request->request->get('name'),
            ]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            toastr()->error('Hubo un error Interno al modificar la Categoria', 'Error');

            return redirect()->route('categories.edit', $id);
        }
        toastr()->success('Se ha Modificado la Categoria correctamente','Exito!');

        return redirect()->route('categories.index');
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
            $category = Category::findOrFail($id);
            $category->delete();

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            if ($e->getCode() === '23000') {

                toastr()->error('No se puede eliminar la categoría debido a restricciones de integridad','Error!');

                return response(['message' => $e->getMessage()], 422);
            }

            toastr()->error('Ha ocurrido un error interno al intentar eliminar','Error!');

            return response(['message' => $e->getMessage()], 500);;
        }
        return response(['message' => 'ok'], 200);
    }
}
