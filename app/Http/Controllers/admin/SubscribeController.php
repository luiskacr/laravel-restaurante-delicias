<?php

namespace App\Http\Controllers\admin;

use App\Exports\SubscribeExport;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubscribeController extends Controller
{
    /**
     * Display a Subscribe View index
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.subscribe.index')
            ->with('subscribes', Subscribe::all());
    }

    /**
     * Allow to User to download an Excel Subscribe information.
     *
     * @return BinaryFileResponse
     */
    public function export():BinaryFileResponse
    {
        return Excel::download(new SubscribeExport, 'Subcripciones.xlsx');
    }
}
