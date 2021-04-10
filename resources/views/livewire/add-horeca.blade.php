<x-form-section submit="addHoreca">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="userName" value="Naam contactpersoon" />
            <x-input id="userName" type="text" class="block w-full mt-1" wire:model.defer="userName"
                placeholder="Pieter Dirksen" />
            <x-input-error for="userName" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="naam" value="Naam bedrijf" />
            <x-input id="naam" type="text" class="block w-full mt-1" wire:model.defer="naam"
                placeholder="Het leukste bedrijf ooit" />
            <x-input-error for="naam" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="E-mailadres" />
            <x-input id="email" type="email" class="block w-full mt-1" wire:model.defer="email"
                placeholder="voorbeeld@mailadres.nl" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="logo" value="Logo" />
            <x-input id="logo" type="file" class="block w-full mt-1" wire:model.defer="logo" />
            <x-input-error for="logo" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="adres" value="Adres" />
            <x-input id="adres" type="text" class="block w-full mt-1" wire:model.defer="adres"
                placeholder="Grote Zeeweg 123" />
            <x-input-error for="adres" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="instagram" value="Instagram URL" />
            <div class="relative">
                <input id="instagram" type="text" wire:model.defer="instagram"
                    class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="www.instagram.com/mijninsta" />
                <button disabled
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-l-md border-t-2 focus:outline-none focus:shadow-outline-purple pointer-events-none dark:focus:shadow-outline-gray"
                    style="color: #9c9c9c">
                    https://
                </button>
            </div>
            <x-input-error for="instagram" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="facebook" value="Facebook URL" />
            <div class="relative">
                <input id="facebook" type="text" wire:model.defer="facebook"
                    class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="www.facebook.com/mijnfacebook" />
                <button disabled
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-l-md border-t-2 focus:outline-none focus:shadow-outline-purple pointer-events-none dark:focus:shadow-outline-gray"
                    style="color: #9c9c9c">
                    https://
                </button>
            </div>
            <x-input-error for="facebook" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="website" value="Website URL" />
            <div class="relative">
                <input id="website" type="text" wire:model.defer="website"
                    class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="www.mijnwebsite.nl" />
                <button disabled
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-transparent rounded-l-md border-t-2 focus:outline-none focus:shadow-outline-purple pointer-events-none dark:focus:shadow-outline-gray"
                    style="color: #9c9c9c">
                    https://
                </button>
            </div>
            <x-input-error for="website" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
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
