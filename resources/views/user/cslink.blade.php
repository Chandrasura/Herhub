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
                        @foreach ($supports as $support)
                        <div class="my-4">
                            <a type="button" href="{{ $support->link }}" target="_blank" class="bg-none border border-black transition font-medium rounded-lg text-lg px-5 py-4 w-full text-black text-center inline-flex items-center me-2 mb-2">{{ $support->name }}</a>
                        </div>
                        @endforeach
                    </div>
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
