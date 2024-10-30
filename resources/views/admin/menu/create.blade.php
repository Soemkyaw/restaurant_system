<x-dashboard-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-2xl font-medium text-gray-700">Create New Menu</h3>

            <div class="flex flex-col min-h-screen mt-4">
                <div class=" bg-white shadow-lg rounded-lg p-6 w-full">

                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Menu Item Details</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Provide detailed information for each
                                    menu item. This will be displayed to customers, so ensure accuracy and clarity.</p>


                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="image"
                                            class="block text-sm font-medium leading-6 text-gray-900">Menu
                                            Image</label>
                                        <div
                                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 pb-3">
                                            <div class="text-center">
                                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                    <label for="image"
                                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                        <span>Upload a file</span>
                                                        <input id="image" name="image" type="file"
                                                            class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 10MB</p>
                                            </div>
                                        </div>
                                        <x-error name="image" />
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Menu Details</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">"Provide the essential details for each
                                    menu item, including name, preparation time, and price."</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name"
                                                value="{{ old('name') }}" autocomplete="given-name"
                                                placeholder="Enter username"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="name" />
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="price"
                                            class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                                        <div class="mt-2">
                                            <input id="price" name="price" type="number" autocomplete="price"
                                                placeholder="Enter price" value="{{ old('price') }}"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="price" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="category_id"
                                            class="block text-sm font-medium leading-6 text-gray-900">category</label>
                                        <div class="mt-2">
                                            <select id="category_id" name="category_id"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-error name="category_id" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Is
                                            Available</label>

                                        <div class="mt-4 flex space-x-4">
                                            <div class="flex items-center">
                                                <input type="radio" checked id="availableYes" name="is_available"
                                                    value="1"
                                                    class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                                                <label for="availableYes"
                                                    class="ml-2 text-sm font-medium text-gray-900 leading-6">Yes</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="radio" id="availableNo" name="is_available"
                                                    value="0"
                                                    class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                                                <label for="availableNo"
                                                    class="ml-2 text-sm font-medium text-gray-900 leading-6">No</label>
                                            </div>
                                        </div>

                                        <x-error name="is_available" />
                                    </div>



                                    <div class="sm:col-span-2">
                                        <label for="preparation_time"
                                            class="block text-sm font-medium leading-6 text-gray-900">Preparation
                                            Time</label>
                                        <div class="mt-2">
                                            <input type="number" name="preparation_time" id="preparation_time"
                                                placeholder="Enter Phone No" autocomplete="preparation_time"
                                                value="15"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="preparation_time" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="spicy_level"
                                            class="block text-sm font-medium leading-6 text-gray-900">Spicy
                                            Level</label>
                                        <div class="mt-2">
                                            <input type="number" name="spicy_level" id="spicy_level" value="0"
                                                autocomplete="spicy_level"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="spicy_level" />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="discount"
                                            class="block text-sm font-medium leading-6 text-gray-900">Discount</label>
                                        <div class="mt-2">
                                            <input type="number" name="discount" value="0" id="discount"
                                                autocomplete="discount"
                                                class="block w-full rounded-md border-0 py-3 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-error name="discount" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-between gap-x-6">
                            <div class="">
                                <a href="{{ route('menus') }}" class="text-sm text-blue-500 hover:underline">Back to
                                    menus</a>
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
