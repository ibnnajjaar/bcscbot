<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Subjects ddddd') }}
            </h2>
            <div>
                <x-link-btn link="{{ route('admin.subjects.create') }}">{{ __('Create') }}</x-link-btn>
            </div>
        </div>
    </x-slot>

    <div class="py-12 mx-20">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="container mx-auto">

                <x-table>
                    <x-slot name="thead">
                        <x-th>{{ __('Code') }}</x-th>
                        <x-th>{{ __('Name') }}</x-th>
                        <x-th>{{ __('Lecturer') }}</x-th>
                        <x-th>{{ __('Actions') }}</x-th>
                    </x-slot>

                    <x-tbody>
                        @foreach ($subjects as $subject)
                            <x-tr>
                                <x-td>{{ $subject->code }}</x-td>
                                <x-td>{{ $subject->name }}</x-td>
                                <x-td>{{ $subject->lecturer }}</x-td>
                                <x-td>
                                    <x-action link="{{ route('admin.subjects.edit', $subject) }}">{{ __("Edit") }}</x-action>
                                    <x-action
                                        data-post
                                        data-delete-link="{{ route('admin.subjects.destroy', $subject) }}"
                                        data-request-type="DELETE"
                                        data-request-data=""
                                        data-redirect-url="{{ route('admin.subjects.index') }}"
                                        link="{{ route('admin.subjects.edit', $subject) }}">{{ __("Delete") }}</x-action>
                                </x-td>
                            </x-tr>
                        @endforeach
                    </x-tbody>
                </x-table>

            </div>
        </div>
    </div>
</x-app-layout>


