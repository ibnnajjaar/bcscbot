<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Subject #:id', ['id' => $subject->id]) }}
            </h2>
            <div>
                <x-link-btn link="{{ route('admin.subjects.create') }}">{{ __('Create') }}</x-link-btn>
            </div>
        </div>
    </x-slot>

    <div class="py-12 mx-20">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="container mx-auto bg-white rounded shadow">

                <x-form link="{{ route('admin.subjects.update', $subject) }}" method="PUT">
                    @include('admin.subjects._form')
                </x-form>

            </div>
        </div>
    </div>
</x-app-layout>
