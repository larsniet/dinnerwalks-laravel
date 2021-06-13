<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Naam</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Adres</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @foreach ($horecas as $index => $horeca)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                @if ($editedHorecaIndex !== $index)
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ asset($horeca->logo) }}" alt="Horeca Logo" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                @else 
                                <div class="relative hidden mr-3 md:block">
                                    <x-input type="file" class="block w-full mt-1" id="logo" wire:model.defer="logo" />
                                </div>
                                @endif
                                <div>
                                    <p class="font-semibold" style="text-transform: capitalize">
                                        @if ($editedHorecaIndex !== $index)
                                            @if (strlen($horeca->naam) > 20)
                                                {{ substr($horeca->naam, 0, 20) }}...
                                            @else
                                                {{ $horeca->naam }}
                                            @endif
                                        @else
                                            <x-input type="text" class="block w-full mt-1" wire:model.defer="horecas.{{ $index }}.naam" placeholder="Naam van de onderneming" />
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400"
                                        style="text-transform: capitalize">
                                        @if ($editedHorecaIndex !== $index)
                                            {{ $horeca->walk->locatie }}
                                        @else
                                            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" type="text" wire:model.defer="horecas.{{ $index }}.walk_id">
                                                @foreach ($walks as $walk)
                                                    <option value="{{ $walk->id }}">{{ $walk->locatie }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-3 text-xs">
                            @if ($editedHorecaIndex !== $index)
                                {{ $horeca->email }}
                            @else
                                <x-input type="text" class="block w-full mt-1" wire:model.defer="horecas.{{ $index }}.email" placeholder="E-mail van de eigenaar" />
                            @endif
                        </td>
                        <td class="px-2 py-3 text-xs">
                            @if ($editedHorecaIndex !== $index)
                                @if (strlen($horeca->adres) > 30)
                                    {{ substr($horeca->adres, 0, 30) }}...
                                @else
                                    {{ $horeca->adres }}
                                @endif
                            @else
                                <x-input type="text" class="block w-full mt-1" wire:model.defer="horecas.{{ $index }}.adres" placeholder="Adres van de eigenaar" />
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($editedHorecaIndex !== $index)
                                @if ($horeca->status === "Actief")
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $horeca->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        {{ $horeca->status }}
                                    </span>
                                @endif
                            @else 
                                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" type="text" wire:model.defer="horecas.{{ $index }}.status">
                                    <option>Actief</option>
                                    <option>Passief</option>
                                </select>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">

                                @if ($editedHorecaIndex !== $index)
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click.prevent="editHoreca({{ $index }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                @else
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Save" wire:click.prevent="saveHoreca({{ $index }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                @endif

                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete" wire:click.prevent="$emit('removeHoreca',{{ $index }})">
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
    {{-- <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800 mb-6">
        {{-- {{ $horecas->links() }} --}}
    </div> --}}
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('removeHoreca', index => {
                Swal.fire({
                    title: 'Weet je het zeker?',
                    text: 'Je verwijderd hiermee ook het account van de eigenaar van de horecaonderneming.',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ja, het was daar toch niet leuk.',
                    cancelButtonText: "Uh, nee?"
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                        @this.call('removeHoreca', index)
                        // success response
                        Swal.fire({
                            title: 'Succesvol verwijderd!',
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
