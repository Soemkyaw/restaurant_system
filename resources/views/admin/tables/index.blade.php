<x-dashboard-layout>


    <div class="w-full flex justify-between items-center mb-5 mt-12 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Table List</h3>
        </div>
        <div class="mx-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <a href="{{ route('table.create') }}" class=" bg-blue-500 text-white py-2 rounded px-3 hover:bg-blue-600">Add New
                        Table</a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Seat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ Str::ucfirst($table->name) }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ $table->seat }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('table.edit',$table->slug) }}" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline me-3">Edit</a>
                        <form action="{{ route('table.destroy',$table->slug) }}" method="POST" class=" inline">
                            @csrf
                            @method('DELETE')
                            <button class="font-semibold text-red-600 dark:text-red-500 hover:underline">Remove</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</x-dashboard-layout>
