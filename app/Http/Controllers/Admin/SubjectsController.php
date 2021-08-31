<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectsRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController
{
    public function index(Request $request)
    {
        $subjects = Subject::all();

        $request->session()->flash('flash.banner', 'Yay it works!');
        $request->session()->flash('flash.bannerStyle', 'success');

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create(Request $request)
    {
        $subject = new Subject();
        return view('admin.subjects.create', compact('subject'));
    }

    public function edit(Subject $subject, Request $request)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function store(SubjectsRequest $subjectsRequest)
    {
        $subject = new Subject();
        $subject->fill($subjectsRequest->all());
        $subject->save();

        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Subject $subject, SubjectsRequest $subjectsRequest)
    {
        $subject->update($subjectsRequest->all());

        return view('admin.subjects.edit', compact('subject'));
    }

    public function destroy(Subject $subject, Request $request)
    {
        if (! $subject->delete()) {
            if ($request->expectsJson()) {
                return abort(403);
            }
        }

        if ($request->expectsJson()) {
            return true;
        }

        return view('admin.subjects.index');
    }

}
