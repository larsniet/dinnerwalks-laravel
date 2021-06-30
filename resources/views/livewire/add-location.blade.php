<x-form-section submit="addLocation">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="location" value="Locatie" />
            <x-input id="location" type="text" class="block w-full mt-1" wire:model.defer="location"
                placeholder="De mooiste plek allertijden!" />
            <x-input-error for="location" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Toegevoegd.') }}
        </x-action-message>

        <x-button>
            {{ __('Locatie toevoegen') }}
        </x-button>
    </x-slot>
</x-form-section>