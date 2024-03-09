@extends('layouts.app')
@section('content')
    <link href="css/slide.css" rel="stylesheet" />
    <link href="css/popup.css" rel="stylesheet" />
    <div class='min-h-screen w-full'id="blur">
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#1B0037] to-[#4A0648] relative' id="home">
            <div class="flex items-center md:flex-row flex-col h-full w-full md:p-10 p-4">
                <div class="pl-6 w-full md:w-1/2 text-white">
                    <h1 class="text-3xl font-normal text-white">Welcome</h1>
                    <div class="flex gap-4 items-center">
                        <p class="text-3xl font-semibold mt-4">{{ $user->username }}</p>
                        <img src="{{ asset('uploads/images/vips/' . $user->vip->image) }}" class="w-10 h-10 translate-y-2 object-contain" alt="{{ $user->username }}" />
                    </div>
                </div>
                <div class="flex justify-center items-center w-full md:w-1/2">
                    <img src="assets/bg-1.png" class="w-4/5 h-4/5 object-contain" alt="hero" />
                </div>
                
            </div>
            <div class="absolute h-fit w-full bottom-0 flex justify-center items-center">
                    <div class="md:w-1/2 w-full flex justify-center items-center sm:gap-4 gap-1">
                        <div data-modal-target="default-modal3" data-modal-toggle="default-modal3" class="block text-white bg-[#4A0650] hover:bg-[#1B0037] focus:ring-4 focus:outline-none focus:ring-[#4A0648] font-medium rounded-lg text-sm px-2.5 sm:px-5 py-2.5 text-center cursor-pointer flex flex-col">
                          <i class='bx bx-support sm:text-3xl text-xl'></i>
                          <small class="text-[8px] sm:text-lg">service</small>
                        </div>
                        <div data-modal-target="default-modal1" data-modal-toggle="default-modal1" class="block text-white bg-[#4A0650] hover:bg-[#1B0037] focus:ring-4 focus:outline-none focus:ring-[#4A0648] font-medium rounded-lg text-sm px-2.5 sm:px-5 py-2.5 text-center cursor-pointer flex flex-col">
                           <i class='bx bxs-book-bookmark sm:text-3xl text-xl'></i>
                           <small class="text-[8px] sm:text-lg">Events</small>
                        </div>
                        <div data-modal-target="default-modal5" data-modal-toggle="default-modal5" class="block text-white bg-[#4A0650] hover:bg-[#1B0037] focus:ring-4 focus:outline-none focus:ring-[#4A0648] font-medium rounded-lg text-sm px-2.5 sm:px-5 py-2.5 text-center cursor-pointer">
                         <a href="/terms" class="flex flex-col">
                            <i class='bx bx-spreadsheet sm:text-3xl text-xl'></i>
                            <small class="text-[8px] sm:text-lg">T & C</small>
                         </a>
                        </div>
                        <div data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-[#4A0650] hover:bg-[#1B0037] focus:ring-4 focus:outline-none focus:ring-[#4A0648] font-medium rounded-lg text-sm px-2.5 sm:px-5 py-2.5 text-center cursor-pointer flex flex-col">
                           <i class='bx bxs-info-circle sm:text-3xl text-xl'></i>
                           <small class="text-[8px] sm:text-lg">Mission</small>
                        </div>
                        <div data-modal-target="default-modal4" data-modal-toggle="default-modal4" class="block text-white bg-[#4A0650] hover:bg-[#1B0037] focus:ring-4 focus:outline-none focus:ring-[#4A0648] font-medium rounded-lg text-sm px-2.5 sm:px-5 py-2.5 text-center cursor-pointer flex flex-col">   
                           <i class='bx bx-book-reader sm:text-3xl text-xl'></i>
                           <small class="text-[8px] sm:text-lg">FAQ</small>
                        </div>
                        <div data-modal-target="default-modal2" data-modal-toggle="default-modal2" class="block text-white bg-[#4A0650] hover:bg-[#1B0037] focus:ring-4 focus:outline-none focus:ring-[#4A0648] font-medium rounded-lg text-sm px-2.5 sm:px-5 py-2.5 text-center cursor-pointer flex flex-col">
                           <i class='bx bx-award sm:text-3xl text-xl'></i>
                           <small class="text-[8px] sm:text-lg">Certificate</small>
                        </div>
                    </div>
            </div>
            @include('layouts.start')
            @include('layouts.record')
        </div>
        @include('sub.mission')
        <div class="flex items-center flex-col bg-[#F2F2F2] h-fit w-full md:p-10 p-4 relative contentBx">
            <h3 class="text-center font-bold mb-4 text-lg text-gray-800">VIP LEVEL</h3>
            @php
                $first = true;
            @endphp

            @foreach ($vips->chunk(4) as $chunk)
            
            <div class="content {{ $first ? 'active' : '' }}">
                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 md:gap-6 gap-4 justify-between items-center">
                    @foreach ($chunk as $vip)
                    <div class="card">
                        <img src="{{ asset('uploads/images/vips/' . $vip->image) }}" class="w-1/3 h-1/3 object-contain" alt="{{ $vip->name }}" />
                        <div class="text-white mt-4 text-lg">
                            <h2 class="font-semibold">{{ $vip->name }}</h2>
                            <ul class="list-disc pl-5 mt-3 text-sm">
                                @foreach (json_decode($vip->description) as $des)
                                <li>{{ $des }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @php
                $first = false;
            @endphp
            @endforeach
        </div>
        @include('sub.event')
        @include('sub.cert')
        @include('sub.support')
        <div id="default-modal4" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="absolute right-2 p-4 md:p-5 z-[100]">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal4">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="flex items-center justify-center flex-col bg-white h-fit w-full md:p-10 p-4 relative" id="faq">
                    <h3 class="text-center font-bold mb-4 text-lg text-gray-800">FAQ</h3>
                    <div class="w-full flex justify-center items-center">
                        <div class="accordion">
                            @foreach ($data as $item)
                                <div class="accordionBx">
                                    <div class="label">{{ $item['label'] }}</div>
                                    <div class="contentB">
                                        @foreach ($item['content'] as $index => $contentItem)
                                            <p>{{ $index + 1 }}. {{ $contentItem }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>

    @if (session('user_registered'))
    <div id="popup" class="md:w-[600px]">
        <a href="#" id="close">X</a>
        <div class="flex justify-center items-center flex-col gap-6">
            <div class="w-24 h-24 relative">
                <img src="assets/congrat.png" class="w-full h-full object-cover" />
            </div>
            <div class="w-full text-xl flex justify-center items-center flex-col">
                <h3 class="uppercase font-bold text-2xl mb-6">Congratulations!</h3>
                <p>You have just received </p>
                <span class="text-blue-400 text-center">28 USDT</span>
                <p>as a new member reward</p>
            </div>
        </div>
        {{-- <div class="absolute bottom-2 left-8 md:left-1/4">
            <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300">Copyright © 2022
                Westmetric. All Rights Reserved</p>
        </div> --}}
    </div>
    @endif

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let popup = document.getElementById('popup');
            let close = document.getElementById('close');
            let blur = document.getElementById('blur');

            function toggle() {
                popup.classList.toggle('active');
                blur.classList.toggle('active');
            }

            toggle();
            close.addEventListener('click', toggle);
        });
        // const contentBx = document.querySelector('.contentBx');
        // const slidesText = contentBx.querySelectorAll('.content');
        // var j = 0;
        // const accordion = document.getElementsByClassName("accordionBx");
        // for (var i = 0; i < accordion.length; i++) {
        //     accordion[i].addEventListener("click", function() {
        //         this.classList.toggle("active");
        //     });
        // }

        // function nextSlideText() {
        //     slidesText[j].classList.remove('active');
        //     j = (j + 1) % slidesText.length;
        //     slidesText[j].classList.add('active');
        // }
    </script>
@endsection
