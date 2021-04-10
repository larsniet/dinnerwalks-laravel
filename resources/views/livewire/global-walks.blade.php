<x-form-section submit="editWalks">
    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-label for="maxdate" value="Maximale boekingsdatum" />
            <input id="maxdate" type="date"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                wire:model.defer="maxdate" />
            <x-input-error for="maxdate" class="mt-2" />
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
