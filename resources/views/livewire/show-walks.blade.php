<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Locatie</th>
                    <th class="px-4 py-3">Aantal keer geboekt</th>
                    <th class="px-4 py-3">Totale Omzet</th>
                    <th class="px-4 py-3">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @foreach ($walks as $walk)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold" style="text-transform: capitalize">
                                        {{ $walk->locatie }}
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ substr($walk->beschrijving, 0, 20) }}...
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            {{ $walk->aantal_geboekt }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            € {{ $walk->omzet }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit" wire:click="editWalk({{ $walk }})">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>

                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete" wire:click="$emit('remove',{{ $walk }})">
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
            @this.on('remove', walk => {
                Swal.fire({
                    title: 'Weet je het zeker?',
                    text: 'Alle boekingen die verbonden zijn aan deze walk worden dan ook verwijderd.',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ja, ' + walk.locatie + ' was toch een rotplek.',
                    cancelButtonText: "Oh huh, NEE!"
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                        @this.call('remove', walk)
                        // success response
                        Swal.fire({
                            title: 'Walk ' + walk.locatie + ' succesvol verwijderd!',
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
