<div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Vraag</th>
                    <th class="px-4 py-3">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @foreach ($locations as $index => $loc)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            @if ($editedLocIndex !== $index)
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $loc['name'] }}
                                        </p>
                                    </div>
                                </div>
                            @else 
                                <x-input type="text" class="block w-full mt-1" wire:model.defer="locations.{{ $index }}.name" placeholder="Hoe lang is een Chinees?" />
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">

                                @if ($editedLocIndex !== $index)
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click.prevent="editLocation({{ $index }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                @else
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Save" wire:click.prevent="saveLocation({{ $index }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                @endif

                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete" wire:click.prevent="$emit('removeLocation',{{ $index }})">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('removeLocation', index => {
                Swal.fire({
                    title: 'Weet je het zeker?',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ja, het was een stomme plek.',
                    cancelButtonText: "Oh huh, NEE!"
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                        @this.call('removeLocation', index)
                        // success response
                        Swal.fire({
                            title: 'Locatie succesvol verwijderd!',
                            icon: 'success'
                        });
                    } else {
                        return;
                    }
                });
            });
        })

    </script>
@endpush

</div>
