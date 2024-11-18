<x-layout>
    <div class="pt-16">
        <main class="px-16 py-6 bg-gray-100 md:col-span-5 ">
            <div class=" flex items-center justify-between">
                <header>
                    <h2 class="text-gray-700 text-6xl font-semibold">Recipes</h2>
                    <h3 class=" text-2xl font-semibold">For humanity</h3>
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
                            <span class="sr-only">Notifications</span>
                            <div
                                class="cartCount absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                {{ $cartCount }}</div>
                        </a>

                    </div>
                </div>
            </div>
            <div class=" mt-6 md:flex justify-between items-center">
                <div>
                    @foreach ($categories as $category)
                        <a href=""
                            class=" inline-block px-2 py-1.5 my-1.5 text-sm font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
                <div class=" md:w-96 my-5">
                    <form class="max-w-xl mx-auto">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="">
                <h4 class="font-bold mt-6 pb-2 border-b border-green-400">Special Recipes</h4>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($specialMenuItems as $menuItem)
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
                            <div class="grid grid-cols-3 gap-2 items-center text-center p-3 qtyHandler">
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
                            </div>


                            <div class=" text-center p-3">
                                <button id="addToCart"
                                    class="addToCart btn border px-2 py-1 bg-gray-300 rounded hover:bg-gray-200 w-full">Add
                                    to Cart</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h4 class="font-bold mt-12 pb-2 border-b border-green-400">Most Recipes</h4>
                <div class=" mt-8">
                    <!-- card go here  -->
                    <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-4">
                        @foreach ($menuItems as $menuItem)
                            <div
                                class=" mt-8 bg-white rounded-md overflow-hidden shadow-md relative hover:shadow-xl recpieCard">
                                <!-- card go here  -->
                                <div class="">
                                    <img src="{{ asset('storage/' . $menuItem->image) }}" alt="Stake"
                                        class="w-full h-32 sm:h-48 object-cover">
                                </div>
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
                                <div class="grid grid-cols-3 gap-2 items-center text-center px-3 py-1 qtyHandler">
                                    <button
                                        class="plus bg-gray-400 text-white font-semibold px-2  rounded hover:bg-gray-700 focus:outline-none">
                                        +
                                    </button>
                                    <input type="number" value="1"
                                        class="menu-item-qty w-full text-center bg-gray-100 text-gray-700 border border-gray-300 rounded px-1  outline-none focus:ring-2 focus:ring-gray-400">
                                    <button
                                        class="minus bg-gray-400 text-white font-semibold px-2  rounded hover:bg-gray-700 focus:outline-none">
                                        -
                                    </button>
                                </div>


                                <div class=" text-center p-3">
                                    <button id="addToCart"
                                        class="addToCart btn border px-2 py-1 bg-gray-300 rounded hover:bg-gray-200 w-full">Add
                                        to Cart</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class=" flex justify-center mt-3">
                    <div
                        class="rounded-full border-gray-400 border-2 py-2 px-3 uppercase cursor-pointer text-xs tracking-winder hover:bg-gray-400 hover:text-white">
                        Load More</div>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.plus, .minus').click(function() {
                let qtyInput = $(this).closest('.qtyHandler').find('.menu-item-qty');
                let currentQty = parseInt(qtyInput.val(), 10);
                let increment = $(this).hasClass('plus') ? 1 : -1;

                let newQty = currentQty + increment;

                // Disable buttons if new quantity is 0
                if (newQty === 0) {
                    $(this).closest('.qtyHandler').find('.minus').prop('disabled', true);
                } else {
                    $(this).closest('.qtyHandler').find('.plus, .minus').prop('disabled', false);
                }

                qtyInput.val(newQty);
            });

            $('.addToCart').click(function() {
                let parentDiv = $(this).closest('.recpieCard');
                // let name = parentDiv.find('.recpie-name').val();
                let menuItemPrice = parseInt(parentDiv.find('.recpie-price').val());
                let menuItemId = parseInt(parentDiv.find('.recpie-id').val());
                let qtyInput = parentDiv.find('.menu-item-qty');
                let quantity = parentDiv.find('.menu-item-qty').val();

                console.log(menuItemPrice);


                $.ajax({
                    url: "/cart/add",
                    type: "POST",
                    data: {
                        quantity: quantity,
                        menuItemId: menuItemId,
                        menuItemPrice: menuItemPrice,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            qtyInput.val(1)

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
                });

            })
        });
    </script>
</x-layout>
