<x-dashboard-layout>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-2xl font-medium text-gray-700">Create New Role</h3>

            <div class="flex flex-col min-h-screen mt-4">
                <div class=" bg-gray-900 shadow-lg rounded-lg p-6 w-full max-w-md">
                    <form action="{{ route('role.store') }}" method="POST" class="w-full">
                        @csrf
                        <div class="mb-3">
                            <label for="role_name" class="block font-medium text-white/75 mb-2">Role
                                Name</label>
                            <input type="text" name="name" id="role_name" placeholder="Enter role name"
                                class="block w-full border border-gray-300 rounded-md px-3 py-2 mb-2 focus:outline-none focus:ring focus:ring-blue-500"
                                value="{{ old('name') }}">
                                <x-error name="name"/>
                        </div>
                        <button type="submit"
                            class=" bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700 transition duration-200">Create</button>
                    </form>

                    <div class="mt-4">
                        <a href="/roles" class="text-sm text-blue-500 hover:underline">Back to roles</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-dashboard-layout>
