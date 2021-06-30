<x-app-layout title="Locations">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Locaties
        </h2>

        @livewire('add-location')

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Alle locaties
        </h4>

        @livewire('show-locations')

    </div>

</x-app-layout>
