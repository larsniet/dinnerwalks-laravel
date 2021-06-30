<x-form-section submit="addWalk" enctype="multipart/form-data">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="location_id" value="Locatie" />
            <select id="location_id" wire:model.defer="location_id"
                class='block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input'
                style="text-transform: capitalize">
                <option value="" selected>Kies een locatie</option>
                @foreach ($locations as $w)
                    <option value="{{ $w->id }}">{{ $w->name }}</option>
                @endforeach
            </select>
            <x-input-error for="location_id" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="Naam walk" />
            <x-input id="name" type="text" class="block w-full mt-1" wire:model.defer="name" placeholder="Culinair" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="Beschrijving" />
            <x-input id="description" type="text" class="block w-full mt-1" wire:model.defer="description"
                placeholder="Een hele leuke locatie met veel bergen" />
            <x-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="preview" value="Walk preview" />
            <x-input id="preview" type="file" class="block w-full mt-1" wire:model.defer="preview" />
            <x-input-error for="preview" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="pdf" value="Route PDF" />
            <x-input id="pdf" type="file" class="block w-full mt-1" wire:model.defer="pdf" />
            <x-input-error for="pdf" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
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
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="podcast.{{ $i + 1 }}" value="Podcast {{ $i + 1 }}" />
                    <x-input id="podcast.{{ $i + 1 }}" type="file" class="block w-full mt-1"
                        wire:model="podcast.{{ $i + 1 }}" accept="audio/mp3" />
                    <x-input-error for="podcast.{{ $i + 1 }}" class="mt-2" />
                </div>
            @endfor
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Toegevoegd.') }}
        </x-action-message>

        <x-button>
            {{ __('Walk toevoegen') }}
        </x-button>
    </x-slot>

</x-form-section>
