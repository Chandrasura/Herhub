@extends('layouts.app')
@section('content')
    <link href="css/tabs.css" rel="stylesheet" />
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="glassmorphism w-4/5 h-4/5 rounded-lg p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <form class="w-4/5">
                        <div class="flex justify-between items-center text-white">
                            <a href="{{ route('pages.index') }}">
                                <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            </a>
                            <h3 class="text-3xl text-center uppercase font-bold mb-5">Records</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4">
                            <div class="mb-4 flex justify-center items-center w-full">
                                <ul class="flex rounded-lg w-full flex-wrap -mb-px text-sm font-medium text-center bg-white text-frame items-center py-2.5"
                                    id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                    <li class="w-1/4" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="all-tab" data-tabs-target="#all"
                                            type="button" role="tab" aria-controls="all"
                                            aria-selected="false">All</button>
                                    </li>
                                    <li class="w-1/4" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="pending-tab"
                                            data-tabs-target="#pending" type="button" role="tab"
                                            aria-controls="pending" aria-selected="false">Pending</button>
                                    </li>
                                    <li class="w-1/4" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="completed-tab"
                                            data-tabs-target="#completed" type="button" role="tab"
                                            aria-controls="completed" aria-selected="false">Completed</button>
                                    </li>
                                    <li class="w-1/4" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="undone-tab" data-tabs-target="#undone"
                                            type="button" role="tab" aria-controls="undone"
                                            aria-selected="false">Undone</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="default-tab-content" class="mt-8">
                                <div class="hidden p-4" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="my-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <small class="text-white">2024-01-28 18:25:13</small>
                                            <button
                                                class="bg-green-600 rounded-[20px] px-4 text-sm py-2 text-white">Completed</button>
                                        </div>
                                        <div class="flex bg-[#5F3B71] flex-col p-4 text-white gap-4">
                                            <div class="flex gap-6">
                                                <div>
                                                    <img src="assets/all1.png" alt="All"
                                                        class="w-20 h-20 object-contain">
                                                </div>
                                                <div class="text-md">
                                                    <p>USB3.0 Hard Drive Converter Cable USB 3.0 To Sata</p>
                                                    <p>Adapter Converter Cable For Samsung Seagate WD...</p>
                                                </div>
                                            </div>
                                            <hr class="w-full border border-white">
                                            <div class="flex justify-between items-center text-sm">
                                                <div>
                                                    <p>Total Amount</p>
                                                    <p class="font-semibold">USDT 378.00</p>
                                                </div>
                                                <div>
                                                    <p>Profit</p>
                                                    <p class="font-semibold">USDT 1.19</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <small class="text-white">2024-01-28 18:25:13</small>
                                            <button
                                                class="bg-green-600 rounded-[20px] px-4 text-sm py-2 text-white">Completed</button>
                                        </div>
                                        <div class="flex bg-[#5F3B71] flex-col p-4 text-white gap-4">
                                            <div class="flex gap-6">
                                                <div>
                                                    <img src="assets/all2.png" alt="All"
                                                        class="w-20 h-20 object-contain">
                                                </div>
                                                <div class="text-md">
                                                    <p>100% Original Smok Nfix Replacement Cartridge 0.8 </p>
                                                    <p>Ohm Mesh / MTL</p>
                                                </div>
                                            </div>
                                            <hr class="w-full border border-white">
                                            <div class="flex justify-between items-center text-sm">
                                                <div>
                                                    <p>Total Amount</p>
                                                    <p class="font-semibold">USDT 378.00</p>
                                                </div>
                                                <div>
                                                    <p>Profit</p>
                                                    <p class="font-semibold">USDT 1.19</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <small class="text-white">2024-01-28 18:25:13</small>
                                            <button
                                                class="bg-green-600 rounded-[20px] px-4 text-sm py-2 text-white">Completed</button>
                                        </div>
                                        <div class="flex bg-[#5F3B71] flex-col p-4 text-white gap-4">
                                            <div class="flex gap-6">
                                                <div>
                                                    <img src="assets/all3.png" alt="All"
                                                        class="w-20 h-20 object-contain">
                                                </div>
                                                <div class="text-md">
                                                    <p>IsALifestyle Baby Zip Swaddle Instant Sleeping Bag </p>
                                                    <p> Cotton Bedung Bayi New Born Sleep Bag Size S&amp;L(0-12M)</p>
                                                </div>
                                            </div>
                                            <hr class="w-full border border-white">
                                            <div class="flex justify-between items-center text-sm">
                                                <div>
                                                    <p>Total Amount</p>
                                                    <p class="font-semibold">USDT 378.00</p>
                                                </div>
                                                <div>
                                                    <p>Profit</p>
                                                    <p class="font-semibold">USDT 1.19</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden p-4 rounded-lg bg-frame" id="pending" role="tabpanel"
                                    aria-labelledby="pending-tab">
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT 0.00</p>
                                    </div>
                                </div>
                                <div class="hidden p-4 rounded-lg bg-frame" id="completed" role="tabpanel"
                                    aria-labelledby="completed-tab">
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT 0.00</p>
                                    </div>
                                </div>
                                <div class="hidden p-4 rounded-lg bg-frame" id="undone" role="tabpanel"
                                    aria-labelledby="undone-tab">
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT 0.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
