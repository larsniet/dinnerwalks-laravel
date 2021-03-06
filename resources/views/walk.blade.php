<x-app-layout title="Walk">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Walks
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Algemene instellingen
        </h4>
        <livewire:global-walks />

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Walk toevoegen
        </h4>
        <livewire:add-walk />

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Alle walks
        </h4>
        <livewire:show-walks />

    </div>
</x-app-layout>
