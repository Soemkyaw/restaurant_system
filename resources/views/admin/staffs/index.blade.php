<x-dashboard-layout>
        <div class="w-full flex justify-between items-center mb-5 mt-12 pl-3">
        <div>
            <h3 class="text-2xl font-semibold text-slate-800">Category List</h3>
            {{-- <p class="text-slate-500">Review your selected items.</p> --}}
        </div>
        <div class="mx-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <a href="{{ route('category.create') }}" class=" bg-blue-500 text-white py-2 rounded px-3 hover:bg-blue-600">Add New
                        Category</a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h1>Hi</h1>
    </div>
</x-dashboard-layout>
