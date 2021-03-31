<x-form-section submit="addWalk">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="locatie" value="Naam locatie" />
            <x-input id="locatie" type="text" class="block w-full mt-1" wire:model.defer="locatie" />
            <x-input-error for="locatie" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="beschrijving" value="Beschrijving" />
            <x-input id="beschrijving" type="text" class="block w-full mt-1" wire:model.defer="beschrijving" />
            <x-input-error for="beschrijving" class="mt-2" />
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
