<x-layout>
    <div class="bg-cover bg-center h-screen" style="background-image: url('{{ asset('img/sbg.webp') }}')">
        <div>
            <div class="flex flex-col items-center justify-center h-screen dark">
                <div class="bg-white/75 py-24 sm:py-32 w-full">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class=" text-5xl text-center ">
                            Restaurant POS
                        </div>
                        <div class="grid grid-cols-1 gap-x-8 gap-y-8 text-center lg:grid-cols-3 my-5">
                            <div class=" text-xl">Admin</div>
                            <div class=" text-xl">Kitchen</div>
                            <div class=" text-xl">Waiter</div>
                        </div>
                        <div class=" flex justify-center">
                            <div
                                class="max-w-32 bg-transparent rounded items-center justify-center flex border-2 border-blue-500 shadow-lg hover:bg-blue-500 text-blue-500 hover:text-white duration-300 cursor-pointer active:scale-[0.98]">
                                <a href="/login" class="px-8 py-2">Login</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
