<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Veelgestelde vragen toevoegen
    </h4>

    <x-form-section submit="addFaq">
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="vraag" value="Vraag" />
                <x-input id="vraag" type="text" class="block w-full mt-1" wire:model.defer="vraag"
                    placeholder="Hmm, hoelang is een chinees?" />
                <x-input-error for="vraag" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="antwoord" value="Antwoord" />
                <x-input id="antwoord" type="text" class="block w-full mt-1" wire:model.defer="antwoord"
                    placeholder="Hu, Lang? Ik snap hem nog steeds niet." />
                <x-input-error for="antwoord" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Toegevoegd.') }}
            </x-action-message>

            <x-button>
                {{ __('Veelgestelde vraag toevoegen') }}
            </x-button>
        </x-slot>
    </x-form-section>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Alle veelgestelde vragen
    </h4>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Vraag</th>
                        <th class="px-4 py-3">Antwoord</th>
                        <th class="px-4 py-3">Acties</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach ($faqs as $faq)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ substr($faq->vraag, 0, 30) }}...
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ substr($faq->antwoord, 0, 80) }}...
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" @click="openModal({{ $faq }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>

                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" wire:click="$emit('remove',{{ $faq }})">
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

    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <x-form-section submit="updateFaq" close="true" x-show="isModalOpen"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">

            <!-- Modal body -->
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-6">
                    <x-label for="vraag" value="Vraag" />
                    {{ $faq }}
                    <input id="vraag" type="text"
                        class="block w-full mt-1 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model.defer="vraag" placeholder="Hmm, hoelang is een chinees?"
                        value="{{ $faq }}" />
                    <x-input-error for="vraag" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <x-label for="antwoord" value="Antwoord" />
                    <textarea id="antwoord" type="text" wire:model.defer="antwoord"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" value="{{ $faq }}"
                        placeholder="Hu, Lang? Ik snap hem nog steeds niet."></textarea>
                    <x-input-error for="antwoord" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <button @click="closeModal"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray mr-4"
                    type="button">
                    Cancel
                </button>
                <x-button>
                    {{ __('Veelgestelde vraag wijzigen') }}
                </x-button>
            </x-slot>
        </x-form-section>
    </div>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                @this.on('remove', faq => {
                    Swal.fire({
                        title: 'Weet je het zeker?',
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'Ja, het was een stomme vraag.',
                        cancelButtonText: "Oh huh, NEE!"
                    }).then((result) => {
                        //if user clicks on delete
                        if (result.value) {
                            // calling destroy method to delete
                            @this.call('remove', faq)
                            // success response
                            Swal.fire({
                                title: 'Vraag succesvol verwijderd!',
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
