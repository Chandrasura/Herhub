<div id="default-modal3" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="absolute right-0 p-4 md:p-5 z-[100]">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal3">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
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
            </div>
        </div>