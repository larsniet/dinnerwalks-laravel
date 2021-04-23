<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Kortingscode toevoegen
    </h4>

    <x-form-section submit="addCode">
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="kortingscode" value="Kortingscode" />
                <x-input id="kortingscode" type="text" class="block w-full mt-1" wire:model.defer="kortingscode"
                    placeholder="Zadelvlekspitskopkogelvis" />
                <x-input-error for="kortingscode" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Toegevoegd.') }}
            </x-action-message>

            <x-button>
                {{ __('Kortingscode toevoegen') }}
            </x-button>
        </x-slot>
    </x-form-section>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Alle kortingscodes
    </h4>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Acties</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach ($kortingscodes as $kortingscode)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $kortingscode->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ $kortingscode->code }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" wire:click="$emit('remove',{{ $kortingscode }})">
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
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            {{ $kortingscodes->links() }}
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                @this.on('remove', kortingscode => {
                    Swal.fire({
                        title: 'Weet je het zeker?',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'Ja, klere kortingscode.',
                        cancelButtonText: "Oh huh, NEE!"
                    }).then((result) => {
                        //if user clicks on delete
                        if (result.value) {
                            // calling destroy method to delete
                            @this.call('remove', kortingscode)
                            // success response
                            Swal.fire({
                                title: 'Code succesvol verwijderd!',
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
