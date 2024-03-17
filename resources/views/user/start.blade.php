@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/popup.css') }}" rel="stylesheet" />
    <div class='min-h-screen w-full' id="blur">
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C]'>
            <div class='w-full flex justify-center items-center'>
                <div class="bg-[#5D2C66] w-4/5 h-4/5 rounded md:p-10 p-4 my-10 relative">
                    <div class="flex flex-col items-center justify-center md:p-6 p-2">
                        <div class="mx-auto w-full lg:w-3/5 h-[70vh] lg:h-full">
                            <div class="flex text-white justify-between items-center">
                                <a href="{{ route('pages.index') }}">
                                    <i class='bx bx-chevron-left font-bold text-2xl cursor-pointer'></i>
                                </a>
                                <h3 class="text-2xl text-center uppercase font-bold mb-5">Start</h3>
                                <i class='text-xl'></i>
                            </div>
                            <div class="flex justify-center items-center relative" id="startBg">
                                <img src="{{ asset('assets/start.png') }}" class="md:w-4/5 lg:block hidden md:h-4/5" alt="start" />
                                <div class="absolute text-white h-full p-8">
                                    <div
                                        class="flex items-center md:flex-row flex-col justify-center gap-4 md:gap-16 mt-8 font-bold text-white text-2xl">
                                        <h3 class="">Starting</h3>
                                        <p class="uppercase flex gap-2">{{ $user->username }} <img src="{{ asset('uploads/images/vips/' . $user->vip->image) }}"
                                                class="w-6 h-6 translate-y-2 object-contain" alt="{{ $user->username }}" /></p>
                                    </div>
                                    <div class="flex flex-col gap-4 mt-10">
                                        <div class="flex gap-4">
                                            <div>
                                                <img src="{{ asset('assets/coin.png') }}" class="w-4 h-4 object-contain" alt="line" />
                                            </div>
                                            <div class="text-sm">
                                                <p>Today's Profit</p>
                                                <p class="text-[#1ABBF9]">USDT {{ number_format($profit, 2) }}</p>
                                            </div>
                                        </div>
                                        <p class="text-white text-sm mx-1">Daily profits will be updated automatically</p>
                                        <hr class="w-full border-1 border-white" />
                                        <div class="flex justify-between items-center">
                                            <div class="flex gap-4">
                                                <div>
                                                    <img src="{{ asset('assets/credit-card.png') }}" class="w-4 h-4 object-contain"
                                                        alt="line" />
                                                </div>
                                                <div class="text-sm">
                                                    <p>Balance</p>
                                                    <p class="text-[#1ABBF9]">USDT <span id="available_balance">{{ number_format($user->available_balance, 2) }}</span></p>
                                                </div>
                                            </div>
                                            <div class="text-sm">
                                                <p>Total Balance</p>
                                                <p class="text-[#1ABBF9]">USDT {{ number_format($user->total_balance, 2) }}</p>
                                            </div>
                                        </div>
                                        <p class="text-white text-sm mx-1">Every tasks profit will be added to the total
                                            balance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h-[10vh] w-full my-4 mt-20 rounded-lg flex flex-col justify-center items-center">
                            <div class="h-32 w-32 bg-[#2490E2] rounded-full text-white p-4 flex justify-center items-center gap-4 flex-col cursor-pointer"
                                id="game">
                                <p>Starting Now</p>
                                <p><span id="number_of_tasks">{{ $task }}</span> / {{ $user->vip->orders_per_day / $user->vip->sets }}</p>
                            </div>
                            <p class="text-red-500" id="pending-task"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-md text-white p-8 md:ml-24">
                <p class="font-semibold text-2xl">NOTICE</p>
                <p class="text-base mt-3">
                    Online customer service is available from 9:00 to 23:00
                    For assistance please contact customer service.</p>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <div id="popup">
        <a href="#" id="close">X</a>
        <h3 class="uppercase font-bold lg:text-2xl sm:text-lg lg:mx-4 sm:mx-2 my-2 text-center">Boost Mission</h3>
        <form action="{{ route('pages.task.submit') }}" method="POST" class="flex justify-center items-center flex-col gap-4">
            @csrf
            @method('put')
            <p style="display: none" id="product-id"></p>
            <input type="hidden" name="task" id="new_task_id">
            <div class="w-24 h-24 relative">
                <img src="" class="w-full h-full object-cover" id="image" />
            </div>
            <p id="description"></p>
            <hr class="w-full border " />
            <div class="justify-between items-center w-full">
                <div class="text-sm mb-2">
                    <p>Total Amount</p>
                    <p id="price" class="text-[#1ABBF9]"></p>
                </div>
                <div class="text-sm">
                    <p>Point</p>
                    <p class="text-[#1ABBF9]" id="point"></p>
                </div>
            </div>
            <hr class="w-full border " />
            <button id="submit" type="submit"
                class="py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Submit</button>
        </form>
        <!--<div class="absolute bottom-2 left-8">-->
            <!--<p class="text-gray-900 font-semibold text-sm text-gray-800 dark:text-gray-300">Copyright © 2022-->
            <!--    Westmetric. All Rights Reserved</p>-->
        <!--</div>-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        let game = document.getElementById('game');
        let popup = document.getElementById('popup');
        let close = document.getElementById('close');
        let blur = document.getElementById('blur');
        let submit = document.getElementById('submit');

        function fetch(itemPrice){

            axios.post('{{ route('pages.task') }}', {
                product: document.getElementById('product-id').innerHTML
            })
            .then(function(response){
                // console.log(response);
                document.getElementById('new_task_id').value = response.data.task;
                if(response.data.error){
                    document.getElementById('pending-task').innerHTML = response.data.error;
                } else{
                    document.getElementById('pending-task').innerHTML = "";
                    toggle();
                    let balance_with_commma = document.getElementById('available_balance').innerHTML;
                    let balance_without_commma = balance_with_commma.replace(/,/g, "");

                    let available_balance = parseFloat(balance_without_commma);
                    document.getElementById('available_balance').innerHTML = (available_balance - itemPrice.replace("USDT ", "")).toLocaleString();
                    document.getElementById('number_of_tasks').innerHTML = parseInt(document.getElementById('number_of_tasks').innerHTML) + 1;

                }
            })
            .catch(function(error){
                console.log(error)
            })
        }
        function toggle() {
            popup.classList.toggle('active');
            blur.classList.toggle('active');
        }

        let items = [];
        
        let products = @json($products);
        let user = @json($user);

        for (let i = 0; i < products.length; i++) {
            items[i] = {
                product_id: products[i]['id'],
                image: '{{ asset('uploads/images/products') }}' + '/' + products[i]['image'],
                description: products[i]['name'],
                price: 'USDT ' + products[i]['amount'].toFixed(2),
                point: 'USDT ' + ((user['vip']['percentage_profit'] / 100) * products[i]['amount']).toFixed(2),
            }
        }

        // Function to update popup content with a random item from the array
        function updatePopupContent() {
            if(items.length > 0) {
                let randomIndex = Math.floor(Math.random() * items.length);
                let item = items[randomIndex];
                document.getElementById('image').src = item.image;
                document.getElementById('description').textContent = item.description;
                document.getElementById('product-id').textContent = item.product_id;
                document.getElementById('price').textContent = item.price;
                document.getElementById('point').textContent = item.point;

                fetch(item.price);
            } else {
                document.getElementById('pending-task').innerHTML = "Your available balance is low to perform any task.";
            }
        }
        game.addEventListener('click', function() {
            updatePopupContent(); // Update content when the game is clicked
        });
        close.addEventListener('click', toggle);
        // submit.addEventListener('click', toggle);
    </script>
@endsection
