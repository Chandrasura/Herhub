@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white1 w-4/5 h-4/5 rounded-lg p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-6">
                    <form class="w-4/5">
                        <div class="flex justify-between items-center text-black2">
                            <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            <h3 class="text-3xl text-center uppercase font-bold mb-5">VIP</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div
                            class="my-4 h-fit w-full bg-gradient-to-b from-[#BBCADE] to-[#95ACCC] px-4 py-8 flex justify-between items-center rounded-lg">
                            <div class="md:w-3/5 w-full">
                                <ul class="pl-5 mt-3 text-lg text-[#08428E]">
                                    <li>● Suitable for most data capture scenarios
                                        involving light to medium usage.</li>
                                    <li>● Profit of 0.5% per task -45 tasks per set.</li>
                                    <li>● Up to 135 Submit ratings per day.</li>
                                    <li>● No access to other Premium features.</li>
                                </ul>
                            </div>
                            <div class="flex flex-col md:w-1/5 w-full">
                                <div>
                                    <img src="assets/vips1.png" alt="vip1" class="w-40 h-40 object-contain" />
                                </div>
                                <div class="flex items-center flex-col justify-center gap-4 text-[#08428E]">
                                    <p class="font-bold text-2xl ">VIP 1</p>
                                    <div class="text-sm font-semibold">
                                        <p>USDT</p>
                                        <p>100.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="my-4 h-fit w-full bg-gradient-to-b from-[#DDCCC4] to-[#C3A598] px-4 py-8 flex justify-between items-center rounded-lg">
                            <div class="md:w-3/5 w-full">
                                <ul class="pl-5 mt-3 text-lg text-[#71280A]">
                                    <li>● Suitable for most data capture scenarios
                                        involving light to medium usage.</li>
                                    <li>● Profit of 0.5% per task -45 tasks per set.</li>
                                    <li>● Up to 135 Submit ratings per day.</li>
                                    <li>● No access to other Premium features.</li>
                                </ul>
                            </div>
                            <div class="flex flex-col md:w-1/5 w-full">
                                <div>
                                    <img src="assets/vips2.png" alt="vip2" class="w-40 h-40 object-contain" />
                                </div>
                                <div class="flex items-center flex-col justify-center gap-4 text-[#71280A]">
                                    <p class="font-bold text-2xl ">VIP 2</p>
                                    <div class="text-sm font-semibold">
                                        <p>USDT</p>
                                        <p>500.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="my-4 h-fit w-full bg-gradient-to-b from-[#B7B3D7] to-[#9D90CB] px-4 py-8 flex justify-between items-center rounded-lg">
                            <div class="md:w-3/5 w-full">
                                <ul class="pl-5 mt-3 text-lg text-[#5729A7]">
                                    <li>● Suitable for most data capture scenarios
                                        involving light to medium usage.</li>
                                    <li>● Profit of 0.5% per task -45 tasks per set.</li>
                                    <li>● Up to 135 Submit ratings per day.</li>
                                    <li>● No access to other Premium features.</li>
                                </ul>
                            </div>
                            <div class="flex flex-col md:w-1/5 w-full">
                                <div>
                                    <img src="assets/vips3.png" alt="vip3" class="w-40 h-40 object-contain" />
                                </div>
                                <div class="flex items-center flex-col justify-center gap-4 text-[#5729A7]">
                                    <p class="font-bold text-2xl ">VIP 3</p>
                                    <div class="text-sm font-semibold">
                                        <p>USDT</p>
                                        <p>1500.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="my-4 h-fit w-full bg-gradient-to-b from-[#686871] to-[#3F3F4A] px-4 py-8 flex justify-between items-center rounded-lg">
                            <div class="md:w-3/5 w-full">
                                <ul class="pl-5 mt-3 text-lg text-white">
                                    <li>● Suitable for most data capture scenarios
                                        involving light to medium usage.</li>
                                    <li>● Profit of 0.5% per task -45 tasks per set.</li>
                                    <li>● Up to 135 Submit ratings per day.</li>
                                    <li>● No access to other Premium features.</li>
                                </ul>
                            </div>
                            <div class="flex flex-col md:w-1/5 w-full">
                                <div>
                                    <img src="assets/vips4.png" alt="vip4" class="w-40 h-40 object-contain" />
                                </div>
                                <div class="flex items-center flex-col justify-center gap-4 text-white">
                                    <p class="font-bold text-2xl ">VIP 4</p>
                                    <div class="text-sm font-semibold">
                                        <p>USDT</p>
                                        <p>5000.00</p>
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
