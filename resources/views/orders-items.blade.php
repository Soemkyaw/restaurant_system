<x-layout>
    <div class="pt-16">
        <div class="px-5 md:px-16 py-6 bg-gray-100 ">
            <div
                class="w-full max-w-4xl mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Order Items</h5>
                    {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a> --}}
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($orderItems as $item)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/'.$item->menuItem->image) }}"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $item->menuItem->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $item->quantity }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex-auto text-base font-semibold text-gray-900 dark:text-white">
                                        {{ $item->order->table->name }}
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ $item->status }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-layout>
