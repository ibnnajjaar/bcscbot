<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function __invoke(Request $request)
    {
        $subjects = Subject::count();
        $periods = Period::count();
        $assessments = Assessment::count();

        return view('dashboard', compact('subjects', 'periods', 'assessments'));
    }
}
