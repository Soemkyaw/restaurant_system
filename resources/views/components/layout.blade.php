<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant SYS</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <nav class="bg-white/70 fixed w-full shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('menu') }}" class="text-2xl font-bold text-indigo-600">MyLogo</a>
                </div>

                <!-- Toggle button for mobile -->
                <div class="flex items-center sm:hidden">
                    <button id="nav-toggle" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Nav links -->
                <div class="hidden sm:flex space-x-4 items-center">
                    <a href="{{ route('order.items') }}"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Orders</a>
                    <a href="{{ route('menu') }}"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Menu</a>
                    <a href="#"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Profile</a>
                    <a href="#"
                        class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="nav-menu" class="sm:hidden mt-2 space-y-1 hidden">
                <a href="#"
                    class="block text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-base font-medium">Orders</a>
                <a href="#"
                    class="block text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-base font-medium">Menu</a>
                <a href="#"
                    class="block text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-base font-medium">Profile</a>
                <a href="#"
                    class="block text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-base font-medium">Logout</a>
            </div>
        </div>
    </nav>


    {{ $slot }}

    <x-sweet-alerts></x-sweet-alerts>

    <footer class="bg-gray-800 text-gray-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-wrap justify-between">
                <!-- About Section -->
                <div class="w-full sm:w-1/3 mb-6 sm:mb-0">
                    <h3 class="text-lg font-semibold text-white">About Us</h3>
                    <p class="mt-2 text-sm">
                        Welcome to our restaurant! Enjoy the finest cuisine made with love and the freshest ingredients.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="w-full sm:w-1/3 mb-6 sm:mb-0">
                    <h3 class="text-lg font-semibold text-white">Quick Links</h3>
                    <ul class="mt-2 space-y-2">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">Menu</a></li>
                        <li><a href="#" class="hover:text-white">Reservations</a></li>
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="w-full sm:w-1/3">
                    <h3 class="text-lg font-semibold text-white">Contact Us</h3>
                    <p class="mt-2 text-sm">123 Food Street, Culinary City</p>
                    <p class="text-sm">Phone: +123-456-7890</p>
                    <p class="text-sm">Email: info@restaurant.com</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-4 text-center">
                <p class="text-sm">© {{ date('Y') }} Restaurant. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        document.getElementById('nav-toggle').addEventListener('click', () => {
            document.getElementById('nav-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
