<x-dashboard-layout>
    <div class="w-full flex justify-between items-center mb-5 mt-12 pl-3">
        <div>
            <h3 class="text-2xl font-semibold text-slate-800">Order Items</h3>
        </div>
        {{-- <div class="mx-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <a href="{{ route('menu.create') }}"
                        class=" bg-blue-500 text-white py-2 rounded px-3 hover:bg-blue-600">Add New
                        Menu Item</a>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="flex flex-col justify-center h-full w-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Order Items</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    {{-- <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Order Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Menu Image</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Menu Item</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-right">Quantity</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-right">Price</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-cneter">Status</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($orderItems as $item)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <a href="{{ route('order.show', $item->id) }}"
                                            class=" text-center text-blue-500 block">{{ $item->order_id }}</a>
                                    </td>
                                    <td class=" p-2 whitespace-nowrap">
                                        <div class=" flex justify-center">
                                            <div class=" w-28 h-20">
                                                <img src="{{ asset('storage/' . $item->menuItem->image) }}"
                                                    class="w-28 h-20 rounded-xl">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $item->menuItem->name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center font-medium ">{{ $item->quantity }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-right font-medium text-green-500">{{ $item->price }} ks
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center font-medium ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                            </svg>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Order Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Menu Image</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Menu Item</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Quantity</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Price</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Status</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($orderItems as $item)
                                <tr class="orderItem">
                                    <td class="p-2 whitespace-nowrap">
                                        <a href="{{ route('order.show', $item->id) }}"
                                            class="text-center text-blue-500 block">{{ $item->order_id }}</a>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <img src="{{ asset('storage/' . $item->menuItem->image) }}"
                                                class="w-28 h-20 rounded-xl">
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $item->menuItem->name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center font-medium">{{ $item->quantity }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center font-medium text-green-500">{{ $item->price }} ks</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex justify-center">
                                            <input type="text" hidden value="{{ $item->id }}" class="orderItemId">
                                            <select name="itemStatus"
                                                class=" itemStatusHandler bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                                <option disabled {{ $item->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="in preparation"
                                                    {{ $item->status == 'in preparation' ? 'selected' : '' }}>In
                                                    preparation</option>
                                                <option value="ready" {{ $item->status == 'ready' ? 'selected' : '' }}>
                                                    Ready</option>
                                                <option disabled {{ $item->status == 'served' ? 'selected' : '' }}>
                                                    Served</option>
                                            </select>
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
        $(document).ready(function() {
            $('.itemStatusHandler').change(function(){
                $orderItemStatus = $(this).val();
                $parentDiv = $(this).closest('.orderItem');
                $orderItemId = $parentDiv.find('.orderItemId').val();

                $.ajax({
                url: `/order-items/update/${$orderItemId}`,
                type: "PATCH",
                data: {
                    status: $orderItemStatus,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.status === 200) {
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
        });
    </script>
</x-dashboard-layout>
