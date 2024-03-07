@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white1 w-4/5 h-4/5 rounded-lg sm:p-10 p-4 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <form class="sm:w-4/5 w-full">
                        <div class="flex justify-between items-center text-black2">
                            <a href="{{ route('pages.index') }}">
                                <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            </a>
                            <h3 class="text-3xl text-center uppercase font-bold mb-5">VIP</h3>
                            <i class='text-xl'></i>
                        </div>
                        @foreach ($vips as $vip)
                        <div
                            class="my-4 h-fit w-full bg-gradient-to-b from-[#BBCADE] to-[#95ACCC] px-4 py-8 flex justify-between items-center rounded-lg">
                            <div class="md:w-3/5 w-full">
                                <ul class="pl-5 mt-3 text-lg text-[#08428E]" style="list-style-type: disc">
                                    @foreach (json_decode($vip->description) as $des)
                                    <li>{{ $des }}</li>
                                    @endforeach
                                    </ul>
                            </div>
                            <div class="flex flex-col md:w-1/5 w-full">
                                <div>
                                    <img src="{{ asset('uploads/images/vips/' . $vip->image) }}" alt="{{ $vip->name }}" class="w-40 h-40 object-contain" />
                                </div>
                                <div class="flex items-center flex-col justify-center gap-4 text-[#08428E]">
                                    <p class="font-bold text-2xl ">{{ $vip->name }}</p>
                                    <div class="text-sm font-semibold">
                                        <p>USDT</p>
                                        <p>{{ number_format($vip->amount, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
