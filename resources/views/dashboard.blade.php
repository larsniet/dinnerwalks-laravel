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

        <!-- Customers -->
        @livewire('display-customers')

    </div>

</x-app-layout>
