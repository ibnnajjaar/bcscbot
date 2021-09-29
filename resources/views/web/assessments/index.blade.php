@extends('layouts.web')


@section('content')
    <div class="flex flex-row items-center mt-8 mx-4">
        <a href="{{ route('home') }}" class="flex flex-row bg-blue-500 rounded-md px-4 py-2">
            <svg class="stroke-current text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span class="mx-2 inline-block text-white">
                {{ __("Home") }}
            </span>
        </a>
    </div>
    @include('web.assessments._welcome')


    @foreach ($subject_assessments as $subject_id => $type_assessments)
        <div class="px-4">
            <div class="text-gray-welcome font-medium mt-4">{{ strtoupper(App\Models\Subject::find($subject_id)->name) }}</div>

        @foreach ($type_assessments as $type => $assessment)
            <div class="bg-gray-light p-4 rounded-lg mt-2">
                <div class="flex flex-row justify-between items-center text-xs">
                    <div class="flex flex-row text-blue-light">
                        <div>{{ $assessment->formatted_assessment_at }}</div>
                    </div>
                    <div class="text-blue-light">
                        Total: {{ $assessment->total_marks }} | Weight: {{ $assessment->weight }}
                    </div>
                </div>
                <div class="mt-2 font-medium">
                    {{ $assessment->name }}
                </div>
                <div class="mt-2">
                    {{ $assessment->description }}
                </div>
                <div class="bg-red-300 inline-block px-4 py-2 rounded-md text-white text-xs">{{ $assessment->formatted_type }}</div>
            </div>
        @endforeach
        </div>
    @endforeach
@endsection
