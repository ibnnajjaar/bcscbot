<?php

namespace App\Http\Controllers;

use App\Actions\CountStuff;
use Illuminate\Http\Request;

class AssessmentsController extends Controller
{

    public function index(Request $request)
    {
        return view('web.assessments.index');
    }
}
