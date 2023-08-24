<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the Home View
     *
     * @return View
     */
    public function index():View
    {
        return view('website.index');
    }

}
