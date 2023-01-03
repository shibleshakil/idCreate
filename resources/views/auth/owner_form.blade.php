@extends('layouts.auth.app')
@section('title', 'Owner Form')

@section('content')

<section class="font-bangla body-font relative bg-shade h-screen">
    <div class="container px-5 py-3 lg:py-12 mx-auto">
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
            <form action="{{ route ('ownerRegistration') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="flex flex-wrap -m-2">

                    <div class="font-bangla mx-auto font-semibold text-text  text-xl lg:text-2xl mb-3 mt-24 lg:mt-40">
                        মালিক আইডি ফর্ম
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm lg:text-lg text-text">আপনার নাম</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>

                    <div class="p-2 w-full lg:w-1/2">
                        <div class="relative">
                            <label for="mobile_number" class="leading-7 text-sm lg:text-lg text-text">মোবাইল
                                নাম্বার</label>
                            <input type="number" id="mobile_number" name="mobile_number"
                                value="{{old('mobile_number')}}" min="11"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 pr-3 pl-12 leading-8 transition-colors duration-200 ease-in-out"
                                required>

                            <div class="absolute top-[37px] left-2">+880</div>
                        </div>
                    </div>
                    <div class="p-2 w-full lg:w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm lg:text-lg text-text">ইমেইল ( যদি থাকে )
                            </label>
                            <input type="email" id="email" name="email" value="{{old('email')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>

                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label class="leading-7 text-sm lg:text-lg text-text">পাসওয়ার্ড দিন</label>
                            <input type="text" name="password" id="password"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>

                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label class="leading-7 text-sm lg:text-lg text-text">কনফার্ম পাসওয়ার্ড</label>
                            <input type="text" name="password_confirmation" id="password-confirm" type="password"
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