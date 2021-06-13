<x-form-section submit="addWalk" enctype="multipart/form-data">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="locatie" value="Naam locatie" />
            <x-input id="locatie" type="text" class="block w-full mt-1" wire:model.defer="locatie"
                placeholder="Driebergen" />
            <x-input-error for="locatie" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="beschrijving" value="Beschrijving" />
            <x-input id="beschrijving" type="text" class="block w-full mt-1" wire:model.defer="beschrijving"
                placeholder="Een hele leuke locatie met veel bergen" />
            <x-input-error for="beschrijving" class="mt-2" />
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
            <x-label for="podcast1" value="Podcast 1" />
            <x-input id="podcast1" type="file" class="block w-full mt-1" wire:model.defer="podcast1"
                accept="audio/mp3" />
            <x-input-error for="podcast1" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="podcast2" value="Podcast 2" />
            <x-input id="podcast2" type="file" class="block w-full mt-1" wire:model.defer="podcast2"
                accept="audio/mp3" />
            <x-input-error for="podcast2" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="podcast3" value="Podcast 3" />
            <x-input id="podcast3" type="file" class="block w-full mt-1" wire:model.defer="podcast3"
                accept="audio/mp3" />
            <x-input-error for="podcast3" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="podcast4" value="Podcast 4" />
            <x-input id="podcast4" type="file" class="block w-full mt-1" wire:model.defer="podcast4"
                accept="audio/mp3" />
            <x-input-error for="podcast4" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="podcast5" value="Podcast 5" />
            <x-input id="podcast5" type="file" class="block w-full mt-1" wire:model.defer="podcast5"
                accept="audio/mp3" />
            <x-input-error for="podcast5" class="mt-2" />
        </div>
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
