<x-dashboard-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-2xl font-medium text-gray-700">Create New Staff</h3>

            <div class="flex flex-col min-h-screen mt-4">
                <div class=" bg-white shadow-lg rounded-lg p-6 w-full">

                    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed
                                    publicly so be
                                    careful what you share.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="photo"
                                            class="block text-sm font-medium leading-6 text-gray-900">Avatar</label>
                                        <div class="mt-2 flex items-center gap-x-3">
                                            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                                aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <button type="button"
                                                class="rounded-md bg-white px-2.5 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="cover-photo"
                                            class="block text-sm font-medium leading-6 text-gray-900">Profile
                                            avatar</label>
                                        <div
                                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 pb-3">
                                            <div class="text-center">
                                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                    <label for="avatar"
                                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                        <span>Upload a file</span>
                                                        <input id="avatar" name="avatar" type="file"
                                                            class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 10MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Staff Information</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can
                                    receive
                                    mail.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                autocomplete="given-name" placeholder="Enter username"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="name"/>
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="email"
                                            class="block text-sm font-medium leading-6 text-gray-900">Email
                                            address</label>
                                        <div class="mt-2">
                                            <input id="email" name="email" type="email" autocomplete="email"
                                                placeholder="Enter email"  value="{{ old('email') }}"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="email"/>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="role"
                                            class="block text-sm font-medium leading-6 text-gray-900">Role</label>
                                        <div class="mt-2">
                                            <select id="role" name="role_id"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                @foreach ($roles as $role)
                                                    <option {{ $role->name == "waiter" ? "selected" : "" }} value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="phone_no"
                                            class="block text-sm font-medium leading-6 text-gray-900">Phone No</label>
                                        <div class="mt-2">
                                            <input type="number" name="phone_no" id="phone_no" placeholder="Enter Phone No"
                                                autocomplete="phone_no"  value="{{ old('phone_no') }}"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="address"
                                            class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                                        <div class="mt-2">
                                            <input type="text" name="address" id="address" placeholder="Enter Address"
                                                autocomplete="address"  value="{{ old('address') }}"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="password"
                                            class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="mt-2">
                                            <input type="password" name="password" id="password"
                                                autocomplete="password"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="password"/>
                                        </div>
                                    </div><div class="sm:col-span-3">
                                        <label for="password_confirmation"
                                            class="block text-sm font-medium leading-6 text-gray-900">Password Comfirmation</label>
                                        <div class="mt-2">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                autocomplete="password_confirmation"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-between gap-x-6">
                            <div class="">
                                <a href="{{ route('staffs') }}" class="text-sm text-blue-500 hover:underline">Back to
                                    Staffs</a>
                            </div>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>


                </div>
            </div>

            <div class="mt-8">

            </div>
        </div>
    </main>
</x-dashboard-layout>
