@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            <nav class="bg-black border-gray-200 px-12 lg:px-6 py-4">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="/" class="flex items-center">
                        <img src="assets/logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    </a>
                    <div class="flex items-center lg:order-2">

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="bg-transparent border-none outline-none focus:outline-none focus:border-none"
                            type="button">
                            <img src="assets/dropdown.png" class="w-5 h-5 mr-2" alt="dropdown" />
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm border border-blue-400 text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="/profile"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Profile</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Status</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Records</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">T
                                        & C</a>
                                </li>
                            </ul>
                        </div>

                        <button data-collapse-toggle="mobile-menu-2" type="button"
                            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#"
                                    class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#about"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About
                                    Us</a>
                            </li>
                            <li>
                                <a href="#certificate"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Certification</a>
                            </li>
                            <li>
                                <a href="#customer"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Customer
                                    Service</a>
                            </li>
                            <li>
                                <a href="#faq"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#1B0037] to-[#4A0648] flex justify-center items-center'>
            <div class="bg-white w-4/5 h-4/5 rounded p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <form class="w-3/5">
                        <div class="flex justify-between items-center">
                            <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            <h3 class="text-3xl text-center uppercase font-bold text-gray-800 mb-5">Profile</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4 flex gap-4 items-center">
                            <div>
                                <img src="assets/avatar.png" class="border border-blue-400 w-32 h-32 rounded-full mx-auto"
                                    alt="avatar" />
                            </div>
                            <div class="flex gap-3 items-center">
                                <p class="text-xl font-semibold mt-4">EXCLUSIVE - 032</p>
                                <img src="assets/vip1.png" class="w-6 h-6 translate-y-2 object-contain" alt="line" />
                            </div>
                        </div>
                        <div class="bg-frame text-white p-6 h-fit w-full rounded-lg">
                            <div class="flex text-lg justify-between items-center">
                                <p>Invitation Code</p>
                                <p>JHER45</p>
                            </div>
                            <div class="flex text-lg justify-between items-center mt-4">
                                <p>Credit Score</p>
                                <div class="max-w-sm">
                                    <input id="default-range" type="range" value="100"
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                </div>
                            </div>
                        </div>
                        <div class="bg-frame text-white p-6 h-fit w-full rounded-lg mt-4 flex justify-between">
                            <div class="w-1/2 flex text-lg gap-4 flex-col border-r border-white">
                                <p class="text-gray-300">Total Profit</p>
                                <p>USDT 0.00</p>
                            </div>
                            <div class="flex text-lg gap-4 flex-col">
                                <p class="text-gray-300">Total Balance</p>
                                <p>USDT 1,066.53</p>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="fullname"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" id="fullname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jane Blow" required>
                        </div>
                        <div class="my-4">
                            <label for="default"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Gender</label>
                            <select id="default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="male">Male</option>
                                <option selected value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="my-4">
                            <label for="default"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Country</label>
                            <select id="default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="nigeria">Nigeria</option>
                                <option selected value="Australia">Australia</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="my-4">
                            <p class="text-black2 text-2xl font-semibold">Change Password</p>
                        </div>
                        <div class="my-4">
                            <label for="old_password"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Old Password</label>
                            <input type="password" id="old_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="*******" required>
                        </div>
                        <div class="my-5 relative">
                            <label for="password" class="block mb-2 font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Minimum of 6-digits" required>
                            <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle"></i>
                        </div>
                    
                        <div class="my-4 relative">
                            <label for="confirm_password" class="block mb-2 font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Minimum of 6-digits" required>
                            <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle-confirm"></i>
                        </div> 
                        <div class="flex mt-8 justify-center items-center flex-col">
                            <button type="submit" class="py-2 w-1/2 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Save Changes</button>
                        </div>
                    </form>
                    <div class="absolute bottom-2">
                        <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300">Copyright © 2024
                            Growthcurve. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <script>
        function togglePasswordVisibility(inputId, toggleId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleId);

            toggleIcon.onclick = function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('bx-show');
                    toggleIcon.classList.add('bx-hide');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.add('bx-show');
                    toggleIcon.classList.remove('bx-hide');
                }
            };
        }

        // Call the function for each password input field
        togglePasswordVisibility('password', 'toggle');
        togglePasswordVisibility('confirm_password', 'toggle-confirm');
    </script>
@endsection
