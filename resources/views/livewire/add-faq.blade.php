<x-form-section submit="addFaq">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="vraag" value="Vraag" />
            <x-input id="vraag" type="text" class="block w-full mt-1" wire:model.defer="vraag"
                placeholder="Hmm, hoelang is een chinees?" />
            <x-input-error for="vraag" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="antwoord" value="Antwoord" />
            <x-input id="antwoord" type="text" class="block w-full mt-1" wire:model.defer="antwoord"
                placeholder="Hu, Lang? Ik snap hem nog steeds niet." />
            <x-input-error for="antwoord" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Toegevoegd.') }}
        </x-action-message>

        <x-button>
            {{ __('Veelgestelde vraag toevoegen') }}
        </x-button>
    </x-slot>
</x-form-section>