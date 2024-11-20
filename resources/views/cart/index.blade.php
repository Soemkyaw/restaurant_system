<x-layout>
    <section class=" pt-16 bg-gray-100">
        <div class="h-screen  pt-20 mx-auto">
            <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="rounded-lg md:w-2/3">
                    @foreach ($carts as $cart)
                        <!-- cart card -->
                        <div
                            class="cart-{{ $cart->id }} justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                            <img src="{{ asset('storage/' . $cart->menuItem->image) }}" alt="product-image"
                                class="w-full rounded-lg sm:w-40" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">{{ $cart->menuItem->name }}</h2>
                                    <p class="mt-1 text-xs text-gray-700">{{ number_format($cart->menuItem->price) }} Ks
                                    </p>
                                </div>
                                <div
                                    class="qtyHandler mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6 ">
                                    <input class="recpie-price" value="{{ $cart->menuItem->price }}" hidden>
                                    <input class="cartId" value="{{ $cart->id }}" hidden>
                                    <div class="flex items-center border-gray-100 ">
                                        <button
                                            class="plus cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                            + </button>
                                        <input
                                            class="h-8 w-8 border bg-white text-center text-xs outline-none recpie-qty"
                                            min="1" type="number" value="{{ (int) $cart->quantity }}" />
                                        <button
                                            class="minus cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                            - </button>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <p class="text-sm text-green-600 itemSubTotal">
                                            {{ number_format($cart->quantity * $cart->menuItem->price) }} Ks</p>

                                        <!-- remove cart -->
                                        <button class="btn btn-danger remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Sub total -->
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <hr class="my-4" />
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">Total</p>
                            <div class="">
                                <p class="mb-1 text-lg font-bold subTotal">{{ number_format($subTotal, 2) }} Ks
                                </p>
                                <input type="number" hidden name="subTotal" class="total"
                                    value="{{ $subTotal }}">
                            </div>
                        </div>
                        <select name="table_id"
                            class=" w-full border border-gray-400 mt-6 py-1 text-center rounded bg-gray-200">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit"
                            class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Order
                            Now</button>
                    </form>
                    <a href="{{ route('menu') }}" class="text-sm text-blue-600 hover:underline block mt-3">back to
                        menu</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            // quantity handler
            $('.plus, .minus').click(function() {
                let qtyInput = $(this).closest('.qtyHandler').find('.recpie-qty');
                let itemSubTotal = $(this).closest('.qtyHandler').find('.itemSubTotal');
                let itemPrice = $(this).closest('.qtyHandler').find('.recpie-price').val();
                let cartId = $(this).closest('.qtyHandler').find('.cartId').val();
                let currentQty = parseInt(qtyInput.val(), 10);
                let increment = $(this).hasClass('plus') ? 1 : -1;
                let newQty = currentQty + increment;

                if (newQty === 1) {
                    $(this).closest('.qtyHandler').find('.minus').prop('disabled', true);
                } else {
                    $(this).closest('.qtyHandler').find('.plus, .minus').prop('disabled', false);
                }

                $.ajax({
                    url: "/cart/update",
                    type: "PATCH",
                    data: {
                        quantity: newQty,
                        id: cartId,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            qtyInput.val(newQty);
                            itemSubTotal.text((newQty * itemPrice).toLocaleString() + " Ks");
                            $('.subTotal').text((response.subTotal).toLocaleString() + " Ks");
                            $('.total').val(response.subTotal)
                        }
                    }
                });

            });

            // remove cart handler
            $('.remove').click(function() {

                $cartId = $(this).closest('.qtyHandler').find('.cartId').val();
                $cart = "cart-" + $cartId

                $.ajax({
                    url: `/cart/destroy/${$cartId}`,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            $(`.${$cart}`).remove()
                            $('.subTotal').text((response.subTotal).toLocaleString() + " Ks")
                            $('.total').val(response.subTotal)
                        }
                    }
                })
            })
        });
    </script>
</x-layout>
