@extends('layouts.app')
@section('content')
    <link href="css/slide.css" rel="stylesheet" />
    <link href="css/popup.css" rel="stylesheet" />
    <div class='min-h-screen w-full'id="blur">
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#1B0037] to-[#4A0648]' id="home">
            <div class="flex items-center md:flex-row flex-col h-full w-full p-10">
                <div class="pl-6 w-full md:w-1/2 text-white">
                    <h1 class="text-3xl font-normal text-white">Welcome</h1>
                    <div class="flex gap-4 items-center">
                        <p class="text-3xl font-semibold mt-4">{{ $user->username }}</p>
                        
                    </div>
                </div>
                <div class="flex justify-center items-center w-full md:w-1/2">
                    <img src="assets/bg-1.png" class="w-4/5 h-4/5 object-contain" alt="hero" />
                </div>
            </div>
            @include('layouts.start')
            @include('layouts.record')
        </div>
        <div class="flex items-center md:flex-row flex-col bg-white h-fit w-full md:p-10 p-4" id="about">
            <div class="flex w-full md:w-1/2 justify-center items-center">
                <img src="assets/aero.png" class="w-3/5 h-3/5 object-contain" alt="hero" />
            </div>
            <div class="pl-6 w-full md:w-1/2 text-black">
                <div class="max-w-md">
                    <h1 class="text-3xl font-normal text-black mb-5">Our Mission</h1>
                    <p>Westmetric is a growth marketing agency focused on helping modern businesses use data to be more
                        creative, remove guesswork, and grow.
                        We are a squad of growth marketers, designers, engineers, data scientists, and mathematicians who
                        unlock explosive growth for tech companies and startups. We’re crazy about data and driven by the
                        notion of integrity.</p>
                </div>
            </div>
        </div>
        <div class="flex items-center flex-col bg-[#F2F2F2] h-fit w-full md:p-10 p-4 relative contentBx">
            <h3 class="text-center font-bold mb-4 text-lg text-gray-800">VIP LEVEL</h3>
            @php
                $first = true;
            @endphp

            @foreach ($vips->chunk(4) as $chunk)
            
            <div class="content {{ $first ? 'active' : '' }}">
                <div class="grid md:grid-cols-4 grid-cols-2 gap-6">
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
            <ul class="controls">
                <li onclick="nextSlideText()">
                    <img src="{{ asset('assets/next.png') }}" class="w-10 cursor-pointer object-contain h-10" alt="arrow" />
                </li>
            </ul>
        </div>
        <div class="flex items-center flex-col bg-white h-fit w-full p-10 relative" id="events">
            <h3 class="text-center font-bold mb-4 text-xl text-gray-800">EVENTS</h3>
            <div class="bg-white1 md:p-10 p-4 w-full rounded-md flex flex-col justify-center items-center">
                <div>
                    <img src="assets/event1.png" class="w-full h-full md:h-96 object-contain" alt="hero" />
                </div>
                <div class="mt-4 text-center max-w-2xl">
                    <h2 class="text-2xl font-semibold text-black2">Gratitude Feedback</h2>
                    <p class="text-gray-600 text-xl mt-2">Westmetric platform and its merchant has jointly organized a
                        reward system for all our cherished users.</p>
                </div>
                <div class="bg-black1 mt-4 h-fit rounded-lg w-full">
                    <div class="flex justify-between sm:flex-row flex-col items-center p-6">
                        <div class="text-white border-b sm:border-r border-frame border-dotted p-4">
                            <div class="text-xl flex flex-col gap-4 items-center">
                                <h2 class=" text-white ">Deposit (USDT)</h2>
                                <p class="text-frame font-semibold">500-1,499</p>
                                <h2 class="text-white">Can be obtained on
                                    deposit amount</h2>
                                <p class="text-frame font-semibold">6%</p>
                            </div>
                        </div>
                        <div class="text-white border-b sm:border-r border-frame border-dotted p-4">
                            <div class="text-xl flex flex-col gap-4 items-center">
                                <h2 class=" text-white ">Deposit (USDT)</h2>
                                <p class="text-frame font-semibold">1500-4,999</p>
                                <h2 class="text-white">Can be obtained on
                                    deposit amount</h2>
                                <p class="text-frame font-semibold">8%</p>
                            </div>
                        </div>
                        <div class="text-white p-4">
                            <div class="text-xl flex flex-col gap-4 items-center">
                                <h2 class=" text-white ">Deposit (USDT)</h2>
                                <p class="text-frame font-semibold">5000+</p>
                                <h2 class="text-white">Can be obtained on
                                    deposit amount</h2>
                                <p class="text-frame font-semibold">10%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 flex justify-center items-center">
                    <p class="text-black2 text-lg"><b>Note:</b> The activity reward is limited to the first of the reset
                        task to receive.</p>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center flex-col bg-[#F2F2F2] h-fit w-full md:p-10 p-4 relative" id="certificate">
            <h3 class="text-center font-bold mb-4 text-lg text-gray-800">CERTIFICATE</h3>
            <div class="flex justify-center items-center">
                <img src="{{ asset('assets/certificate.png') }}" class="w-2/3 h-2/3 object-contain" alt="hero" />
            </div>
        </div>
        <div class="flex items-center justify-center flex-col bg-black2 h-fit w-full md:p-10 p-4 relative" id="customer">
            <h3 class="text-center font-bold mb-4 text-xl text-white uppercase">Customer Service</h3>
            <div class="flex justify-center md:flex-row flex-col gap-8 items-center py-4">
                @foreach ($supports as $support)
                    <div class="flex flex-col gap-4 flex justify-center items-center">
                        <div
                            class="w-60 h-60 bg-frame flex justify-center items-center rounded-md border border-white shadow">
                            <img src="{{ asset('assets/telegram.png') }}" class="w-44 h-44 object-contain"
                                alt="hero" />
                        </div>
                        <a href="{{ $support->link }}" target="_blank"
                            class="underline text-white text-xl">{{ $support->name }}</a>
                    </div>
                @endforeach

            </div>
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
        <div class="absolute bottom-2 left-8 md:left-1/4">
            <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300">Copyright © 2022
                Westmetric. All Rights Reserved</p>
        </div>
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
        const contentBx = document.querySelector('.contentBx');
        const slidesText = contentBx.querySelectorAll('.content');
        var j = 0;
        const accordion = document.getElementsByClassName("accordionBx");
        for (var i = 0; i < accordion.length; i++) {
            accordion[i].addEventListener("click", function() {
                this.classList.toggle("active");
            });
        }

        function nextSlideText() {
            slidesText[j].classList.remove('active');
            j = (j + 1) % slidesText.length;
            slidesText[j].classList.add('active');
        }
    </script>
@endsection
