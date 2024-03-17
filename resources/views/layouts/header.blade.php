<nav class="bg-black border-gray-200 md:px-12 px-6 lg:px-6 py-4">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <a href="{{ route('pages.index') }}" class="flex items-center">
            <img src="{{ asset('assets/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Westmetric Logo" />
        </a>
        <div class="flex items-center lg:order-2">

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="bg-transparent border-none outline-none focus:outline-none focus:border-none"
                type="button">
                <img src="{{ asset('assets/dropdown.png') }}" class="w-5 h-5 mr-2" alt="dropdown" />
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm border border-blue-400 text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownDefaultButton">
                    @if (Auth::user()->role === 'admin')
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Admin Dashboard</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('pages.starting') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Status</a>
                    </li>
                    <li>
                        <a href="{{ route('pages.record') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Records</a>
                    </li>
                    <li>
                        <a href="{{ route('pages.logout') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                    </li>
                </ul>
            </div>

            <!--<button data-collapse-toggle="mobile-menu-2" type="button"-->
            <!--    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"-->
            <!--    aria-controls="mobile-menu-2" aria-expanded="false">-->
            <!--    <span class="sr-only">Open main menu</span>-->
            <!--    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">-->
            <!--        <path fill-rule="evenodd"-->
            <!--            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"-->
            <!--            clip-rule="evenodd"></path>-->
            <!--    </svg>-->
            <!--    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"-->
            <!--        xmlns="http://www.w3.org/2000/svg">-->
            <!--        <path fill-rule="evenodd"-->
            <!--            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"-->
            <!--            clip-rule="evenodd"></path>-->
            <!--    </svg>-->
            <!--</button>-->
        </div>
    </div>
</nav>