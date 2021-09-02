<div class="p-8">
    <div class="mb-4">
        <x-jet-label for="name" value="{{ __('Name') }}"></x-jet-label>
        <x-jet-input value="{{ $subject->name }}" id="name" type="text" class="mt-1 block w-full" name="name" autocomplete="name"></x-jet-input>
        <x-jet-input-error for="name" class="mt-2"></x-jet-input-error>
    </div>

    <div class="mb-4">
        <x-jet-label for="code" value="{{ __('Code') }}"></x-jet-label>
        <x-jet-input value="{{ $subject->code }}" id="code" type="text" class="mt-1 block w-full" name="code" autocomplete="code"></x-jet-input>
        <x-jet-input-error for="code" class="mt-2"></x-jet-input-error>
    </div>

    <div class="mb-4">
        <x-jet-label for="lecturer" value="{{ __('Lecturer') }}"></x-jet-label>
        <x-jet-input value="{{ $subject->lecturer }}" id="lecturer" type="text" class="mt-1 block w-full" name="lecturer" autocomplete="lecturer"></x-jet-input>
        <x-jet-input-error for="lecturer" class="mt-2"></x-jet-input-error>
    </div>

    <div class="mb-4">
        <x-jet-label for="description" value="{{ __('Description') }}"></x-jet-label>
        <x-textarea name="description">{{ $subject->description }}</x-textarea>
        <x-jet-input-error for="description" class="mt-2"></x-jet-input-error>
    </div>
</div>

<x-slot name="actions">
    <x-button>{{ __('Save') }}</x-button>
</x-slot>
