@if ($isOpen)
    <div x-show="true" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <div x-show="true" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" wire:click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6 grid grid-cols-2 gap-4">
                <!-- Modal Input fields -->
                <div class="col-span-1">
                    <x-label for="location_id" value="Locatie" />
                    <select id="location_id" wire:model.defer="location_id"
                        class='block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input'
                        style="text-transform: capitalize">
                        @foreach ($locations as $w)
                            @if ($w->id === $location_id) {
                                <option value="{{ $w->id }}" selected>{{ $w->name }}</option>
                            @else
                                <option value="{{ $w->id }}">{{ $w->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <x-input-error for="location_id" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="name" value="Naam walk" />
                    <x-input id="name" type="text" class="block w-full mt-1" wire:model.defer="name"
                        placeholder="Culinair" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="description" value="Beschrijving" />
                    <x-input id="description" type="text" class="block w-full mt-1" wire:model.defer="description"
                        placeholder="Een hele leuke locatie met veel bergen" />
                    <x-input-error for="description" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="preview" value="Walk preview" />
                    <x-input id="preview" type="file" class="block w-full mt-1" wire:model.defer="preview" />
                    <x-input-error for="preview" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="pdf" value="Route PDF" />
                    <x-input id="pdf" type="file" class="block w-full mt-1" wire:model.defer="pdf" />
                    <x-input-error for="pdf" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-label for="inputFields" value="Hoeveelheid Podcasts" />
                    <select id="inputFields" wire:model="inputFields"
                        class='block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input'>
                        <option value="0" selected>Selecteer hoeveelheid</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <x-input-error for="inputFields" class="mt-2" />
                </div>

                @if ($inputFields !== 0)
                    @for ($i = 0; $i < $inputFields; $i++)
                        <div class="col-span-1">
                            <x-label for="podcast.{{ $i + 1 }}" value="Podcast {{ $i + 1 }}" />
                            <x-input id="podcast.{{ $i + 1 }}" type="file" class="block w-full mt-1"
                                wire:model="podcast.{{ $i + 1 }}" accept="audio/mp3" />
                            <x-input-error for="podcast.{{ $i + 1 }}" class="mt-2" />
                        </div>
                    @endfor
                @endif

            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click="closeModal"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button wire:click='saveWalk({{ $currentWalkId }})'
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Opslaan
                </button>
            </footer>
        </div>
    </div>
@endif

<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Walk</th>
                    <th class="px-4 py-3">Aantal keer geboekt</th>
                    <th class="px-4 py-3">Totale Omzet</th>
                    <th class="px-4 py-3">Status</th>
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
                                        {{ $walk->name }}
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $walk->location->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            {{ $walk->amount_booked }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            € {{ $walk->revenue }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($walk->status === 'Active')
                                <a style="cursor: pointer" wire:click.prevent='toggleStatus({{ $walk }})'>
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $walk->status }}
                                    </span>
                                </a>
                            @else
                                <a style="cursor: pointer" wire:click.prevent='toggleStatus({{ $walk }})'>
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        {{ $walk->status }}
                                    </span>
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit" wire:click.prevent="editWalk({{ $walk }})">
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
                    confirmButtonText: 'Ja, ' + walk.name + ' was toch een stomme wandeling.',
                    cancelButtonText: "Oh huh, NEE!"
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                        @this.call('remove', walk)
                        // success response
                        Swal.fire({
                            title: 'Walk ' + walk.name + ' succesvol verwijderd!',
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
