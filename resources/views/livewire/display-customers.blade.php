<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <form method="get">
            @if (Auth::user()->roles[0]->name === 'admin')
                <label class="block text-sm mb-6">
                    <span
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Zoek
                        op naam, e-mail of telefoonnummer van klant</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Piet jan spitsvlek" wire:model="term" type="text" />
                </label>
            @endif
            <span class="spinner mb-6" wire:loading></span>
            <table class="w-full whitespace-no-wrap">
                <thead>
                    @if (Auth::user()->roles[0]->name === 'admin')
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Klant</th>
                            <th class="px-4 py-3">Walk</th>
                            <th class="px-4 py-3">Telefoon</th>
                            <th class="px-4 py-3">Bedrag</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Datum Walk</th>
                        </tr>
                    @else
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Kortingscode</th>
                            <th class="px-4 py-3">Aantal personen</th>
                            <th class="px-4 py-3">Datum van wandeling</th>
                        </tr>
                    @endif
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if (Auth::user()->roles[0]->name === 'admin')
                        <div wire:loading.remove>
                            @if (empty($term))
                                @foreach ($customers as $customer)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $customer->name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $customer->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p>
                                                        <span
                                                            class="font-semibold">{{ ucfirst($customer->booking->walk->name) }}</span>
                                                        in {{ ucfirst($customer->booking->walk->location->name) }}
                                                    </p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $customer->booking->discount_code }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            <a href="tel:{{ $customer->phone }}">{{ $customer->phone }}</a>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            ??? {{ $customer->booking->price }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @if ($customer->booking->status === 'Betaald')
                                                <a style="cursor: pointer" wire:click.prevent='toggleStatus({{ $customer }})'>
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                        {{ $customer->booking->status }}
                                                    </span>
                                                </a>
                                            @else
                                                <a style="cursor: pointer" wire:click.prevent='toggleStatus({{ $customer }})'>
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                        {{ $customer->booking->status }}
                                                    </span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $customer->booking->date }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @if ($customers->isEmpty())
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">
                                            Geen klanten gevonden.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($customers as $customer)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold">{{ $customer->name }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $customer->email }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <span
                                                        class="font-semibold">{{ ucfirst($customer->booking->walk->name) }}</span>
                                                    in {{ ucfirst($customer->booking->walk->location->name) }}
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $customer->booking->discount_code }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                <a href="tel:{{ $customer->phone }}">{{ $customer->phone }}</a>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                ??? {{ $customer->booking->price }}
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                @if ($customer->booking->status === 'Betaald')
                                                    <a style="cursor: pointer" wire:click.prevent='toggleStatus({{ $customer }})'>
                                                        <span
                                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                            {{ $customer->booking->status }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <a style="cursor: pointer" wire:click.prevent='toggleStatus({{ $customer }})'>
                                                        <span
                                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                            {{ $customer->booking->status }}
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $customer->booking->date }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                        </div>

                    @else

                        @foreach ($customers as $customer)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $customer->boeking->discountcode->code }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $customer->amount_persons }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $customer->date }}
                                </td>
                            </tr>
                        @endforeach

                    @endif

                </tbody>
            </table>
        </form>
    </div>
    @if (Auth::user()->roles[0]->name === 'admin')
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            {{ $customers->links() }}
        </div>
    @endif
</div>
