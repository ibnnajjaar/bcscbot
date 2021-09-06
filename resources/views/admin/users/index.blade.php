<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <div>
                <x-link-btn link="{{ route('admin.users.create') }}">{{ __('Create') }}</x-link-btn>
            </div>
        </div>
    </x-slot>

    <div class="py-4 md:py-12 mx-4 md:mx-20">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="container mx-auto">

                <x-table>
                    <x-slot name="thead">
                        <x-th>{{ __('Name') }}</x-th>
                        <x-th>{{ __('Email') }}</x-th>
                        <x-th>{{ __('Verified On') }}</x-th>
                        <x-th>{{ __('Actions') }}</x-th>
                    </x-slot>

                    <x-tbody>
                        @foreach ($users as $user)
                            <x-tr>
                                <x-td>{{ $user->name }}</x-td>
                                <x-td>{{ $user->email }}</x-td>
                                <x-td>{{ optional($user->email_verified_at)->format('d M Y H:i') }}</x-td>
                                <x-td>
                                    <x-action link="{{ route('admin.users.edit', $user) }}">{{ __("Edit") }}</x-action>
                                    <x-action
                                        data-post
                                        data-delete-link="{{ route('admin.users.destroy', $user) }}"
                                        data-request-type="DELETE"
                                        data-request-data=""
                                        data-redirect-url="{{ route('admin.users.index') }}"
                                        link="{{ route('admin.users.edit', $user) }}">{{ __("Delete") }}</x-action>
                                </x-td>
                            </x-tr>
                        @endforeach
                    </x-tbody>
                </x-table>

            </div>
        </div>
    </div>
</x-app-layout>


