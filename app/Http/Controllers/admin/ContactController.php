<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.contacts.index')
            ->with('contacts', Contact::all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id):View
    {
        return view('admin.contacts.show')
            ->with('contact', Contact::findOrFail($id) );
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
            $contact = Contact::findOrFail($id);
            $contact->delete();

            DB::commit();
        }catch (\Exception $e){
            DB::rollback();

            return response(['message' => $e->getMessage()], 500);;
        }
        return response(['message' => 'ok'], 200);
    }
}
