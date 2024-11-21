<x-layout>
    <div class="pt-16">
        <div class="px-5 md:px-16 py-10 bg-gray-100 ">
            <div
                class="w-full max-w-4xl mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Order Items</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700 ">
                        @foreach ($orderItems as $item)
                            <li class="orderItem py-3 sm:py-4 my-2">
                                <div class="flex flex-wrap items-center justify-between">
                                    <div class="flex-shrink-0 w-12 h-12 sm:w-8 sm:h-8">
                                        <img class="w-full h-full rounded-full"
                                            src="{{ asset('storage/' . $item->menuItem->image) }}" alt="Neil image">
                                    </div>

                                    <div class="flex-1 min-w-0 mt-2 ms-2 sm:mt-0 sm:ms-4">
                                        <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                                            {{ $item->menuItem->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Quantity: {{ $item->quantity }}
                                        </p>
                                    </div>

                                    <div
                                        class="text-sm flex-auto font-semibold text-gray-900 dark:text-white mt-2 sm:mt-0 sm:ms-4 w-full sm:w-auto">
                                        Table: {{ $item->order->table->name }}
                                    </div>

                                    <div
                                        class=" text-sm font-semibold text-gray-900 dark:text-white mt-2 sm:mt-0 sm:ms-4 w-full sm:w-auto">
                                        {{-- <form class="max-w-sm mx-auto"> --}}
                                            <input type="text" hidden value="{{ $item->id }}" class="orderItemId">
                                            <select name="orderItemStatus"
                                                class="orderItemStatusHandler border text-sm rounded-lg block w-full p-2.5 {{ $item->status == 'in preparation' ? 'text-blue-500 border-blue-500' : '' }}{{ $item->status == 'ready' ? 'text-green-500 border-green-500' : '' }}{{ $item->status == 'served' ? 'text-red-500 border-red-500' : '' }}">
                                                <option {{ $item->status == 'in preparation' ? 'selected' : '' }}
                                                    disabled>In Preparation</option>
                                                <option {{ $item->status == 'ready' ? 'selected' : '' }} disabled>Ready
                                                </option>
                                                <option value="served" class=" text-red-500">Served</option>
                                            </select>
                                        {{-- </form> --}}

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $orderItems->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.orderItemStatusHandler').change(function() {
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
                            $parentDiv.remove();
                            
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
</x-layout>
