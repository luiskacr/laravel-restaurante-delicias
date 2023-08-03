<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a Home View
     *
     * @return View
     */
    public function show():View
    {
        return view('admin.home');
    }
}
