<x-dashboard-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container px-6 py-8 mx-auto">
            <h3 class="text-3xl font-medium text-gray-700">{{ Str::ucfirst($user->name) }} Profile</h3>

            <div class="mt-4">
                <div class="bg-white w-full rounded-lg shadow-lg overflow-hidden">
                    <!-- Cover Photo -->
                    <div class="relative h-32 bg-gray-800">
                        <!-- Profile Picture -->
                        <div class="absolute bottom-0 transform translate-y-1/2 left-1/2 -translate-x-1/2">
                            @if ($user->avatar)
                                <img class="w-24 h-24 rounded-full border-4 border-white"
                                src="{{ asset('storage/'.$user->avatar) }}" alt="User Profile">
                            @else
                                <img class="w-24 h-24 rounded-full border-4 border-white"
                                src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Profile">
                            @endif
                        </div>
                    </div>

                    <!-- Profile Info -->
                    <div class="p-6 pt-12 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                        <a href="mailto:{{ $user->email }}" class="text-gray-500">{{ $user->email }}</a>

                        <!-- Stats -->
                        <div class="mt-6 flex-col justify-around">
                            <div class="text-center mb-5">
                                <span class="text-gray-500 font-bold underline">Phone No</span>
                                <a href="tel:{{ $user->phone_no }}" class="block text-xl font-bold text-gray-800">
                                    {{ $user->phone_no }}
                                </a>

                            </div>
                            <div class="text-center  mb-5">
                                <span class="text-gray-500 font-bold underline">Role</span>
                                <span class="block text-xl font-bold text-green-600">
                                    {{ $user->role->name }}
                                </span>
                            </div>
                            <div class="text-center  my-2">
                                <span class="text-gray-500 font-bold">Address</span>
                                <span class="block text-xl font-bold text-gray-800">
                                    {{ $user->address }}
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-6 flex justify-center space-x-4">
                            <a href="{{ route('staffs') }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Back</a>
                            <a href="{{ route('staff.edit',$user->slug) }}"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Edit</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-8">

            </div>
        </div>
    </main>
</x-dashboard-layout>
