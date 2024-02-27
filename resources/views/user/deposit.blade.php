@extends('layouts.app')
@section('content')
    <link href="css/tabs.css" rel="stylesheet" />
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white1 w-4/5 h-4/5 rounded-lg p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <form class="w-3/5">
                        <div class="flex justify-between items-center">
                            <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            <h3 class="text-3xl text-center uppercase font-bold text-gray-800 mb-5">Deposit</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4">
                            <div class="mb-4 flex justify-center items-center w-full">
                                <ul class="flex rounded-lg w-4/5 flex-wrap -mb-px text-sm font-medium text-center bg-white text-frame"
                                    id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                    <li class="w-1/2" role="presentation">
                                        <button class="py-3 px-6 w-full rounded-lg text-[#84269C]" id="profile-tab"
                                            data-tabs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Deposits</button>
                                    </li>
                                    <li class="w-1/2" role="presentation">
                                        <button class="py-3 px-6 w-full rounded-lg text-[#84269C]" id="dashboard-tab"
                                            data-tabs-target="#dashboard" type="button" role="tab"
                                            aria-controls="dashboard" aria-selected="false">History</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="default-tab-content" class="mt-8">
                                <div class="hidden p-4 rounded-lg bg-frame" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Balance</p>
                                        <p class="text-xl">USDT {{ $user->available_balance }}</p>
                                    </div>
                                </div>
                                <div class="hidden p-4 rounded-lg bg-frame" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT 0.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex my-20 justify-center items-center flex-col">
                            <a type="button" href="{{ route('pages.support') }}" class="text-center py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Customer Service</a>
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
@endsection
