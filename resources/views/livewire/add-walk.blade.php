<x-form-section submit="addWalk">
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
            <x-label for="kosten" value="Kosten per persoon" />
            <x-input id="kosten" type="text" class="block w-full mt-1" wire:model.defer="kosten" placeholder="3.50" />
            <x-input-error for="kosten" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="personen" value="Maximaal aantal personen" />
            <x-input id="personen" type="text" class="block w-full mt-1" wire:model.defer="personen" placeholder="2" />
            <x-input-error for="personen" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="preview" value="Walk preview" />
            <x-input id="preview" type="file" class="block w-full mt-1" wire:model.defer="preview" />
            <x-input-error for="preview" class="mt-2" />
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
