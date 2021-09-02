<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Assessment') }}
        </h2>
    </x-slot>

    <div class="py-4 md:py-12 mx-4 md:mx-20">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="container mx-auto bg-white rounded shadow">

                <x-form link="{{ route('admin.assessments.store') }}">
                    @include('admin.assessments._form')
                </x-form>

            </div>
        </div>
    </div>
</x-app-layout>
