<x-action-section>
    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-900 dark:text-gray-300">
            {{ __('Zodra je je account verwijderd, verwijder je ook alle gegevens van de door jou toegevoegde onderneming. Dit is permanent en kan niet teruggedraaid worden tenzij je weer contact met ons opneemt.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Verwijder account') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Verwijder Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Weet je zeker dat je je account wil verwijderen? Jouw accountgegevens en jouw horecaonderneming worden permanent verwijderd. Vul je wachtwoord in om door te gaan.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="block w-3/4 mt-1" placeholder="Wachtwoord" x-ref="password"
                        wire:model.defer="password" wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Oh, dat wil ik niet!') }}
                </x-secondary-button>

                <x-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Verwijder account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
