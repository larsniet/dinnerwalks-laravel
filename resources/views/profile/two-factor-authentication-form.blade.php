<x-action-section>
    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            @if ($this->enabled)
                {{ __('Je hebt Twee Factor Authenticatie momenteel aan staan.') }}
            @else
                {{ __('Je hebt Twee Factor Authenticatie niet aan staan.') }}
            @endif
        </h3>

        <div class="max-w-xl mt-3 text-sm text-gray-600 dark:text-gray-400">
            <p>
                {{ __('Wanner twee factor authenticatie is ingeschakeld, krijg je een melding waarbij je een (random) beveiligd token in moet voeren. Je kan dit token verkrijgen door de "Google Authenticator" app te downloaden.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="max-w-xl mt-4 text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        {{ __('Twee factor authenticatie staat nu aan. Scan de onderstaande QR code met je telefoon om hiermee te verbinden.') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="max-w-xl mt-4 text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        {{ __('Bewaar deze herstelcodes in een beveiligde omgeving. Deze kunnen gebruikt worden om je account te herstellen op het moment dat je geen toegang meer hebt tot het apparaat waarop je twee factor authenticatie aan hebt gezet.') }}
                    </p>
                </div>

                <div class="grid max-w-xl gap-1 px-4 py-4 mt-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (!$this->enabled)
                <x-button type="button" wire:click="enableTwoFactorAuthentication" wire:loading.attr="disabled">
                    {{ __('Inschakelen') }}
                </x-button>
            @else
                @if ($showingRecoveryCodes)
                    <x-secondary-button class="mr-3" wire:click="regenerateRecoveryCodes">
                        {{ __('Genereer de herstelcodes opnieuw') }}
                    </x-secondary-button>
                @else
                    <x-secondary-button class="mr-3" wire:click="$toggle('showingRecoveryCodes')">
                        {{ __('Laat de hersteldcodes zien') }}
                    </x-secondary-button>
                @endif

                <x-danger-button wire:click="disableTwoFactorAuthentication" wire:loading.attr="disabled">
                    {{ __('Uitschakelen') }}
                </x-danger-button>
            @endif
        </div>
    </x-slot>
</x-action-section>
