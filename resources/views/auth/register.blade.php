@extends('layouts.app')
@section('content')
    <div class='flex min-h-screen justify-center items-center w-full bg-frame'>
        <div class="bg-white w-3/5 h-4/5 rounded p-10 my-10 relative">
            <div class="flex flex-col items-center justify-center p-6">
                <div class="flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-full h-full object-cover">
                </div>
                <form class="mx-auto">
                    <h3 class="text-3xl text-center font-bold text-gray-800 mb-5">Create your account to unlock exclusive
                        features.</h3>
                    <div class="mb-5">
                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                            Name</label>
                        <input type="text" id="fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Full Name" required>
                    </div>
                    <div class="mb-5">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="jane_blow" required>
                    </div>
                    <div class="mb-5">
                        <label for="phone_number"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <div class="flex items-center">
                            <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                            +1 <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                            </button>
                            <div id="dropdown-phone" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-phone-button">
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            <div class="inline-flex items-center">
                                                United States (+1)
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            <div class="inline-flex items-center">
                                                United Kingdom (+44)
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            <div class="inline-flex items-center">
                                                Australia (+61)
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            <div class="inline-flex items-center">
                                                Germany (+49)
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            <div class="inline-flex items-center">
                                                France (+33)
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            <div class="inline-flex items-center">
                                                Germany (+49)
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <label for="phone-input" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone number:</label>
                            <div class="relative w-full">
                                <input type="text" id="phone-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="default"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="default"
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="withdrawal_pin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Withdrawal Pin</label>
                        <input type="number" id="withdrawal_pin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="4-digit pin" required>
                    </div>
                    <div class="mb-5 relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Minimum of 6-digits" required>
                        <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle"></i>
                    </div>
                
                    <div class="mb-5 relative">
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Minimum of 6-digits" required>
                        <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle-confirm"></i>
                    </div> 
                    <div class="flex items-center mb-6">
                        <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree to the T&Cs</label>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <button type="submit" class="py-2 w-1/2 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Register</button>
                        <p class="text-sm mt-3 font-semibold text-gray-900 dark:text-gray-300">Already have an account? <a href="/login" class="text-blue-800 dark:text-blue-400 underline">Login</a></p>
                    </div>
                </form>
                <div class="absolute bottom-2">
                    <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300">Copyright © 2024 Growthcurve. All Rights Reserved</p>
                </div>
            </div>
        </div>
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
