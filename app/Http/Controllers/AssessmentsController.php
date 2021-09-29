<?php

namespace App\Http\Controllers;

use App\Actions\CountStuff;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentsController extends Controller
{

    public function index(Request $request)
    {
        $subject_assessments = Assessment::query()
            ->orderBy('assessment_at')
            ->with('subject')
            ->get()
            ->groupBy('subject_id','type');

        return view('web.assessments.index', compact('subject_assessments'));
    }
}
