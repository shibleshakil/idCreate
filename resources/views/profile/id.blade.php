@extends('layouts.master')
@section('title', 'ID')
@section('content')

    <!-- navbar -->


    <!-- hero -->
    <div class="py-8 mx-auto text-center items-center lg:text-xl">
        <div class="w-full font-bangla mx-auto"> ইউজার সেটিংস সম্পর্কে <a href="#"
                class="text-primary hover:underline">বিস্তারিত জানুন</a> </div>
    </div>
    <hr class="bg-white h-[3px] mb-8">


    <div class="px-3 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto flex justify-between ">
        <p> ডিভাইস আইডি </p>
        <a href="#" class="text-lg lg:text-2xl text-primary px-4"><i class=" fa fa-pencil"></i></a>
    </div>


    <div class="px-3 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto flex justify-between space-x-1">
        <div class="w-11 h-11 bg-white rounded">
            <img class="w-11 h-11 bg-white rounded" src="{{auth()->user()->image ?  asset ('/uploads/'.auth()->user()->image) : asset ('/nav_icon/avatar.png')}}" alt="">
        </div>
        <div class="w-full h-11 bg-white rounded flex justify-between  items-center text-center  pl-2 pr-4 md:px-4">
            <p>{{auth()->user()->name}}</p>
            <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="bg-primary text-white border-2 border-primary hover:bg-white hover:text-primary rounded-full px-2 -mr-6 lg:-mr-16 lg:px-4 text-sm">লগ
                আউট</button>
            <a href="{{ route ('settings') }}" class="text-lg lg:text-2xl text-primary"><i class="	fa fa-gear"></i></a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

@endsection
@section('script')
@endsection