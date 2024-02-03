@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C]'>
            <div class='w-full flex justify-center items-center'>
                <div class="bg-[#5D2C66] w-4/5 h-4/5 rounded p-10 my-10 relative">
                    <div class="flex flex-col items-center justify-center p-6">
                        <div class="mx-auto w-3/5">
                            <div class="flex text-white justify-between items-center">
                                <i class='bx bx-chevron-left text-3xl -translate-y-2 cursor-pointer'></i>
                                <h3 class="text-2xl text-center uppercase font-bold mb-5">Start</h3>
                                <i class='text-xl'></i>
                            </div>
                            <div class="flex justify-center items-center relative">
                                <img src="assets/start.png" class="w-4/5 h-4/5" alt="start" />
                                <div class="absolute text-white h-full p-8">
                                    <div class="flex items-center justify-center gap-16 font-bold text-white text-2xl">
                                        <h3 class="">Starting</h3>
                                        <p class="uppercase flex gap-2">Exclusive - 032 <img src="assets/vips2.png"
                                                class="w-6 h-6 translate-y-2 object-contain" alt="line" /></p>
                                    </div>
                                    <div class="flex flex-col gap-4 mt-10">
                                        <div class="flex gap-4">
                                            <div>
                                                <img src="assets/coin.png" class="w-4 h-4 object-contain" alt="line" />
                                            </div>
                                            <div class="text-sm">
                                                <p>Today's Profit</p>
                                                <p class="text-[#1ABBF9]">USDT 0.00</p>
                                            </div>
                                        </div>
                                        <p class="text-white text-sm mx-1">Daily profits will be updated automatically</p>
                                        <hr class="w-full border-1 border-white" />
                                        <div class="flex justify-between items-center">
                                            <div class="flex gap-4">
                                                <div>
                                                    <img src="assets/credit-card.png" class="w-4 h-4 object-contain"
                                                        alt="line" />
                                                </div>
                                                <div class="text-sm">
                                                    <p>Balance</p>
                                                    <p class="text-[#1ABBF9]">USDT 1,072.65</p>
                                                </div>
                                            </div>
                                            <div class="text-sm">
                                                <p>Total Balance</p>
                                                <p class="text-[#1ABBF9]">USDT 1,072.65</p>
                                            </div>
                                        </div>
                                        <p class="text-white text-sm mx-1">Every tasks profit will be added to the total
                                            balance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#795482] h-[60vh] w-full my-4 mt-20 rounded-lg flex justify-center items-center">
                            <div
                                class="h-32 w-32 bg-[#2490E2] rounded-full text-white p-4 flex justify-center items-center gap-4 flex-col">
                                <p>Starting Now</p>
                                <p>17 / 45</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-md text-white p-8 ml-24">
                <p class="font-semibold text-2xl">NOTICE</p>
                <p class="text-base mt-3">
                    Online customer service is available from 9:00 to 23:00
                    For assistance please contact customer service.</p>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
