<?php

namespace App\Http\Controllers\admin;

use App\Exports\SubscribeExport;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubscribeController extends Controller
{
    public function index()
    {
        return view('admin.subscribe.index')
            ->with('subscribes', Subscribe::all());
    }

    public function export()
    {
        return Excel::download(new SubscribeExport, 'Subcripciones.xlsx');
    }
}
