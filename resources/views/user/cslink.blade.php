@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white1 w-4/5 h-4/5 rounded p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <div class="w-3/5">
                        <div class="flex justify-between items-center">
                            <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            <h3 class="text-3xl text-center uppercase font-bold text-gray-800 mb-5">Customer Service Lists</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4">
                            <button type="button"
                                class="bg-none border border-black transition font-medium rounded-lg text-lg px-5 py-4 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                Telegram Service 1
                            </button>
                        </div>
                        <div class="my-4">
                            <button type="button"
                                class="bg-none border border-black transition font-medium rounded-lg text-lg px-5 py-4 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                Telegram Service 2
                            </button>
                        </div>
                        <div class="my-4">
                            <button type="button"
                                class="bg-none border border-black transition font-medium rounded-lg text-lg px-5 py-4 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                Telegram Service 3
                            </button>
                        </div>
                    </div>
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
