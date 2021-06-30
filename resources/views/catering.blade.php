<x-app-layout title="Horeca">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Horeca
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Horeca toevoegen
        </h4>
        <livewire:add-catering />

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Alle horeca
        </h4>
        <livewire:show-catering />

    </div>
</x-app-layout>
