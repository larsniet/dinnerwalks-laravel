<div>
    @forelse ($boekingen as $boeking)
        @foreach ($customers as $customer)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <div>
                            <p class="font-semibold">{{ $customer->name }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm">
                    € {{ $customer->boeking->bedrag_betaald }}
                </td>
                <td class="px-4 py-3 text-xs">
                    <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Approved
                    </span>
                </td>
                <td class="px-4 py-3 text-sm">
                    {{ $customer->boeking->datum }}
                </td>
            </tr>
        @endforeach
    @empty
    @endforelse
</div>
