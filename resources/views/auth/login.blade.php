@extends('layouts.app')
@section('content')
    <div class='flex min-h-screen justify-center items-center w-full bg-frame'>
        <div class="bg-white w-4/5 lg:w-3/5 h-4/5 rounded py-10 md:px-10 my-10 relative">
            <div class="absolute top-8 right-10 flex items-center gap-2">
                <i class='bx bx-world'></i>
                <a class="underline text-sm font-semibold text-gray-800 dark:text-gray-300">Language</a>
            </div>
            <div class="flex flex-col items-center justify-center py-6 md:px-6">
                <div class="flex items-center justify-center mb-6">
                    <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-full h-full object-cover">
                </div>
                <form action="{{ route('login') }}" method="POST" class="mx-auto w-4/5 md:w-3/5">
                    @csrf
                    <h3 class="text-3xl text-center font-bold text-gray-800 mb-5">Welcome to Westmetric.</h3>
                    @if ($errors->any())
                        <strong class="text-red-600">Invalid credentials</strong>
                    @endif
                    <div class="mb-5">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="jane_blow" required>
                    </div>
                    <div class="mb-5 relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*******" required>
                        <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle"></i>
                    </div>
         
                    <div class="flex items-center mb-6 justify-end">
                        <a href="{{ route('password.request') }}" class="text-blue-800 dark:text-blue-400 text-sm font-semibold">Forgot password?</a>
                    </div>
                    <div class="flex justify-center items-center flex-col">
                        <button type="submit" class="py-2 w-1/2 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Login</button>
                        <p class="text-sm mt-3 font-semibold text-gray-900 dark:text-gray-700">Don't have an account? <a href="{{ route('register') }}" class="text-blue-800 dark:text-blue-400 underline">Register</a></p>
                    </div>
                </form>
                <div class="absolute p-2 bottom-2">
                    <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-700 text-centers">Copyright © 2022 Westmetric. All Rights Reserved</p>
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
    </script>
@endsection
<img src="{{ asset('uploads/images/vips/' . $user->vip->image) }}" class="w-10 h-10 translate-y-2 object-contain" alt="{{ $user->username }}" />  no 15