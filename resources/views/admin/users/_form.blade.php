<div class="p-8">
    <div class=" mb-4">
        <x-jet-label for="name" value="{{ __('Name') }}"></x-jet-label>
        <x-jet-input value="{{ $user->name }}" id="name" type="text" class="mt-1 block w-full" name="name" autocomplete="name"></x-jet-input>
        <x-jet-input-error for="name" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="email" value="{{ __('Email') }}"></x-jet-label>
        <x-jet-input value="{{ $user->email }}" id="email" type="email" class="mt-1 block w-full" name="email" autocomplete="email"></x-jet-input>
        <x-jet-input-error for="email" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="password" value="{{ __('Password') }}"></x-jet-label>
        <x-jet-input value="" id="password" type="password" class="mt-1 block w-full" name="password" autocomplete="password"></x-jet-input>
        <x-jet-input-error for="password" class="mt-2"></x-jet-input-error>
    </div>

    <div class=" mb-4">
        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"></x-jet-label>
        <x-jet-input value="" id="password_confirmation" type="password" class="mt-1 block w-full" name="password_confirmation" autocomplete="password_confirmation"></x-jet-input>
        <x-jet-input-error for="password_confirmation" class="mt-2"></x-jet-input-error>
    </div>

    <div class="mb-4">
        <div class="flex items-start">
            <input type="hidden" name="email_verified" value="0" />
            <div class="flex items-center h-5">
                <input id="email_verified" name="email_verified" value="1" {{ $user->email_verified_at ? 'checked' : '' }} type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
            </div>
            <div class="ml-3 text-sm">
                <label for="email_verified" class="font-medium text-gray-700">Email Verified</label>
                <p class="text-gray-500">Only verified users can access dashboard</p>
            </div>
        </div>
    </div>

</div>

<x-slot name="actions">
    <x-button>{{ __('Save') }}</x-button>
</x-slot>
