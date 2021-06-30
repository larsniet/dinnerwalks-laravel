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

                @foreach ($caterings as $index => $catering)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                @if ($editedCateringIndex !== $index)
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ asset($catering->logo) }}" alt="Catering Logo" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                @else
                                    <div class="relative hidden mr-3 md:block">
                                        <x-input type="file" class="block w-full mt-1" id="logo"
                                            wire:model.defer="logo" />
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold" style="text-transform: capitalize">
                                        @if ($editedCateringIndex !== $index)
                                            {{ $catering->name }}
                                        @else
                                            <x-input type="text" class="block w-full mt-1"
                                                wire:model.defer="caterings.{{ $index }}.name"
                                                placeholder="Naam van de onderneming" />
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400"
                                        style="text-transform: capitalize">
                                        @if ($editedCateringIndex !== $index)
                                            {{ $catering->location->name }}
                                        @else
                                            <select
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                type="text"
                                                wire:model.defer="caterings.{{ $index }}.location_id">
                                                @foreach ($locations as $location)
                                                    @if ($location->id === $catering->location_id) {
                                                        <option value="{{ $location->id }}" selected>
                                                            {{ $location->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $location->id }}">
                                                            {{ $location->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-2 py-3 text-xs">
                            {{ $catering->user->email }}
                        </td>
                        <td class="px-2 py-3 text-xs">
                            @if ($editedCateringIndex !== $index)
                                @if (strlen($catering->address) > 30)
                                    {{ substr($catering->address, 0, 30) }}...
                                @else
                                    {{ $catering->address }}
                                @endif
                            @else
                                <x-input type="text" class="block w-full mt-1"
                                    wire:model.defer="caterings.{{ $index }}.address"
                                    placeholder="Adres van de eigenaar" />
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($editedCateringIndex !== $index)
                                @if ($catering->status === 'Active')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $catering->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        {{ $catering->status }}
                                    </span>
                                @endif
                            @else
                                <select
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    type="text" wire:model.defer="caterings.{{ $index }}.status">
                                    <option>Active</option>
                                    <option>Passive</option>
                                </select>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">

                                @if ($editedCateringIndex !== $index)
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click.prevent="editCatering({{ $index }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                @else
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Save" wire:click.prevent="saveCatering({{ $index }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                @endif

                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete"
                                    wire:click.prevent="$emit('removeCatering',{{ $index }})">
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
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800 mb-6">
        {{-- {{ $caterings->links() }} --}}
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('removeCatering', index => {
                Swal.fire({
                    title: 'Weet je het zeker?',
                    text: 'Je verwijderd hiermee ook het account van de eigenaar van de cateringonderneming.',
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
                        @this.call('removeCatering', index)
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
