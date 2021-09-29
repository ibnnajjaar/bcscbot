<a href="{{ route('assessments.index') }}" class="block text-gray-lightest bg-green-500 rounded-lg p-4 m-4 mt-8 relative">
    <div class="font-medium flex flex-row justify-between">
        <span class="flex-nonw">{{ __("TUTORIALS") }}</span>
        <span class="mx-2 flex-auto border-b-2 border-dotted border-white h-4"></span>
        <span class="flex-nonw">{{ $tutorial_count }}</span>
    </div>
    <div class="font-medium flex flex-row justify-between">
        <span class="flex-nonw">{{ __("ASSIGNMENTS") }}</span>
        <span class="mx-2 flex-auto border-b-2 border-dotted border-white h-4"></span>
        <span class="flex-nonw">{{ $assignment_count }}</span>
    </div>
    <div class="font-medium flex flex-row justify-between">
        <span class="flex-nonw">{{ __("EXAMS") }}</span>
        <span class="mx-2 flex-auto border-b-2 border-dotted border-white h-4"></span>
        <span class="flex-nonw">{{ $exam_count }}</span>
    </div>
</a>
