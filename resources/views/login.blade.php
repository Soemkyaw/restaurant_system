<x-layout>
    <div class="bg-cover bg-center h-screen" style="background-image: url('{{ asset('img/sbg.webp') }}')">
        <div>
            <div class="flex flex-col items-center justify-center h-screen dark">
                <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-200 text-center mb-5">Restaurant Login</h2>
                    <form action="{{ route('login.check') }}" method="POST" class="flex flex-col">
                        @csrf
                        <label class=" text-white/50 my-2">Email</label>
                        <input
                            class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            type="email" name="email" value="{{ old('email') }}">
                        <x-error name="email"/>
                        <label class=" text-white/50 my-2">Password</label>
                        <input
                            class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            type="password" name="password">
                        <x-error name="password"/>
                        <button
                            class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150"
                            type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
