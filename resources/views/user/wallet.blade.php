@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="glassmorphism w-4/5 h-4/5 rounded-lg p-16 my-10">
                <form class="mx-auto w-3/5">
                    <div class="mb-5 relative">
                        <label for="password" class="block mb-2 text-lg font-medium text-white">Transaction Password</label>
                        <input type="password" id="password" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Transaction Password" required>
                    </div>
                    <div class="flex justify-center items-center flex-col mt-16">
                        <button type="submit" class="py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
