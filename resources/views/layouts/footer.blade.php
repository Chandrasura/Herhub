<div>
    <div>


        <footer class="bg-black2 w-full dark:bg-gray-900">
            <div class="mx-auto w-full max-w-screen-lg p-8 py-6 lg:py-8">
                <div class="md:flex md:justify-between items-center">
                    <div>
                        <img src="{{asset('assets/logo2.png')}}" alt="logo" class="object-contain" />
                        <ul class="text-white font-medium">
                            <li class="mb-4">
                                <p>Copyright © 2024 Westmetric.</p>
                                <p> All Rights Reserved</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-lg font-semibold text-white uppercase dark:text-white">QUICK LINKS
                        </h2>
                        <ul class="text-[#7B7B7B] font-medium">
                            <li class="mb-4">
                                <a href="#about" class="hover:underline">About us</a>
                            </li>
                            <li class="mb-4">
                                <a href="#faq" class="hover:underline">FAQ</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">T & C</a>
                            </li>
                            <li class="mb-4">
                                <a href="#events" class="hover:underline">Events</a>
                            </li>
                            <li>
                                <a href="#certificate" class="hover:underline">Certification</a>
                            </li>
                        </ul>
                    </div>
                    @php
                    use App\Models\Support;
                    $supports = Support::orderBy('name', 'ASC')->get();
                    @endphp
                    @if (count($supports) > 0)
                    <div>
                        <h2 class="mb-6 text-lg font-semibold text-white uppercase dark:text-white">SERVICE LISTS</h2>
                        <ul class="text-white font-medium">
                            @foreach ($supports as $support)
                            <li class="mb-4">
                                <a href="{{ $support->link }}" class="underline">{{ $support->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </footer>

    </div>
</div>
