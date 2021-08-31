<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Weekdays;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeriodsRequest;
use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;

class PeriodsController
{
    public function index(Request $request)
    {
        $periods = Period::all();
        return view('admin.periods.index', compact('periods'));
    }

    public function create(Request $request)
    {
        $period = new Period();
        $subjects = Subject::all();
        $weekdays = Weekdays::toLabels();
        return view('admin.periods.create', compact('period', 'subjects', 'weekdays'));
    }

    public function edit(Period $period, Request $request)
    {
        $subjects = Subject::all();
        $weekdays = Weekdays::toLabels();
        return view('admin.periods.edit', compact('period', 'subjects', 'weekdays'));
    }

    public function store(PeriodsRequest $periodsRequest)
    {
        $period = new Period();
        $period->fill($periodsRequest->all());
        $period->start_at = $periodsRequest->startAt();
        $period->end_at = $periodsRequest->endAt();
        $period->subject()->associate($periodsRequest->subject());
        $period->save();

        return redirect()->to(route('admin.periods.edit', $period));
    }

    public function update(Period $period, PeriodsRequest $periodsRequest)
    {
        $period->details = $periodsRequest->input('details');
        $period->weekday = $periodsRequest->input('weekday');
        $period->start_at = $periodsRequest->startAt();
        $period->end_at = $periodsRequest->endAt();

        if ($periodsRequest->subject()) {
            $period->subject()->associate($periodsRequest->subject());
        }

        $period->save();

        return redirect()->to(route('admin.periods.edit', $period));
    }

    public function destroy(Period $period, Request $request)
    {
        if (! $period->delete()) {
            if ($request->expectsJson()) {
                abort(404);
            }
        }

        if ($request->expectsJson()) {
            return true;
        }

        return view('admin.periods.index');
    }
}
