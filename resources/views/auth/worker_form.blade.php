@extends('layouts.auth.app')
@section('title', 'Worker Form')

@section('content')
<!-- input fields  -->
<section class="font-bangla body-font relative bg-shade min-h-screen">
    <div class="container px-5 py-6 lg:py-12 mx-auto">
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form action="{{ route ('workerRegistration') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="flex flex-wrap -m-2">

                    <div class="font-bangla mx-auto text-text font-semibold  text-xl lg:text-2xl mb-5 mt-10 lg:mt-32">
                        কর্মী আইডি ফর্ম
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm lg:text-lg text-text">আপনার নাম</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>

                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label for="section_name" class="leading-7 text-sm lg:text-lg text-text">কাজের নাম</label>
                            <input type="text" id="section_name" name="section_name" value="{{old('section_name')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>

                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label for="rank" class="leading-7 text-sm lg:text-lg text-text">পদবীর নাম</label>
                            <input type="text" id="rank" name="rank" value="{{old('rank')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>


                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="time" class="leading-7 text-sm lg:text-lg text-text">কত বছর ধরে কাজটি করেন
                            </label>
                            <div class="flex justify-between ">
                                <input type="number" id="service_year" name="service_year"
                                    value="{{old('service_year')}}"
                                    class="w-1/2 mr-2 bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    placeholder="বছর">
                                <input type="number" id="service_month" name="service_month"
                                    value="{{old('service_month')}}"
                                    class="w-1/2 ml-2 bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    placeholder="মাস">
                            </div>
                        </div>
                    </div>

                    <div class="p-2 w-full lg:w-1/2">
                        <div class="relative">
                            <label for="mobile_number" class="leading-7 text-sm lg:text-lg text-text">মোবাইল নাম্বার
                                দিন</label>
                            <input type="number" id="mobile_number" name="mobile_number"
                                value="{{old('mobile_number')}}" min="11"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 pr-3 pl-12 leading-8 transition-colors duration-200 ease-in-out"
                                required>

                            <div class="absolute top-[37px] left-2">+880</div>
                        </div>
                    </div>
                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label class="leading-7 text-sm lg:text-lg text-text">নতুন পাসওয়ার্ড দিন</label>
                            <input type="text" name="password" id="password"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>


                    <div class="p-2 w-full mt-8 lg:mt-12">
                        <button type="submit"
                            class="flex w-36 flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-1 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg">সাবমিট</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection