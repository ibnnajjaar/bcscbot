<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Periods') }}
            </h2>
            <div>
                <x-link-btn link="{{ route('admin.periods.create') }}">{{ __('Create') }}</x-link-btn>
            </div>
        </div>
    </x-slot>

    <div class="py-12 mx-20">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="container mx-auto">

                <x-table>
                    <x-slot name="thead">
                        <x-th>{{ __('Subject') }}</x-th>
                        <x-th>{{ __('Week Day') }}</x-th>
                        <x-th>{{ __('Start Time') }}</x-th>
                        <x-th>{{ __('End Time') }}</x-th>
                        <x-th>{{ __('Actions') }}</x-th>
                    </x-slot>

                    <x-tbody>
                        @foreach ($periods as $period)
                            <x-tr>
                                <x-td>{{ optional($period->subject)->name }}</x-td>
                                <x-td>{{ $period->weekday }}</x-td>
                                <x-td>{{ $period->start_at }}</x-td>
                                <x-td>{{ $period->end_at }}</x-td>
                                <x-td>
                                    <x-action link="{{ route('admin.periods.edit', $period) }}">{{ __("Edit") }}</x-action>
                                    <x-action
                                        data-post
                                        data-delete-link="{{ route('admin.periods.destroy', $period) }}"
                                        data-request-type="DELETE"
                                        data-request-data=""
                                        data-redirect-url="{{ route('admin.periods.index') }}"
                                        link="{{ route('admin.periods.edit', $period) }}">{{ __("Delete") }}</x-action>
                                </x-td>
                            </x-tr>
                        @endforeach
                    </x-tbody>
                </x-table>

            </div>
        </div>
    </div>
</x-app-layout>


