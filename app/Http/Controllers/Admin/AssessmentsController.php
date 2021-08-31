<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AssessmentTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssessmentsRequest;
use App\Models\Assessment;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AssessmentsController extends Controller
{
    public function index(Request $request)
    {
        $assessments = Assessment::all();
        return view('admin.assessments.index', compact('assessments'));
    }

    public function create(Request $request)
    {
        $assessment = new Assessment();
        $subjects = Subject::all();
        $assessment_types = AssessmentTypes::toLabels();
        return view('admin.assessments.create', compact('assessment', 'subjects', 'assessment_types'));
    }

    public function edit(Assessment $assessment, Request $request)
    {
        $subjects = Subject::all();
        $assessment_types = AssessmentTypes::toLabels();
        return view('admin.assessments.edit', compact('assessment', 'subjects', 'assessment_types'));
    }

    public function store(AssessmentsRequest $assessmentsRequest): RedirectResponse
    {
        $assessment = new Assessment();
        $assessment->fill($assessmentsRequest->all());
        $assessment->subject()->associate($assessmentsRequest->subject());
        $assessment->save();

        return redirect()->to(route('admin.assessments.edit', $assessment));
    }

    public function update(Assessment $assessment, AssessmentsRequest $assessmentsRequest): RedirectResponse
    {
        $assessment->update($assessmentsRequest->all());

        if ($assessmentsRequest->subject()) {
            $assessment->subject()->associate($assessmentsRequest->subject());
        }

        $assessment->save();

        return redirect()->to(route('admin.assessments.edit', $assessment));
    }

    public function destroy(Assessment $assessment, Request $request)
    {
        if (! $assessment->delete()) {
            if ($request->expectsJson()) {
                abort(404);
            }
        }

        if ($request->expectsJson()) {
            return true;
        }

        return view('admin.assessments.index');
    }
}
