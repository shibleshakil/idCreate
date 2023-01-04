@extends('layouts.master')
@section('title', 'Buyer Profile')
@section('content')
<!-- profile   -->

<div class="flex flex-col md:flex-row px-3 lg:px-24 py-4 md:items-center bg-shade">

    <div class=" flex  flex-row  space-x-5 font-bangla text-text items-center lg:w-1/3">
        @include('profile.image_section')
        <div class="flex flex-col justify-between items-start text-text">
            <div class="text-sm font-semibold lg:text-lg">{{$data->name}}</div>
            <div class="text-sm lg:text-lg">{{ucwords(strtolower($data->category))}}</div>
            <div class="text-sm lg:text-lg">Gaac join {{date('d-m-y', strtotime($data->created_at))}}</div>
        </div>
    </div>

    <div class="flex space-x-2 justify-between lg:justify-center w-full lg:w-1/3 items-center mx-auto pt-2 lg:pt-0">
        <div class="mt-1 md:mt-0 justify-center items-center text-center font-bangla text-text">
            <a href="../profile_data/buyer_profile_data.html"
                class="bg-primary border-2 hover:border-2 hover:border-primary w-full lg:w-64 mx-auto rounded-md py-1  px-5 space-x-2 md:space-x-5 lg:py-2 flex flex-row  justify-center text-center items-center">
                <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">Profile data
                </p>
                <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">000%</p>
            </a>
        </div>
        <div class="justify-end items-end text-center font-bangla text-text block lg:hidden">
            <a href="../help/share.html"
                class="bg-primary w-full border-2 hover:border-2 hover:border-primary mt-1 lg:w-64 mx-auto rounded-md py-1 px-5 lg:py-2 flex flex-row  justify-center text-center items-center">
                <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">Share your
                    friends</p>
            </a>
        </div>

    </div>
    <div class="flex  justify-end lg:w-1/3 items-end">
        <div class="justify-end items-end text-center font-bangla text-text hidden lg:block">
            <a href="../help/share.html"
                class="bg-primary w-full lg:w-64 mx-auto rounded-md py-1   sp lg:py-2 flex flex-row  justify-center text-center items-center">
                <p class="text-white hover:text-shade_deep text-sm lg:text-xl text-center items-center">Share your
                    friends</p>
            </a>
        </div>
    </div>


</div>

<!-- navbar order  -->

<nav class="w-full md:ml-auto md:mr-auto flex flex-row items-center text-base bg-white justify-between font-bangla">
    <a class="w-1/4 text-primary text-center px-2 md:px-8 lg:px-10 py-1 lg:py-5 hover:bg-shade text-sm lg:text-2xl border-b-4 border-b-primary"
        href="../profile/order.html">Order</i></a>
    <a class="w-1/4 text-primary text-center px-2 md:px-8 lg:px-10 py-1 lg:py-5 hover:bg-shade text-sm lg:text-2xl"
        href="../profile/save_order.html">Save</i></a>
    <a class="w-1/4 text-primary text-center px-2 md:px-8 lg:px-10 py-1 lg:py-5 hover:bg-shade text-sm lg:text-2xl"
        href="../profile/current_order.html">Running</i></a>
    <a class="w-1/4 text-primary text-center px-2 md:px-8 lg:px-10 py-1 lg:py-5 hover:bg-shade text-sm lg:text-2xl"
        href="../profile/complete_order.html">Complete</i></a>
</nav>

<div
    class="m-auto flex flex-col w-full lg:w-1/3 px-2 pt-32 item-center text-center text-text text-lg lg:text-xl font-bangla mt-16">
    <p class="text-justify">
        Gaac can not yet to launch the order system. According to
        buyer join situation, Gaac will launch the order system. So
        please share to join everyone you know. Of course gaac will
        call you, after launch the order system. Thanks.
    </p>

    <a href="../share/share.html" class="mt-10 text-primary hover:underline">Share</a>
</div>
@endsection
@section('script')
@endsection
