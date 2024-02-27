@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white w-4/5 h-4/5 rounded p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <form action="{{ route('user.info.update') }}" class="w-3/5" method="POST">
                        @csrf
                        @method('put')
                        @if (session('success'))
                        <h3 class="text-center uppercase font-bold text-green-500 mb-5">{{ session('success') }}</h3>
                        @endif
                        <div class="flex justify-between items-center">
                            <a href="{{ route('pages.index') }}">
                                <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            </a>
                            <h3 class="text-3xl text-center uppercase font-bold text-gray-800 mb-5">Profile</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4 flex gap-4 items-center">
                            <div>
                                <img src="assets/avatar.png" class="border border-blue-400 w-32 h-32 rounded-full mx-auto"
                                    alt="avatar" />
                            </div>
                            <div class="flex gap-3 items-center">
                                <p class="text-xl font-semibold mt-4">{{ $user->username }}</p>
                                <img src="assets/vip1.png" class="w-6 h-6 translate-y-2 object-contain" alt="line" />
                            </div>
                        </div>
                        <div class="bg-frame text-white p-6 h-fit w-full rounded-lg">
                            <div class="flex text-lg justify-between items-center">
                                <p>Invitation Code</p>
                                <p>{{ $user->referral_code }}</p>
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
                                <p>USDT {{ number_format($user->balance, 2) }}</p>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="fullname"
                                class="block mb-2 font-medium text-gray-900">Full Name</label>
                            <input type="text" id="fullname" name="full_name" value="{{ old('full_name') ?? $user->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Jane Blow">
                                @error('full_name')
                                    <strong class="text-red-600">{{ $message }}</strong>
                                @enderror    
                        </div>
                        <div class="my-4">
                            <label for="default"
                                class="block mb-2 font-medium text-gray-900">Gender</label>
                            <select id="default" name="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="male" {{ old('gender', $user->gender) == "male" ? "selected" : ""  }}>Male</option>
                                <option value="female" {{ old('gender', $user->gender) == "female" ? "selected" : ""  }}>Female</option>
                                <option value="others" {{ old('gender', $user->gender) == "others" ? "selected" : ""  }}>Others</option>
                            </select>
                            @error('gender')
                                <strong class="text-red-600">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="default"
                                class="block mb-2 font-medium text-gray-900">Country</label>
                            <select id="default" name="country"
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
                                class="block mb-2 font-medium text-gray-900">Old Password</label>
                            <input type="password" id="old_password" name="old_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="*******">
                                @error('old_password')
                                    <strong class="text-red-600">{{ $message }}</strong>
                                @enderror    
                        </div>
                        <div class="my-5 relative">
                            <label for="password" class="block mb-2 font-medium text-gray-900">Password</label>
                            <input type="password" id="password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Minimum of 6-digits">
                            <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle"></i>
                        </div>
                        <div class="mb-5">
                            @error('new_password')
                                <strong class="text-red-600">{{ $message }}</strong>
                            @enderror
                        </div>    
                    
                        <div class="my-4 relative">
                            <label for="confirm_password" class="block mb-2 font-medium text-gray-900">Confirm password</label>
                            <input type="password" id="confirm_password" name="new_password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Minimum of 6-digits">
                            <i class="bx bx-show absolute text-xl bottom-2 right-4 cursor-pointer" id="toggle-confirm"></i>
                        </div> 
                        <div class="flex mt-8 justify-center items-center flex-col">
                            <button type="submit" class="py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Save Changes</button>
                        </div>
                    </form>
                    <div class="absolute bottom-2">
                        <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300">Copyright © 2024
                            Westmetric. All Rights Reserved</p>
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
