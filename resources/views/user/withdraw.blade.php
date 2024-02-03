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
                                            aria-controls="profile" aria-selected="false">Withdraw</button>
                                    </li>
                                    <li class="w-1/2" role="presentation">
                                        <button class="py-3 px-6 w-full rounded-lg text-[#84269C]" id="dashboard-tab"
                                            data-tabs-target="#dashboard" type="button" role="tab"
                                            aria-controls="dashboard" aria-selected="false">History</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="default-tab-content" class="mt-8">
                                <div class="hidden p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div
                                        class="flex rounded-lg bg-frame flex-col p-4 text-white gap-4 justify-center items-center mb-8">
                                        <p class="text-gray-300 text-lg">Total Balance</p>
                                        <p class="text-xl">USDT 1,066.53</p>
                                        <small>Withdrawal process usually takes 5-10 min.</small>
                                    </div>
                                    <form class="">
                                        <div class="font-medium text-md">
                                            <p>Withdraw Method</p>
                                            <p class="text-frame my-4">Withdrawal will be transferred USDT</p>
                                        </div>
                                        <div class="my-4">
                                            <label for="amount"
                                                class="block mb-2 font-medium text-black2 text-lg">Withdrawal Amount</label>
                                            <input type="number" id="amount"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="0.00" required>
                                        </div>
                                        <div class="my-4">
                                            <label for="pin"
                                                class="block mb-2 font-medium text-black2 text-lg">Withdrawal Pin</label>
                                            <input type="number" id="pin"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="4-digits Pin" required>
                                        </div>
                                        <div class="flex my-10 justify-center items-center flex-col">
                                            <button type="submit"
                                                class="py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Submit</button>
                                        </div>
                                    </form>
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
@endsection
