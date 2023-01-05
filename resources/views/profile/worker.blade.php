@extends('layouts.master')
@section('title', 'Worker Profile')
@section('content')
    <!-- profile   -->

    <div class="flex flex-col md:flex-row px-3 lg:px-24 py-4 md:items-center bg-shade">

        <div class=" flex  flex-row  space-x-5 font-bangla text-text items-center lg:w-1/3">
            @include('profile.image_section')
            <div class="flex flex-col justify-between items-start text-text">
                <div class="text-sm font-semibold lg:text-lg">{{$data->name}}</div>
                <div class="text-sm lg:text-lg">{{$data->section_name}}, {{$data->rank}}</div>
                <div class="text-sm lg:text-lg">গাকে জয়েনিং {{date('d-m-y', strtotime($data->created_at))}}</div>
            </div>
        </div>

        <div class="flex space-x-2 justify-between lg:justify-center w-full lg:w-1/3 items-center mx-auto pt-2 lg:pt-0">
            <div class="mt-1 md:mt-0 justify-center items-center text-center font-bangla text-text">
                <a href="#"
                    class="bg-primary border-2 hover:border-2 hover:border-primary w-full lg:w-64 mx-auto rounded-md py-1  px-5 space-x-2 md:space-x-5 lg:py-2 flex flex-row  justify-center text-center items-center">
                    <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">প্রোফাইল সম্পন্ন
                    </p>
                    <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">০০০%</p>
                </a>
            </div>
            <div class="justify-end items-end text-center font-bangla text-text block lg:hidden">
                <a href="#"
                    class="bg-primary w-full border-2 hover:border-2 hover:border-primary mt-1 lg:w-64 mx-auto rounded-md py-1 px-5 lg:py-2 flex flex-row  justify-center text-center items-center">
                    <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center"> আইডি তৈরী ও
                        শেয়ার </p>
                </a>
            </div>

        </div>
        <div class="flex  justify-end lg:w-1/3 items-end">
            <div class="justify-end items-end text-center font-bangla text-text hidden lg:block">
                <a href="#"
                    class="bg-primary w-full lg:w-64 mx-auto rounded-md py-1   sp lg:py-2 flex flex-row  justify-center text-center items-center">
                    <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">আইডি তৈরী ও
                        শেয়ার </p>
                </a>
            </div>
        </div>


    </div>




    <!-- hero mobile  -->
    <div class="block lg:hidden border-y-2 border-y-white">
        <div class="flex flex-col justify-center items-center w-full px-3 lg:px-10 py-4  font-bangla text-primary">
            <div class="flex flex-col justify-center items-center text-center space-x-2 md:space-x-5">
                <div class="text-lg lg:text-xl font-thin">আপনার কর্মরত কোম্পানিটি খোজে যুক্ত হোন</div>
                <div class="flex flex-row space-x-5">
                    <a href="#">
                        <div class="text-sm lg:text-lg">কিভাবে যুক্ত হবেন?</div>
                    </a>
                    <a href="#">
                        <div class="text-sm lg:text-lg">যুক্ত হলে কী হবে?</div>
                    </a>
                </div>


            </div>

            <form id="search" class="relative mt-4 w-full md:w-1/4">
                <div>
                    <input type="search" id="default-search"
                        class="block p-2 pl-10 w-full text-sm text-text bg-white rounded-full focus:ring-shade focus:border-shade">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </form>


        </div>
    </div>



    <!-- hero desktop  -->
    <div class="hidden lg:block border-y-2 border-y-white">
        <div class="flex flex-row justify-between items-center w-full px-3 lg:px-10 py-10 font-bangla text-primary">
            <div class="flex flex-col justify-between items-center text-center space-x-2 md:space-x-5">
                <div class="text-lg lg:text-xl font-thin">আপনার কর্মরত কোম্পানিটি খোজে যুক্ত হোন</div>



            </div>

            <form id="search2" class="relative w-2/3 md:w-1/4 mr-20">
                <div>
                    <input type="search" id="default-search"
                        class="block p-2 pl-10 w-full text-sm text-text bg-white rounded-full focus:ring-shade focus:border-shade">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </form>

            <div class="flex flex-row space-x-8">
                <a href="#">
                    <div class="text-sm lg:text-lg">কিভাবে যুক্ত হবেন?</div>
                </a>
                <a href="#">
                    <div class="text-sm lg:text-lg">যুক্ত হলে কী হবে?</div>
                </a>
            </div>


        </div>
    </div>
    <!-- no company found -->

    <div id="no_company_text" class="px-5 font-bangla">

    </div>

    @include('profile.common_links')
@endsection
@section('script')
@endsection
