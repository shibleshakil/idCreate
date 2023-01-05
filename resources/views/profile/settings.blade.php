@extends('layouts.master')
@section('title', 'Settings')
@section('content')
<!-- input  -->

<div class="py-8 mx-auto text-center items-center lg:text-xl">
    <div class="w-full font-bangla mx-auto"> ইউজার সেটিংস সম্বন্ধে 
        <a href="#" class="text-primary hover:underline"> বিস্তারিত জানুন </a> </div>
</div>
<hr class="bg-white h-[3px]">


<!-- hero -->
<div class="pt-2 pb-6">
    <div class="w-36 h-36 bg-white rounded mx-auto mt-8">
        <img class="w-36 h-36 bg-white rounded mx-auto" src="{{auth()->user()->image ?  asset ('/uploads/'.auth()->user()->image) : asset ('/nav_icon/avatar.png')}}" alt="">
    </div>
</div>

<div class="pb-3">
    <div class="lg:w-1/3 w-full text-center font-bold mx-auto text-text font-bangla text-lg lg:text-xl mt-8 lg:mt-16">
        {{auth()->user()->name}}
    </div>
</div>
<div class="pb-6">
    <div class="lg:w-1/3 w-full text-center mx-auto text-text font-bangla  text-lg lg:text-xl">{{auth()->user()->rank}}</div>
</div>



<div class="pb-6  px-3">
    <a href="{{ route ('changePasswordForm') }}"
        class="flex w-full font-bangla lg:w-1/4 flex justify-center items-center text-center mx-auto hover:text-white bg-white border-0 py-2 px-8 focus:outline-none hover:bg-primary text-primary rounded border-2 text-sm lg:text-lg mt-8">
            পাসওয়ার্ড পরিবর্তন 
    </a>
</div>
<div class="px-3 pb-6">
    <a href="{{ route ('changeIDForm') }}" 
        class="flex w-full font-bangla lg:w-1/4 flex justify-center items-center text-center mx-auto hover:text-white bg-white border-0 py-2 px-8 focus:outline-none hover:bg-primary text-primary rounded border-2 text-sm lg:text-lg">
        আইডি নাম্বার পরিবর্তন
    </a>
</div>
@if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
   <div class="px-3 pb-6">
        <a href="#" class="w-full font-bangla">
            <button type="submit"
                class="flex w-full lg:w-1/4 flex justify-center items-center text-center mx-auto hover:text-white bg-white border-0 py-2 px-8 focus:outline-none hover:bg-primary text-primary rounded border-2 text-sm lg:text-lg">ডিভাইস ম্যানেজমেন্ট </button>
        </a>
    </div>
@endif

@endsection
@section('script')
@endsection
