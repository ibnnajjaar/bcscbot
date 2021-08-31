@props([
    'model',
    'name'
])
@php
    $hr_value = $name . '_hr';
    $min_value = $name . '_min';
@endphp
<div class="flex flex-row">
    <div class="flex-grow">
        <input type="number" name="{{ $name }}_hr" value="{{ $model->{$hr_value} }}" placeholder="hours" class='w-full block mt-1 border-gray-300 rounded-md'>
        <x-jet-input-error for="{{ $name }}_hr" class="mt-2"></x-jet-input-error>
    </div>
    <span class="block flex justify-center items-center px-2">:</span>
    <div class="flex-grow">
        <input type="number" name="{{ $name }}_min" value="{{ $model->{$min_value} }}" placeholder="mins" class='w-full block mt-1 border-gray-300 rounded-md'>
        <x-jet-input-error for="{{ $name }}_min" class="mt-2"></x-jet-input-error>
    </div>
</div>
