@extends('layouts.app')
@section('content')
    <div class='min-h-screen w-full'>
        <header>
            @include('layouts.header')
        </header>
        <div class='h-fit w-full bg-gradient-to-r from-[#84269C] to-[#78249C] flex justify-center items-center'>
            <div class="glassmorphism w-4/5 h-4/5 rounded-lg p-16 my-10">
                <form method="POST" class="mx-auto w-3/5" action="{{ route('logout') }}">
                    @csrf
                    @method('post')
                    <h4 class="text-white text-2xl text-center font-bold">Are you sure you want to log out?</h4>
                    <div class="flex justify-center gap-4 items-center flex-col mt-16">
                        <a href="{{ route('user.profile') }}" type="button" class="text-center py-2 w-3/5 bg-none border border-[#] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Cancel</a>
                        <button type="submit" class="py-2 w-3/5 bg-gradient-to-r from-[#28A6EF] to-[#1323A0] text-white text-md font-semibold rounded-[20px] focus:ring-4 focus:ring-blue-200 focus:outline-none focus:ring-offset-2 dark:bg-blue-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
