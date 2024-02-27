@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <form method="POST" action="{{ route('pages.wallet.update') }}" class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            @csrf
            @method('put')
            @if (session('success'))
                <h3 class="text-center uppercase font-bold text-green-500 mb-5">{{ session('success') }}</h3>
                @endif
            <div class="glassmorphism w-4/5 h-4/5 rounded-lg p-16 my-10">
                <div class="mx-auto w-3/5">
                    <div class="mb-5 relative">
                        <label for="account_name" class="block mb-2 text-lg font-medium text-white">Account Name</label>
                        <input type="text" name="account_name" value="{{ old('account_name') ? old('account_name') : $user->account_name }}" id="account_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Wallet Address" required>
                        @error('account_name')
                            <strong class="text-red-600">{{ $message }}</strong><br>
                        @enderror
                    </div>
                    <div class="mb-5 relative">
                        <label for="wallet_address" class="block mb-2 text-lg font-medium text-white">Wallet Address</label>
                        <input type="text" name="wallet_address" value="{{ old('wallet_address') ? old('wallet_address') : $user->wallet_address }}" id="wallet_address" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Wallet Address" required>
                        @error('wallet_address')
                            <strong class="text-red-600">{{ $message }}</strong><br>
                        @enderror  
                        @error('withdrawal_pin')
                            <strong class="text-red-600">{{ $message }}</strong>
                        @enderror    

                    </div>
                    <div class="mb-5 relative">
                        <label for="wallet_name" class="block mb-2 text-lg font-medium text-white">Wallet Name</label>
                        <input type="text" name="wallet_name" value="{{ old('wallet_name') ? old('wallet_name') : $user->wallet_name }}" id="wallet_name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Wallet Address" required>
                        @error('wallet_name')
                            <strong class="text-red-600">{{ $message }}</strong><br>
                        @enderror
                    </div>
                    <div class="mb-5 relative">
                        <label for="network" class="block mb-2 text-lg font-medium text-white">Network</label>
                        <select name="network" id="network" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">Select Network</option>
                            <option value="TRON (TRC20)">TRON (TRC20)</option>
                            <option value="Binance Smart Chain (BEP20)">Binance Smart Chain (BEP20)</option>
                            <option value="Ethereum (ERC20)">Ethereum (ERC20)</option>
                            <option value="Polygon">Polygon</option>
                            <option value="Solana">Solana</option>
                            <option value="AVAX C-Chain">AVAX C-Chain</option>
                            <option value="Arbitrum One">Arbitrum One</option>
                            <option value="Optimism">Optimism</option>
                            <option value="opBNB">opBNB</option>
                            <option value="Near Protocol">Near Protocol</option>
                            <option value="EOS">EOS</option>
                            <option value="Asset Hub (Polkadot)">Asset Hub (Polkadot)</option>
                            <option value="BNB Beacon Chain (BEP2)">BNB Beacon Chain (BEP2)</option>
                            <option value="Tezos">Tezos</option>
                        </select>
                        @error('network')
                            <strong class="text-red-600">{{ $message }}</strong><br>
                        @enderror
                    </div>
                    <div class="flex justify-center items-center flex-col mt-16">
                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                            type="button">
                            Update Wallet Details
                        </button>
                    </div>
                    
                </div>
            </div>
            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Confirm Withdrawal Pin
                            </h3>
                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <div class="space-y-4">
                                <div>
                                    <label for="withdrawal_pin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Withdrawal pin</label>
                                    <input type="number" name="withdrawal_pin" id="withdrawal_pin" placeholder="Enter your withdrawal_pin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Wallet Address</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </form>
        @include('layouts.footer')
    </div>
@endsection
