<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row w-full space-x-4">
                <div class="w-1/3 bg-white shadow-xl rounded-lg p-8 text-2xl">{{ __('Subject :count', ['count' => 0]) }}</div>
                <div class="w-1/3 bg-white shadow-xl rounded-lg p-8 text-2xl">{{ __('Periods :count', ['count' => 0]) }}</div>
                <div class="w-1/3 bg-white shadow-xl rounded-lg p-8 text-2xl">{{ __('Assessments :count', ['count' => 0]) }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
