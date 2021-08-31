<div class="p-8">
    <div class=" mb-4">
        <x-jet-label for="subject" value="{{ __('Subject') }}"></x-jet-label>
        <x-select name="subject">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $period->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->formatted_name }}</option>
            @endforeach
        </x-select>
        <x-jet-input-error for="subject" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="weekday" value="{{ __('Weekday') }}"></x-jet-label>
        <x-select name="weekday">
            @foreach ($weekdays as $weekday)
                <option value="{{ $weekday}}" {{ $period->weekday == $weekday ? 'selected' : '' }}>{{ \Illuminate\Support\Str::title($weekday) }}</option>
            @endforeach
        </x-select>
        <x-jet-input-error for="weekday" class="mt-2"></x-jet-input-error>
    </div>

    <div class="flex flex-row w-full gap-4 mb-4">
        <div class="flex-grow">
            <x-jet-label for="start_at" value="{{ __('Start Time') }}"></x-jet-label>
            <x-time :model="$period" name="start_at"></x-time>
            <x-jet-input-error for="start_at" class="mt-2"></x-jet-input-error>
        </div>
        <div class="flex-grow">
            <x-jet-label for="end_at" value="{{ __('End Time') }}"></x-jet-label>
            <x-time :model="$period" name="end_at"></x-time>
            <x-jet-input-error for="end_at" class="mt-2"></x-jet-input-error>
        </div>
    </div>

    <div class=" mb-4">
        <x-jet-label for="details" value="{{ __('Details') }}"></x-jet-label>
        <x-textarea name="details">{{ $period->details }}</x-textarea>
        <x-jet-input-error for="details" class="mt-2"></x-jet-input-error>
    </div>
</div>

<x-slot name="actions">
    <x-button>{{ __('Save') }}</x-button>
</x-slot>
