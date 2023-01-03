@extends('layouts.auth.app')
@section('title', 'CONGRATULATION')
@section('content')

  <!-- input fields  -->

    <section class="font-bangla body-font relative bg-shade h-screen flex items-center justify-center ">
        <div class="container px-5 py-0 mx-auto ">
            <div class="lg:w-1/4 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2 -mt-56 md:-mt-44">

                    <div class="p-4 w-full ">
                        <div class="relative flex justify-center items-center text-center lg:text-lg">
                            <h1 class="font-bangla mx-auto  text-xl lg:text-2xl font-semibold">অভিনন্দন</h1>
                        </div>
                    </div>
                    <div class="p-2 w-full ">
                        <div class=" flex justify-center items-center text-center">
                            <h1>আপনার একাউন্ট সম্পন্ন হয়েছে একদম উপরের ডানকোণে থাকা লগইন অপশনে ক্লীক করে
                                আপনার আইডি নম্বর ও পাসওয়ার্ড দ্বারা</h1>

                        </div>
                    </div>



                    <a href="{{ route ('login') }}" class="w-full mt-4">
                        <button type="submit"
                            class="flex w-36 flex justify-center items-center text-center mx-auto text-primary hover:text-text  text-lg">লগইন করুন</button>
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')
@endsection
