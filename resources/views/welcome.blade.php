@extends('layouts.app')
@section('content')
    <link href="css/slide.css" rel="stylesheet" />
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#1B0037] to-[#4A0648]' id="home">

            @if (session('user_registered'))
            <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
            
                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
            
                    <div class="p-6 pt-0 text-center">
                        <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this user?</h3>
                        <a href="#"  onclick="closeModal('modelConfirm')"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </a>
                        <a href="#" onclick="closeModal('modelConfirm')"
                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                            data-modal-toggle="modelConfirm">
                            No, cancel
                        </a>
                    </div>
            
                </div>
            </div>
            
            <script type="text/javascript">
                window.openModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'block'
                    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                }
            
                window.closeModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'none'
                    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                }
            
                // Close all modals when press ESC
                document.onkeydown = function(event) {
                    event = event || window.event;
                    if (event.keyCode === 27) {
                        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                        let modals = document.getElementsByClassName('modal');
                        Array.prototype.slice.call(modals).forEach(i => {
                            i.style.display = 'none'
                        })
                    }
                };
            </script>
            @endif

            <div class="flex items-center md:flex-row flex-col h-full w-full p-10">
                <div class="pl-6 w-full md:w-1/2 text-white">
                    <h1 class="text-3xl font-normal text-white">Welcome</h1>
                    <div class="flex gap-4 items-center">
                        <p class="text-3xl font-semibold mt-4">EXCLUSIVE - 032</p>
                        <img src="assets/vip1.png" class="w-10 h-10 translate-y-2 object-contain" alt="line" />
                    </div>
                </div>
                <div class="flex justify-center items-center w-full md:w-1/2">
                    <img src="assets/bg-1.png" class="w-4/5 h-4/5 object-contain" alt="hero" />
                </div>
            </div>
        </div>
        <div class="flex items-center md:flex-row flex-col bg-white h-fit w-full p-10" id="about">
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
        <div class="flex items-center flex-col bg-[#F2F2F2] h-fit w-full p-10 relative contentBx">
            <h3 class="text-center font-bold mb-4 text-lg text-gray-800">VIP LEVEL</h3>
            <div class="content active">
                <div class="flex md:flex-row flex-col gap-6 justify-between items-center">
                    <div class="card">
                        <img src="assets/diamond1.png" class="w-1/3 h-1/3 object-contain" alt="hero" />
                        <div class="text-white mt-4 text-lg">
                            <h2 class="font-semibold">VIP 1</h2>
                            <ul class="list-disc pl-5 mt-3 text-sm">
                                <li>Suitable for most data capture scenarios involving light to medium usage. </li>
                                <li>Profit of 0.5% per task -45 tasks per set. </li>
                                <li>Up to 135 Submit ratings per day.</li>
                                <li>No access to other Premium features.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/diamond2.png" class="w-1/3 h-1/3 object-contain" alt="hero" />
                        <div class="text-white mt-4 text-lg">
                            <h2 class="font-semibold">VIP 2</h2>
                            <ul class="list-disc pl-5 mt-3 text-sm">
                                <li>Deposit in accordance with our renewal event. </li>
                                <li>Profit of 1% per task-50 Submit products per set. </li>
                                <li>Better Profit and Commission.</li>
                                <li>Up to 150 tasks per day can be submitted by Vip 2 users.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="flex md:flex-row flex-col gap-6 justify-between items-center">
                    <div class="card">
                        <img src="assets/diamond1.png" class="w-1/3 h-1/3 object-contain" alt="hero" />
                        <div class="text-white mt-4 text-lg">
                            <h2 class="font-semibold">VIP 3</h2>
                            <ul class="list-disc pl-5 mt-3 text-sm">
                                <li>Suitable for most data capture scenarios involving light to medium usage. </li>
                                <li>Profit of 0.5% per task -45 tasks per set. </li>
                                <li>Up to 135 Submit ratings per day.</li>
                                <li>No access to other Premium features.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/diamond2.png" class="w-1/3 h-1/3 object-contain" alt="hero" />
                        <div class="text-white mt-4 text-lg">
                            <h2 class="font-semibold">VIP 4</h2>
                            <ul class="list-disc pl-5 mt-3 text-sm">
                                <li>Deposit in accordance with our renewal event. </li>
                                <li>Profit of 1% per task-50 Submit products per set. </li>
                                <li>Better Profit and Commission.</li>
                                <li>Up to 150 tasks per day can be submitted by Vip 2 users.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="controls">
                <li onclick="nextSlideText()">
                    <img src="assets/next.png" class="w-10 cursor-pointer object-contain h-10" alt="arrow" />
                </li>
            </ul>
        </div>
        <div class="flex items-center flex-col bg-white h-fit w-full p-10 relative" id="events">
            <h3 class="text-center font-bold mb-4 text-xl text-gray-800">EVENTS</h3>
            <div class="bg-white1 p-10 w-full rounded-md flex flex-col justify-center items-center">
                <div>
                    <img src="assets/event1.png" class="w-full h-96 object-contain" alt="hero" />
                </div>
                <div class="mt-4 text-center max-w-2xl">
                    <h2 class="text-2xl font-semibold text-black2">Gratitude Feedback</h2>
                    <p class="text-gray-600 text-xl mt-2">Westmetric platform and its merchant has jointly organized a
                        reward system for all ourcherished users.</p>
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
                                <p class="text-frame font-semibold">8%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 flex justify-center items-center">
                  <p class="text-black2 text-lg"><b>Note:</b> The activity reward is limited to the first of the reset task to receive.</p>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center flex-col bg-[#F2F2F2] h-fit w-full p-10 relative" id="certificate">
          <h3 class="text-center font-bold mb-4 text-lg text-gray-800">CERTIFICATE</h3>
          <div class="flex justify-center items-center">
            <img src="assets/certificate.png" class="w-2/3 h-2/3 object-contain" alt="hero" />
          </div>
        </div>
        <div class="flex items-center justify-center flex-col bg-black2 h-fit w-full p-10 relative" id="customer">
          <h3 class="text-center font-bold mb-4 text-xl text-white uppercase">Customer Service</h3>
          <div class="flex justify-center md:flex-row flex-col gap-8 items-center py-4">
            @foreach ($supports as $support)
            <div class="flex flex-col gap-4 flex justify-center items-center">
                <div class="w-60 h-60 bg-frame flex justify-center items-center rounded-md border border-white shadow">
                  <img src="{{ asset('assets/telegram.png') }}" class="w-44 h-44 object-contain" alt="hero" />
                </div>
                <a href="{{ $support->link }}" target="_blank" class="underline text-white text-xl">{{ $support->name }}</a>
              </div>
            @endforeach

          </div>
        </div>
        <div class="flex items-center justify-center flex-col bg-white h-fit w-full p-10 relative" id="faq">
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
    <script type="text/javascript">
        const contentBx = document.querySelector('.contentBx');
        const slidesText = contentBx.querySelectorAll('.content');
        var j = 0;
        const accordion = document.getElementsByClassName("accordionBx");
      for (var i = 0; i < accordion.length; i++) {
        accordion[i].addEventListener("click", function () {
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
