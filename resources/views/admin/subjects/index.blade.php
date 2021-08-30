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
                                    <x-action data-delete-link="{{ route('admin.subjects.destroy', $subject) }}" link="{{ route('admin.subjects.edit', $subject) }}">{{ __("Delete") }}</x-action>
                                </x-td>
                            </x-tr>
                        @endforeach
                    </x-tbody>
                </x-table>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function (){

                $('[data-delete-link]').on('click', function (e) {
                    e.preventDefault();

                    request_url = $(this).attr('data-delete-link');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        $.ajax({
                            type: 'DELETE',
                            url: request_url,
                        }).done(function (result){
                           console.log(result);
                            if (result) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        });
                    });
                })
            });

        </script>

    @endpush

</x-app-layout>


