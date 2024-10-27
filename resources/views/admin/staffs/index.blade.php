<x-dashboard-layout>
    <div class="w-full flex justify-between items-center mb-5 mt-12 pl-3">
        <div>
            <h3 class="text-2xl font-semibold text-slate-800">Staff List</h3>
        </div>
        <div class="mx-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <a href="{{ route('staff.create') }}"
                        class=" bg-blue-500 text-white py-2 rounded px-3 hover:bg-blue-600">Add New
                        Staff</a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center h-full w-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Staffs</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Role</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                                @if ($user->avatar)
                                                    <img class="rounded-full"
                                                        src="{{ asset('storage/' . $user->avatar) }}"
                                                        style="width: 40px; height:40px;" alt="{{ $user->name }}">
                                                @else
                                                    <img class="rounded-full"
                                                        src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg"
                                                        style="width: 40px; height:40px;" alt="{{ $user->name }}">
                                                @endif
                                            </div>
                                            <div class="font-medium text-gray-800">{{ $user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $user->email }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500">{{ $user->role->name }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div x-data="{ dropdownOpen: false }" class="relative">
                                                <button @click="dropdownOpen = !dropdownOpen"
                                                    class="relative inline-flex justify-center rounded overflow-hidden px-3 py-2 shadow focus:outline-none">
                                                    Action
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>

                                                <div x-cloak x-show="dropdownOpen" @click.away="dropdownOpen = false"
                                                    class=" fixed top-auto left-auto z-50 w-24 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                                                    <a href="{{ route('staff.show', $user->slug) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">View</a>
                                                    <a href="{{ route('staff.edit', $user->slug) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Edit</a>
                                                    <form action="{{ route('staff.delete', $user->slug) }}"
                                                        method="POST"
                                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-red-600 hover:text-white">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="">
                                                    </form>
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




</x-dashboard-layout>
