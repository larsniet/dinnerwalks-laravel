<div>
    @foreach ($customers as $customer)
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                            alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold">{{ $customer->name }}</p>
                    </div>
                </div>
            </td>
            <td class="px-4 py-3 text-sm">
                € {{ $customer->boeking[0]->bedrag_betaald }}
            </td>
            <td class="px-4 py-3 text-xs">
                <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    Approved
                </span>
            </td>
            <td class="px-4 py-3 text-sm">
                {{ $customer->boeking[0]->datum }}
            </td>
        </tr>
    @endforeach
</div>
