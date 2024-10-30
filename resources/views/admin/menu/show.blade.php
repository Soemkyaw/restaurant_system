<x-dashboard-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-3xl font-medium text-gray-700">Menu detail</h3>

            <div class="mt-4">
                <div class="bg-white w-full rounded-lg shadow-lg overflow-hidden">
                    <div class="mt-6">
                        <div class="px-5 md:flex items-center gap-5">
                            <div class=" md:w-96 md:h-80">
                                <img src="{{ asset('storage/' . $menu->image) }}" class=" w-full h-full rounded-lg">
                            </div>
                            <div>
                                <h2 class=" text-5xl font-bold tracking-tigh mb-3">{{ Str::ucfirst($menu->name) }}</h2>
                                <div class=" mb-3">
                                    <span class=" text-xl text-gray-800">{{ number_format($menu->price) }} Ks</span>
                                    <span class=" text-2xl font-thin text-gray-400 mx-2">|</span>
                                    <span class=" text-xl text-gray-800">{{ $menu->category->name }}</span>
                                </div>
                                <div class=" text-gray-500 font-semibold mb-3">
                                    <span>Preparation time - <span
                                            class="text-green-900">{{ $menu->preparation_time }}</span> mins</span>
                                </div>
                                <div class=" text-gray-500 font-semibold mb-3">
                                    <span>Available - </span>
                                    @if ($menu->is_available)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5 inline text-green-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5 inline text-red-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class=" text-gray-500 font-semibold mb-3">
                                    <span>Spicy level - <span class="text-gray-900">{{ $menu->spicy_level }}</span>
                                </div>
                                <div class=" text-gray-500 font-semibold mb-3">
                                    <span>Discount - <span class="text-gray-900">{{ $menu->discount ? $menu->discount : "There is no discount." }}</span>
                                </div>
                            </div>
                        </div>
                        <div class=" flex justify-between space-x-4 p-5">
                            <a href="{{ route('menus') }}"
                                class="px-4 py-2 text-blue-600">Back to menus</a>
                            <a href="{{ route('menu.edit',$menu->slug) }}"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Edit</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-8">

            </div>
        </div>
    </main>
</x-dashboard-layout>
