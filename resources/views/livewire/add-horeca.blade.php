<x-form-section submit="addHoreca">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">
            <x-label for="userName" value="Naam contactpersoon" />
            <x-input id="userName" type="text" class="block w-full mt-1" wire:model.defer="userName" />
            <x-input-error for="userName" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-6">
            <x-label for="naam" value="Naam bedrijf" />
            <x-input id="naam" type="text" class="block w-full mt-1" wire:model.defer="naam" />
            <x-input-error for="naam" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="email" value="E-mailadres" />
            <x-input id="email" type="email" class="block w-full mt-1" wire:model.defer="email" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="logo" value="Logo" />
            <x-input id="logo" type="file" class="block w-full mt-1" wire:model.defer="logo" />
            <x-input-error for="logo" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="adres" value="Adres" />
            <x-input id="adres" type="text" class="block w-full mt-1" wire:model.defer="adres" />
            <x-input-error for="adres" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="instagram" value="Instagram URL" />
            <x-input id="instagram" type="text" class="block w-full mt-1" wire:model.defer="instagram" />
            <x-input-error for="instagram" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="facebook" value="Facebook URL" />
            <x-input id="facebook" type="text" class="block w-full mt-1" wire:model.defer="facebook" />
            <x-input-error for="facebook" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="website" value="Website URL" />
            <x-input id="website" type="text" class="block w-full mt-1" wire:model.defer="website" />
            <x-input-error for="website" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-label for="walk" value="Walk" />
            <select id="walk" wire:model.defer="walk"
                class='block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input'
                style="text-transform: capitalize">
                <option value="" selected>Kies een walk</option>
                @foreach ($walks as $w)
                    <option value="{{ $w }}">{{ $w }}</option>
                @endforeach
            </select>
            <x-input-error for="walk" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Toegevoegd.') }}
        </x-action-message>

        <x-button>
            {{ __('Horeca toevoegen') }}
        </x-button>
    </x-slot>
</x-form-section>
