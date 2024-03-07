@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white1 w-4/5 h-4/5 rounded sm:p-10 p-4 my-10 relative">
                <div class="flex flex-col items-center justify-center sm:p-6 p-2">
                    <div class="sm:w-4/5 w-full">
                        <div class="flex justify-between items-center">
                            <a href="{{ route('pages.index') }}">
                                <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            </a>
                            <h3 class="sm:text-3xl text-xl text-center uppercase font-bold text-gray-800 mb-5">T&C Contract Rules</h3>
                            <i class='text-xl'></i>
                        </div>
                        @foreach ($terms as $index => $term)
                        <div class="my-4">
                            <p class="border border-black font-medium rounded-lg text-lg px-5 py-4 w-full text-center mb-2">({{ $index+1 }}) {{ $term['term'] }}</p>
                        </div>
                        @endforeach
                    </div>
                     <div class="mt-4 sm:mt-5 p-2">
                        <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300 text-center ">Copyright © 2022
                            Westmetric. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection

    