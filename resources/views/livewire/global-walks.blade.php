<x-form-section submit="editWalks">
    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-label for="maxdate" value="Maximale boekingsdatum" />
            <input id="maxdate" type="date"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                wire:model.defer="max_booking_date" />
            <x-input-error for="maxdate" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="personen" value="Maximaal aantal personen" />
            <x-input id="personen" type="text" class="block w-full mt-1" wire:model.defer="max_people" />
            <x-input-error for="personen" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="kosten" value="Kosten per persoon" />
            <x-input id="kosten" type="text" class="block w-full mt-1" wire:model.defer="price" />
            <x-input-error for="kosten" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Gewijzigd.') }}
        </x-action-message>

        <x-button>
            {{ __('Algemene instellingen wijzigen') }}
        </x-button>
    </x-slot>
</x-form-section>
