<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Assessments') }}
            </h2>
            <div>
                <x-link-btn link="{{ route('admin.assessments.create') }}">{{ __('Create') }}</x-link-btn>
            </div>
        </div>
    </x-slot>

    <div class="py-4 md:py-12 mx-4 md:mx-20">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="container mx-auto">

                <x-table>
                    <x-slot name="thead">
                        <x-th>{{ __('Name') }}</x-th>
                        <x-th>{{ __('Type') }}</x-th>
                        <x-th>{{ __('Subject') }}</x-th>
                        <x-th>{{ __('Assessment Date') }}</x-th>
                        <x-th>{{ __('Total Marks') }}</x-th>
                        <x-th>{{ __('Weight') }}</x-th>
                        <x-th>{{ __('Actions') }}</x-th>
                    </x-slot>

                    <x-tbody>
                        @foreach ($assessments as $assessment)
                            <x-tr>
                                <x-td>{{ $assessment->name }}</x-td>
                                <x-td>{{ $assessment->formatted_type }}</x-td>
                                <x-td>{{ optional($assessment->subject)->name }}</x-td>
                                <x-td>{{ optional($assessment->assessment_at)->format('d M Y H:i') }}</x-td>
                                <x-td>{{ $assessment->total_marks }}</x-td>
                                <x-td>{{ $assessment->weight }}</x-td>
                                <x-td>
                                    <x-action link="{{ route('admin.assessments.edit', $assessment) }}">{{ __("Edit") }}</x-action>
                                    <x-action
                                        data-post
                                        data-delete-link="{{ route('admin.assessments.destroy', $assessment) }}"
                                        data-request-type="DELETE"
                                        data-request-data=""
                                        data-redirect-url="{{ route('admin.assessments.index') }}"
                                        link="{{ route('admin.assessments.edit', $assessment) }}">{{ __("Delete") }}</x-action>
                                </x-td>
                            </x-tr>
                        @endforeach
                    </x-tbody>
                </x-table>

            </div>
        </div>
    </div>
</x-app-layout>


