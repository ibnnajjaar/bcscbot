<div class="p-8">

    <div class="mb-4">
        <x-jet-label for="name" value="{{ __('Name') }}"></x-jet-label>
        <x-jet-input value="{{ $assessment->name }}" id="name" type="text" class="mt-1 block w-full" name="name" autocomplete="name"></x-jet-input>
        <x-jet-input-error for="name" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="subject" value="{{ __('Subject') }}"></x-jet-label>
        <x-select name="subject">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $assessment->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->formatted_name }}</option>
            @endforeach
        </x-select>
        <x-jet-input-error for="subject" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="type" value="{{ __('Type') }}"></x-jet-label>
        <x-select name="type">
            @foreach ($assessment_types as $type)
                <option value="{{ $type}}" {{ $assessment->type == $type ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($type) }}</option>
            @endforeach
        </x-select>
        <x-jet-input-error for="type" class="mt-2"></x-jet-input-error>
    </div>

    <div class="mb-4">
        <x-jet-label for="total_marks" value="{{ __('Total Marks') }}"></x-jet-label>
        <x-jet-input value="{{ $assessment->total_marks }}" id="total_marks" type="text" class="mt-1 block w-full" name="total_marks" autocomplete="total_marks"></x-jet-input>
        <x-jet-input-error for="total_marks" class="mt-2"></x-jet-input-error>
    </div>

    <div class="mb-4">
        <x-jet-label for="weight" value="{{ __('Weight') }}"></x-jet-label>
        <x-jet-input value="{{ $assessment->weight }}" id="weight" type="text" class="mt-1 block w-full" name="weight" autocomplete="weight"></x-jet-input>
        <x-jet-input-error for="weight" class="mt-2"></x-jet-input-error>
    </div>

    <div class="flex-grow mb-4">
        <x-jet-label for="assessment_at" value="{{ __('Assessment Date') }}"></x-jet-label>
        <div class="flex flex-row">
            <div class="flex-grow">
                <input type="number" name="assessment_at_year" value="{{ optional($assessment->assessment_at)->format('Y') }}" placeholder="year" class='w-full block mt-1 border-gray-300 rounded-md'>
                <x-jet-input-error for="assessment_at_year" class="mt-2"></x-jet-input-error>
            </div>
            <span class="block flex justify-center items-center px-2">/</span>
            <div class="flex-grow">
                <input type="number" name="assessment_at_month" value="{{ optional($assessment->assessment_at)->format('m') }}" placeholder="month" class='w-full block mt-1 border-gray-300 rounded-md'>
                <x-jet-input-error for="assessment_at_month" class="mt-2"></x-jet-input-error>
            </div>
            <span class="block flex justify-center items-center px-2">/</span>
            <div class="flex-grow">
                <input type="number" name="assessment_at_day" value="{{ optional($assessment->assessment_at)->format('d') }}" placeholder="day" class='w-full block mt-1 border-gray-300 rounded-md'>
                <x-jet-input-error for="assessment_at_day" class="mt-2"></x-jet-input-error>
            </div>
            <span class="block flex justify-center items-center px-2"></span>
            <div class="flex-grow">
                <input type="number" name="assessment_at_hour" value="{{ optional($assessment->assessment_at)->format('H') }}" placeholder="hours" class='w-full block mt-1 border-gray-300 rounded-md'>
                <x-jet-input-error for="assessment_at_hour" class="mt-2"></x-jet-input-error>
            </div>
            <span class="block flex justify-center items-center px-2">:</span>
            <div class="flex-grow">
                <input type="number" name="assessment_at_minutes" value="{{ optional($assessment->assessment_at)->format('i') }}" placeholder="mins" class='w-full block mt-1 border-gray-300 rounded-md'>
                <x-jet-input-error for="assessment_at_minutes" class="mt-2"></x-jet-input-error>
            </div>
        </div>
        <x-jet-input-error for="assessment_at" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="description" value="{{ __('Description') }}"></x-jet-label>
        <x-textarea name="description">{{ $assessment->description }}</x-textarea>
        <x-jet-input-error for="description" class="mt-2"></x-jet-input-error>
    </div>
</div>

<x-slot name="actions">
    <x-button>{{ __('Save') }}</x-button>
</x-slot>
