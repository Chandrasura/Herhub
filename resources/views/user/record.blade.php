@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/tabs.css') }}" rel="stylesheet" />
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="glassmorphism w-4/5 h-4/5 rounded-lg sm:p-10 p-4 my-10 relative">
                <div class="flex flex-col items-center justify-center sm:p-6 p-2">
                    <div class="sm:w-4/5 w-full">
                        <div class="flex justify-between items-center text-white">
                            <a href="{{ route('pages.index') }}">
                                <i class='bx bx-chevron-left -translate-y-1.5 font-bold text-2xl cursor-pointer'></i>
                            </a>
                            <h3 class="sm:text-3xl text-xl text-center uppercase font-bold mb-5">Records</h3>
                            <i class='text-xl'></i>
                        </div>
                        <div class="my-4">
                            <div class="mb-4 flex justify-center items-center w-full">
                                <ul class="flex rounded-lg w-full flex-wrap -mb-px text-sm font-medium text-center bg-white text-frame items-center py-2.5"
                                    id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                    <li class="sm:w-1/4 w-full" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="all-tab" data-tabs-target="#all"
                                            type="button" role="tab" aria-controls="all"
                                            aria-selected="false">All</button>
                                    </li>
                                    <li class="sm:w-1/4 w-full" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="pending-tab"
                                            data-tabs-target="#pending" type="button" role="tab"
                                            aria-controls="pending" aria-selected="false">Pending</button>
                                    </li>
                                    <li class="sm:w-1/4 w-full" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="completed-tab"
                                            data-tabs-target="#completed" type="button" role="tab"
                                            aria-controls="completed" aria-selected="false">Completed</button>
                                    </li>
                                    {{-- <li class="sm:w-1/4 w-full" role="presentation">
                                        <button class="py-2 px-10 rounded-[20px]" id="undone-tab" data-tabs-target="#undone"
                                            type="button" role="tab" aria-controls="undone"
                                            aria-selected="false">Undone</button>
                                    </li> --}}
                                </ul>
                            </div>
                            <div id="default-tab-content" class="mt-8">
                                <div class="hidden p-4 rounded-lg bg-frame" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    @forelse ($all_tasks as $task)
                                    <div class="my-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <small class="text-white">{{ $task->created_at }}</small>
                                            <button
                                                class="bg-{{ $task->status == "completed" ? "green" : "red" }}-600 rounded-[20px] px-4 text-sm py-2 text-white">{{ ucfirst($task->status) }}</button>
                                        </div>
                                        <div class="flex bg-[#5F3B71] flex-col p-4 text-white gap-4">
                                            <div class="flex gap-6">
                                                <div>
                                                    <img src="{{ asset('uploads/images/products/' . $task->product->image) }}" alt="{{ $task->product->name }}"
                                                        class="w-20 h-20 object-contain">
                                                </div>
                                                <div class="text-md">
                                                    <p>{{ $task->product->name }}</p>
                                                </div>
                                            </div>
                                            <hr class="w-full border border-white">
                                            <div class="flex justify-between items-center text-sm">
                                                <div>
                                                    <p>Total Amount</p>
                                                    <p class="font-semibold">USDT {{ number_format($task->product->amount, 2) }}</p>
                                                </div>
                                                <div>
                                                    <p>Profit</p>
                                                    <p class="font-semibold">USDT {{ number_format($task->profit->amount, 2) }}</p>
                                                </div>
                                            </div>
                                            @if ($task->status == "pending")
                                            <form action="{{ route('pages.task.submit') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="flex justify-end">
                                                    <input type="hidden" name="task" value="{{ $task->id }}">
                                                    <button id="submit" type="submit" class="bg-gradient-to-r from-[#28A6EF] to-[#1323A0] rounded-[20px] px-4 text-sm py-2 text-white">Submit</button>
                                                    <!--<button id="submit" type="submit"-->
                                                    <!--        class="py-2 w-1/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">-->
                                                    <!--    Submit-->
                                                    <!--</button>-->
                                                </div>
                                            </form>
                                            @endif    
                                        </div>
                                    </div>
                                    @empty
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT {{ number_format($profit, 2) }}</p>
                                    </div>
                                    @endforelse
                                </div>
                                <div class="hidden p-4 rounded-lg bg-frame" id="pending" role="tabpanel"
                                    aria-labelledby="pending-tab">
                                    @forelse ($pending_tasks as $task)
                                    <div class="my-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <small class="text-white">{{ $task->created_at }}</small>
                                            <button
                                                class="bg-red-600 rounded-[20px] px-4 text-sm py-2 text-white">{{ ucfirst($task->status) }}</button>
                                        </div>
                                        <div class="flex bg-[#5F3B71] flex-col p-4 text-white gap-4">
                                            <div class="flex gap-6">
                                                <div>
                                                    <img src="{{ asset('uploads/images/products/' . $task->product->image) }}" alt="{{ $task->product->name }}"
                                                        class="w-20 h-20 object-contain">
                                                </div>
                                                <div class="text-md">
                                                    <p>{{ $task->product->name }}</p>
                                                </div>
                                            </div>
                                            <hr class="w-full border border-white">
                                            <div class="flex justify-between items-center text-sm">
                                                <div>
                                                    <p>Total Amount</p>
                                                    <p class="font-semibold">USDT {{ number_format($task->product->amount, 2) }}</p>
                                                </div>
                                                <div>
                                                    <p>Profit</p>
                                                    <p class="font-semibold">USDT {{ number_format($task->profit->amount, 2) }}</p>
                                                </div>
                                            </div>
                                            <form action="{{ route('pages.task.submit') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="flex justify-end">
                                                    <input type="hidden" name="task" value="{{ $task->id }}">                                    
                                                    <button id="submit" type="submit"
                                                            class="py-2 w-1/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT {{ number_format($profit, 2) }}</p>
                                    </div>
                                    @endforelse
                                </div>
                                <div class="hidden p-4 rounded-lg bg-frame" id="completed" role="tabpanel"
                                    aria-labelledby="completed-tab">
                                    @forelse ($completed_tasks as $task)
                                    <div class="my-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <small class="text-white">{{ $task->created_at }}</small>
                                            <button
                                                class="bg-green-600 rounded-[20px] px-4 text-sm py-2 text-white">{{ ucfirst($task->status) }}</button>
                                        </div>
                                        <div class="flex bg-[#5F3B71] flex-col p-4 text-white gap-4">
                                            <div class="flex gap-6">
                                                <div>
                                                    <img src="{{ asset('uploads/images/products/' . $task->product->image) }}" alt="{{ $task->product->name }}"
                                                        class="w-20 h-20 object-contain">
                                                </div>
                                                <div class="text-md">
                                                    <p>{{ $task->product->name }}</p>
                                                </div>
                                            </div>
                                            <hr class="w-full border border-white">
                                            <div class="flex justify-between items-center text-sm">
                                                <div>
                                                    <p>Total Amount</p>
                                                    <p class="font-semibold">USDT {{ number_format($task->product->amount, 2) }}</p>
                                                </div>
                                                <div>
                                                    <p>Profit</p>
                                                    <p class="font-semibold">USDT {{ number_format($task->profit->amount, 2) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT {{ number_format($profit, 2) }}</p>
                                    </div>
                                    @endforelse
                                </div>
                                {{-- <div class="hidden p-4 rounded-lg bg-frame" id="undone" role="tabpanel"
                                    aria-labelledby="undone-tab">
                                    <div class="flex flex-col p-4 text-white gap-4 justify-center items-center">
                                        <p class="text-gray-300 text-lg">Total Profits</p>
                                        <p class="text-xl">USDT 0.00</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
