<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                @if (Auth::user()->email === 'admin@dinnerwalks.nl')
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

                @if (Auth::user()->email === 'admin@dinnerwalks.nl')
                    @foreach ($boekingen as $boeking)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $boeking->customer->naam }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $boeking->customer->email }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $boeking->walk->locatie }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $boeking->kortingscode }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <a
                                    href="tel:{{ $boeking->customer->telefoonnummer }}">{{ $boeking->customer->telefoonnummer }}</a>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                € {{ $boeking->prijs_boeking }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($boeking->status === 'Betaald')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $boeking->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        {{ $boeking->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{-- {{ $boeking->datum }} --}}
                            </td>
                        </tr>
                    @endforeach

                @else

                    @foreach ($boekingen as $boeking)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $boeking->kortingscode }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $boeking->personen }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $boeking->datum }}
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
    @if (Auth::user()->email === 'admin@dinnerwalks.nl')
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            {{ $boekingen->links() }}
        </div>
    @endif
</div>
