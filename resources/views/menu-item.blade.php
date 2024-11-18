<x-layout>
    <div class="pt-16">
        <main class="px-16 py-6 bg-gray-100 md:col-span-5 ">
            <div class=" flex items-center justify-between">
                <header>
                    <h2 class="text-gray-700 text-3xl font-semibold">{{ $menuItem->name }}</h2>
                    <h3 class=" text-xl font-semibold">Detail</h3>
                </header>
                <div>
                    <div>
                        <a href="/cart"
                            class="relative inline-flex items-center p-3 text-sm font-medium text-center border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                            </svg>
                            <div
                                class="cartCount absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                {{ $cartCount }}</div>
                        </a>

                    </div>
                </div>
            </div>
            <div class=" flex justify-center py-6 md:px-5">
                <div class="menuItemCard bg-white rounded-lg shadow-md max-w-4xl w-full">
                    <input type="hidden" class="menuItemId" value="{{ $menuItem->id }}">
                    <input type="hidden" class="menuItemPrice" value="{{ $menuItem->price }}">
                    <!-- Header -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $menuItem->image) }}" alt="Menu Item Image"
                            class="w-full h-40 sm:h-48 object-cover rounded-t-lg">
                        <div
                            class=" bg-gray-100 text-green-600 text-xs font-bold uppercase rounded-full ml-2 mt-2 p-2 absolute top-0">
                            <span>{{ number_format($menuItem->price, 2) }} Ks</span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Title and Category -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $menuItem->name }}</h2>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 leading-relaxed mb-6">
                            A classic Italian pasta dish made with eggs, cheese, pancetta, and pepper. Enjoy this rich
                            and
                            flavorful meal cooked to perfection!
                        </p>

                        <!-- Additional Info -->
                        <div class="grid md:grid-cols-2 gap-4 mb-6">
                            <!-- Category -->
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-500 w-28">Category:</span>
                                <span class="text-gray-800">{{ $menuItem->category->name }}</span>
                            </div>
                            <!-- Preparation Time -->
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-500 w-28">Prep Time:</span>
                                <span class="text-gray-800">{{ $menuItem->preparation_time }} min</span>
                            </div>
                            <!-- Cooking Time -->
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-500 w-28">Spicy Level:</span>
                                <span class="text-red-600">{{ $menuItem->spicy_level }}</span>
                            </div>
                            <!-- Serving Size -->
                            <div class="flex items-center">
                                <span class="text-sm font-semibold text-gray-500 w-28">Discount:</span>
                                <span class="text-gray-800">{{ $menuItem->discount }}</span>
                            </div>
                        </div>


                        <!-- Buttons -->
                        <div class="flex space-x-4">
                            <button
                                class="addToCart flex-1 bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600">
                                Add to Order
                            </button>
                            <a href="{{ route('menu') }}"
                                class="flex-1 text-center bg-gray-200 text-gray-800 py-2 px-4 rounded-lg shadow hover:bg-gray-300">
                                Back to Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="font-bold mt-12 pb-2 border-b border-green-400">Goods You May Like</h4>
            <div class=" mt-8">
                <!-- card go here  -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($randomMenuItems as $menuItem)
                        <div
                            class=" mt-8 bg-white rounded-md overflow-hidden shadow-md relative hover:shadow-xl recpieCard">
                            <!-- card go here  -->
                            <a href="{{ route('menu.item.show', $menuItem->slug) }}" class="">
                                <img src="{{ asset('storage/' . $menuItem->image) }}" alt="Stake"
                                    class="w-full h-32 sm:h-48 object-cover">
                            </a>
                            <div class="p-4">
                                <span class="font-bold">{{ Str::ucfirst($menuItem->name) }}</span>
                                <span class="block text-green-700 text-sm=">{{ number_format($menuItem->price) }}
                                    Ks</span>
                                <input class="recpie-name" value="{{ $menuItem->name }}" hidden>
                                <input class="recpie-price" value="{{ $menuItem->price }}" hidden>
                                <input class="recpie-id" value="{{ $menuItem->id }}" hidden>
                            </div>
                            <div
                                class=" bg-gray-100 text-gray-400 text-xs font-bold uppercase rounded-full ml-2 mt-2 p-2 absolute top-0">
                                <span>{{ $menuItem->preparation_time }} Mins</span>
                            </div>
                            {{-- <div class="grid grid-cols-3 gap-2 items-center text-center p-3 qtyHandler">
                                <button
                                    class="plus bg-gray-400 text-white font-semibold px-3 py-2 rounded hover:bg-gray-700 focus:outline-none">
                                    +
                                </button>
                                <input type="number" value="1"
                                    class="menu-item-qty w-full text-center bg-gray-100 text-gray-700 border border-gray-300 rounded px-2 py-2 outline-none focus:ring-2 focus:ring-gray-400">
                                <button
                                    class="minus bg-gray-400 text-white font-semibold px-3 py-2 rounded hover:bg-gray-700 focus:outline-none">
                                    -
                                </button>
                            </div> --}}


                            {{-- <div class=" text-center p-3">
                                <button id="addToCart"
                                    class="addToCart btn border px-2 py-1 bg-gray-300 rounded hover:bg-gray-200 w-full">Add
                                    to Cart</button>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.addToCart').click(function() {
                $parentDiv = $(this).closest('.menuItemCard');
                $menuItemId = $parentDiv.find('.menuItemId').val();
                $menuItemPrice = $parentDiv.find('.menuItemPrice').val();
                console.log($menuItemPrice);

                $.ajax({
                    url: "/cart/add",
                    type: "POST",
                    data: {
                        quantity: 1,
                        menuItemId: $menuItemId,
                        menuItemPrice: $menuItemPrice,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            $('.cartCount').text(response.count);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: "Add to cart successfully"
                            });
                        }
                    }
                })
            })
        });
    </script>

</x-layout>
