<x-dashboard-layout>
    <div class="w-full flex justify-between items-center mb-5 mt-12 pl-3">
        <div>
            <h3 class="text-2xl font-semibold text-slate-800">Order List</h3>
        </div>
    </div>

    <div class="flex flex-col justify-center h-full w-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Orders</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Order Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Table Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Total</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Bill</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($orders as $order)
                                <tr class="order">
                                    <td class="p-2 whitespace-nowrap">
                                        <a href="{{ route('order.show', $order->id) }}"
                                            class=" text-center text-blue-500 block">{{ $order->id }}</a>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $order->table->name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500">{{ $order->total_price }} ks
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <input type="text" hidden value="{{ $order->id }}" class="orderId">
                                        <select name="status" class=" statusHandler bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                            <option disabled {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="in preparation"
                                                {{ $order->status == 'in preparation' ? 'selected' : '' }}>In
                                                preparation</option>
                                            <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>
                                                Ready</option>
                                            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid
                                            </option>
                                        </select>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium ">
                                            <!-- Modal toggle -->
                                            <button data-modal-target="static-modal-{{ $order->id }}"
                                                data-modal-toggle="static-modal-{{ $order->id }}"
                                                class="block text-gray-500 hover:text-gray-700 font-medium text-sm"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>

                                            <!-- Main modal -->
                                            <div id="static-modal-{{ $order->id }}" data-modal-backdrop="static"
                                                tabindex="-1" aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-6xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3
                                                                class="text-xl font-semibold text-blue-900 dark:text-white">
                                                                {{ $order->id }}
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="static-modal-{{ $order->id }}">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <div class="max-w-4xl mx-auto bg-white p-6">
                                                            <div class="flex justify-end text-gray-500 font-bold">
                                                                {{-- <button onclick="printModal({{ $order->id }})">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class=" w-7 h-7 hover:text-gray-700">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                                                    </svg>
                                                               </button> --}}
                                                                <a href="{{ route('bill.print', $order->id) }}"
                                                                    target="_blank">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class=" w-7 h-7 hover:text-gray-700">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div
                                                            class="max-w-4xl mx-auto bg-white p-6 mb-10 rounded-lg shadow-lg">
                                                            <!-- Header Section -->
                                                            <div
                                                                class="flex justify-between items-center border-b-2 pb-4 mb-4">
                                                                <div>
                                                                    <h1 class="text-2xl font-bold text-blue-600">
                                                                        Restaurant Name</h1>
                                                                    <p class="text-sm text-gray-600">Street Address</p>
                                                                    <p class="text-sm text-gray-600">Phone Number, Web
                                                                        Address, etc.</p>
                                                                </div>
                                                                <div class="text-right">
                                                                    <h2 class="text-2xl font-bold text-blue-600">TAX
                                                                        INVOICE</h2>
                                                                    <p class="text-sm">DATE:</p>
                                                                    <p class="text-sm">INVOICE #:</p>
                                                                </div>
                                                            </div>

                                                            <!-- Billing Information -->
                                                            <div class="flex justify-between mb-4">
                                                                <div class="w-1/2 border p-4">
                                                                    <h3 class="font-bold text-gray-600">BILL TO</h3>
                                                                    <p class="text-sm">Name</p>
                                                                    <p class="text-sm">Address</p>
                                                                </div>
                                                                <div class="w-1/4 border p-4">
                                                                    <h3 class="font-bold text-gray-600">
                                                                        {{ $order->table->name }}</h3>
                                                                </div>
                                                            </div>

                                                            <!-- Table Section -->
                                                            <table class="w-full text-left border-collapse mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            class="border p-2 bg-blue-100 text-gray-600">
                                                                            Goods</th>
                                                                        <th
                                                                            class="border p-2 bg-blue-100 text-gray-600 text-center">
                                                                            Quantity</th>
                                                                        <th
                                                                            class="border p-2 bg-blue-100 text-gray-600 text-center">
                                                                            Unit Price</th>
                                                                        <th
                                                                            class="border p-2 bg-blue-100 text-gray-600 text-center">
                                                                            Line Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $subTotal = 0;
                                                                    ?>
                                                                    <!-- Repeatable Row -->
                                                                    @foreach ($order->orderItems as $item)
                                                                        <?php
                                                                        $subTotal += $item->price * $item->quantity;
                                                                        ?>
                                                                        <tr>
                                                                            <td class="border p-2">
                                                                                {{ $item->menuItem->name }}
                                                                            </td>
                                                                            <td class="border p-2 text-center">
                                                                                {{ $item->quantity }}</td>
                                                                            <td class="border p-2 text-center">
                                                                                {{ $item->price }} Ks</td>
                                                                            <td class="border p-2 text-center">
                                                                                {{ $item->price * $item->quantity }} Ks
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <!-- Add more rows as needed -->
                                                                </tbody>
                                                            </table>

                                                            <!-- Notes and Totals -->
                                                            <div class="flex justify-between items-start">
                                                                <div class="w-1/2">
                                                                    <h3 class="text-gray-600">NOTES:</h3>
                                                                    <div class="border p-4 h-24"></div>
                                                                </div>
                                                                <div class="w-1/3">
                                                                    <div class="flex justify-between border-b py-1">
                                                                        <span class="text-gray-600">SUBTOTAL:</span>
                                                                        <span
                                                                            class="text-gray-600">{{ number_format($subTotal, 2) }}
                                                                            ks</span>
                                                                    </div>
                                                                    <div class="flex justify-between border-b py-1">
                                                                        <span class="text-gray-600">TAX:</span>
                                                                        <span
                                                                            class="text-gray-600">{{ number_format($order->taxAmount(), 2) }}
                                                                            Ks</span>
                                                                    </div>
                                                                    <div class="flex justify-between font-bold py-1">
                                                                        <span class="text-gray-800">TOTAL:</span>
                                                                        <span
                                                                            class="text-gray-800">{{ number_format($order->totalAmount(), 2) }}
                                                                            Ks</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Footer -->
                                                            <p class="text-center text-gray-600 mt-4">Thank you for
                                                                dining with us!</p>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div
                                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.statusHandler').change(function() {
            $orderStatus = $(this).val();
            $parentTr = $(this).closest('.order');
            $orderId = $parentTr.find('.orderId').val();

            $.ajax({
                url: `/orders/${$orderId}`,
                type: "PATCH",
                data: {
                    status: $orderStatus,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.status === 200) {
                        if (response.orderStatus === 'paid') {
                            $parentTr.remove()
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: `${response.message}`
                        });
                    }

                }
            })
        })

        // function printModal(orderId){
        //     $modal = $("#static-modal-" + orderId)
        //     $printContent = $modal.clone();
        // }
    </script>
</x-dashboard-layout>
