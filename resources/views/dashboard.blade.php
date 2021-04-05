<x-app-layout title="Dashboard">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            @if (Auth::user()->email === 'admin@dinnerwalks.nl')
                Dashboard
            @else
                Kortingscodes van de week
            @endif
        </h2>

        <!-- Cards -->
        @if (Auth::user()->email === 'admin@dinnerwalks.nl')
            @livewire('dashboard-stats')
        @endif

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        @if (Auth::user()->email === 'admin@dinnerwalks.nl')
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Klant</th>
                                <th class="px-4 py-3">Bedrag</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Datum</th>
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

                        @livewire('display-customers')

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
