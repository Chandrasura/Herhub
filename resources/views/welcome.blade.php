@extends('layouts.app')
@section('content')
    <link href="css/slide.css" rel="stylesheet" />
    <div class='min-h-screen w-full'>
        <header>
            <nav class="bg-black border-gray-200 px-12 lg:px-6 py-4">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="/" class="flex items-center">
                        <img src="assets/logo.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    </a>
                    <div class="flex items-center lg:order-2">

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="bg-transparent border-none outline-none focus:outline-none focus:border-none"
                            type="button">
                            <img src="assets/dropdown.png" class="w-5 h-5 mr-2" alt="dropdown" />
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm border border-blue-400 text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">Profile</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">>Status</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white border-b border-blue-400">>Records</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">T
                                        & C</a>
                                </li>
                            </ul>
                        </div>

                        <button data-collapse-toggle="mobile-menu-2" type="button"
                            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#"
                                    class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#about"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About
                                    Us</a>
                            </li>
                            <li>
                                <a href="#certificate"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Certification</a>
                            </li>
                            <li>
                                <a href="#customer"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Customer
                                    Service</a>
                            </li>
                            <li>
                                <a href="#faq"
                                    class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#1B0037] to-[#4A0648]' id="home">
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
                    <p>Smartboost is a growth marketing agency focused on helping modern businesses use data to be more
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
                <div class="flex gap-6 justify-between items-center">
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
                <div class="flex gap-6 justify-between items-center">
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
        <div class="flex items-center flex-col bg-white h-fit w-full p-10 relative">
            <h3 class="text-center font-bold mb-4 text-xl text-gray-800">EVENTS</h3>
            <div class="bg-white1 p-10 w-full rounded-md flex flex-col justify-center items-center">
                <div>
                    <img src="assets/event1.png" class="w-full h-96 object-contain" alt="hero" />
                </div>
                <div class="mt-4 text-center max-w-2xl">
                    <h2 class="text-2xl font-semibold text-black2">Gratitude Feedback</h2>
                    <p class="text-gray-600 text-xl mt-2">Smartboost platform and its merchant has jointly organized a
                        reward system for all ourcherished users.</p>
                </div>
                <div class="bg-black1 mt-4 h-fit rounded-lg w-full">
                    <div class="flex justify-between items-center p-6">
                        <div class="text-white border-r border-frame border-dotted p-4">
                            <div class="text-xl flex flex-col gap-4 items-center">
                                <h2 class=" text-white ">Deposit (USDT)</h2>
                                <p class="text-frame font-semibold">500-1,499</p>
                                <h2 class="text-white">Can be obtained on
                                    deposit amount</h2>
                                <p class="text-frame font-semibold">6%</p>
                            </div>
                        </div>
                        <div class="text-white border-r border-frame border-dotted p-4">
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
          <div class="flex justify-center gap-8 items-center py-4">
            <div class="flex flex-col gap-4 flex justify-center items-center">
              <div class="w-60 h-60 bg-frame flex justify-center items-center rounded-md border border-white shadow">
                <img src="assets/telegram.png" class="w-44 h-44 object-contain" alt="hero" />
              </div>
              <a href="/" class="underline text-white text-xl">Telegram 1</a>
            </div>
            <div class="flex flex-col gap-4 flex justify-center items-center">
              <div class="w-60 h-60 bg-frame flex justify-center items-center rounded-md rounded-md border border-white shadow">
                <img src="assets/telegram.png" class="w-44 h-44 object-contain" alt="hero" />
              </div>
              <a href="/" class="underline text-white text-xl">Telegram 2</a>
            </div>
            <div class="flex flex-col gap-4 flex justify-center items-center">
              <div class="w-60 h-60 bg-frame flex justify-center items-center rounded-md rounded-md border border-white shadow">
                <img src="assets/telegram.png" class="w-44 h-44 object-contain" alt="hero" />
              </div>
              <a href="/" class="underline text-white text-xl">Telegram 3</a>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-center flex-col bg-[#F2F2F2] h-fit w-full p-10 relative" id="faq">
          <h3 class="text-center font-bold mb-4 text-lg text-gray-800">FAQ</h3>
          <div class="flex justify-center items-center">
          </div>
        </div>
    </div>
    <script type="text/javascript">
        const contentBx = document.querySelector('.contentBx');
        const slidesText = contentBx.querySelectorAll('.content');
        var j = 0;

        function nextSlideText() {
            slidesText[j].classList.remove('active');
            j = (j + 1) % slidesText.length;
            slidesText[j].classList.add('active');
        }
    </script>
@endsection
