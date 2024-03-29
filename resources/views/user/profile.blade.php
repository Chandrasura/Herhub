@extends('layouts.app')
@section('content')
   
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="bg-white w-4/5 h-4/5 rounded p-4 sm:p-10 my-10 relative">
                <div class="flex flex-col items-center justify-center p-2 sm:p-6">
                    <div class="sm:w-3/5 w-full">
                        <div class="flex justify-between items-center">
                            <a href="{{ route('pages.index') }}">
                                <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                            </a>
                            <h3 class="text-3xl text-center uppercase font-bold text-gray-800 mb-5">Profile</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4 flex gap-4 flex-col sm:flex-row items-center">
                            <div>
                                <img src="{{ asset('assets/avatar.png') }}" class="border border-blue-400 w-32 h-32 rounded-full mx-auto"
                                    alt="avatar" />
                            </div>
                            <div class="flex gap-3 items-center">
                                <p class="text-xl font-semibold mt-4">{{ $user->username }}</p>
                                <img src="assets/vip1.png" class="w-6 h-6 translate-y-2 object-contain" alt="line" />
                            </div>
                        </div>
                        <div class="bg-frame text-white p-6 h-fit w-full rounded-lg">
                            <div class="flex text-lg flex-col sm:flex-row justify-between items-center">
                                <p>Invitation Code</p>
                                <p>{{ $user->referral_code }}</p>
                            </div>
                            <div class="flex text-lg justify-between items-center mt-4 flex-col sm:flex-row">
                                <p>Credit Score</p>
                                <div class="max-w-sm">
                                    <input id="default-range" type="range" value="100"
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                </div>
                            </div>
                        </div>
                        <div class="bg-frame text-white p-6 h-fit w-full rounded-lg mt-4 flex flex-col sm:flex-row justify-between">
                            <div class="w-full sm:w-1/2 flex text-lg gap-4 flex-col border-b sm:border-b-0 sm:border-r border-white">
                                <p class="text-gray-300">Total Profit</p>
                                <p>USDT {{ number_format($profit, 2) }}</p>
                            </div>
                            <div class="flex text-lg gap-4 flex-col">
                                <p class="text-gray-300">Total Balance</p>
                                <p>USDT {{ number_format($user->available_balance, 2) }}</p>
                            </div>
                        </div>
                        <div class="my-4">
                            <a href="{{ route('user.info') }}" type="button"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path
                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                    </path>
                                    <path
                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Personal Information
                                </span>
                            </a>
                        </div>
                        <div class="my-4">
                            <a type="button" href="{{ route('pages.deposit') }}"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path d="M14 9h8v6h-8z"></path>
                                    <path
                                        d="M20 3H5C3.346 3 2 4.346 2 6v12c0 1.654 1.346 3 3 3h15c1.103 0 2-.897 2-2v-2h-8c-1.103 0-2-.897-2-2V9c0-1.103.897-2 2-2h8V5c0-1.103-.897-2-2-2z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Deposit
                                </span>
                            </a>
                        </div>
                        <div class="my-4">
                            <a type="button"
                            href="{{ route('pages.withdraw') }}"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path
                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm1 14.915V18h-2v-1.08c-2.339-.367-3-2.002-3-2.92h2c.011.143.159 1 2 1 1.38 0 2-.585 2-1 0-.324 0-1-2-1-3.48 0-4-1.88-4-3 0-1.288 1.029-2.584 3-2.915V6.012h2v1.109c1.734.41 2.4 1.853 2.4 2.879h-1l-1 .018C13.386 9.638 13.185 9 12 9c-1.299 0-2 .516-2 1 0 .374 0 1 2 1 3.48 0 4 1.88 4 3 0 1.288-1.029 2.584-3 2.915z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Withdrawal
                                </span>
                            </a>
                        </div>
                        <div class="my-4">
                            <a type="button" href="{{ $user->vip }}"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path d="M16 12h2v4h-2z"></path>
                                    <path
                                        d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    VIP
                                </span>
                            </a>
                        </div>
                        <div class="my-4">
                            <a type="button" href="{{ route('pages.wallet') }}"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path d="M14 9h8v6h-8z"></path>
                                    <path
                                        d="M20 3H5C3.346 3 2 4.346 2 6v12c0 1.654 1.346 3 3 3h15c1.103 0 2-.897 2-2v-2h-8c-1.103 0-2-.897-2-2V9c0-1.103.897-2 2-2h8V5c0-1.103-.897-2-2-2z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Wallet
                                </span>
                            </a>
                        </div>
                        <div class="my-4">
                            <a type="button"
                            href="{{ route('pages.support') }}"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path
                                        d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm9.364-10.364L16.95 4.05C18.271 5.373 19 7.131 19 9s-.729 3.627-2.05 4.95l1.414 1.414C20.064 13.663 21 11.403 21 9s-.936-4.663-2.636-6.364z">
                                    </path>
                                    <path
                                        d="M15.535 5.464 14.121 6.88C14.688 7.445 15 8.198 15 9s-.312 1.555-.879 2.12l1.414 1.416C16.479 11.592 17 10.337 17 9s-.521-2.592-1.465-3.536z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Customer Service
                                </span>
                            </a>
                        </div>
                        {{-- <div class="my-4">
                            <a type="button"
                            href="/lang"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path
                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-.899.156-1.762.431-2.569L6 11l2 2v2l2 2 1 1v1.931C7.061 19.436 4 16.072 4 12zm14.33 4.873C17.677 16.347 16.687 16 16 16v-1a2 2 0 0 0-2-2h-4v-3a2 2 0 0 0 2-2V7h1a2 2 0 0 0 2-2v-.411C17.928 5.778 20 8.65 20 12a7.947 7.947 0 0 1-1.67 4.873z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Language
                                </span>
                            </a>
                        </div> --}}
                        <div class="my-4">
                            <a type="button"
                            href="{{ route('pages.logout') }}"
                                class="bg-none border transition font-medium rounded-lg text-sm px-5 py-3 w-full text-black text-center inline-flex items-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(207,48,154);transform: ;msFilter:;">
                                    <path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
                                    <path
                                        d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z">
                                    </path>
                                </svg>
                                <span class="ml-4">
                                    Log Out
                                </span>
                            </a>
                        </div>
                    </div>
                   <div class="mt-2 sm:mt-3 p-1">
                        <p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300 text-center ">Copyright © 2022
                            Westmetric. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
 
@endsection
