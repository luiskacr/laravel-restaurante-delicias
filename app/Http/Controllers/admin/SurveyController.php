<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.survey.index')->with('surveys', Survey::all());
    }

    /**
     * Display a specifict Survey
     *
     * @return View
     */
    public function show(int $id):View
    {
        return view('admin.survey.show')->with('survey', Survey::findOrFail($id));
    }

}
