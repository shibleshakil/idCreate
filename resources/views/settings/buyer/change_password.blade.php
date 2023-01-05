@extends('layouts.master')
@section('title', 'Set Password')
@section('content')
    <!-- input  -->

    <!-- input  -->

    <section class="font-bangla body-font relative bg-shade h-screen flex items-center justify-center ">
        <div class="container px-5 py-0 mx-auto ">
            <div class="lg:w-1/4 md:w-2/3 mx-auto">
                <form action="{{ route ('buyerChangePassword') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="flex flex-wrap -m-2 -mt-56 md:-mt-44">

                        <div class="p-10 w-full">
                            <div class="relative flex justify-center items-center text-center lg:text-lg">
                                <h1 class="font-bangla mx-auto  text-xl lg:text-2xl">Change password </h1>
                            </div>
                        </div>

                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">Old password</label>
                                <input type="text" name="old_password" id="old_password"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>
                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">New password</label>
                                <input type="text" name="password" id="password"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>
                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">Confirm password</label>
                                <input type="text" name="password_confirmation" id="password-confirm"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>

                        <div class="w-full mt-4 lg:mt-4">
                            @if ($errors->any())
                                <div class="alert alert-danger mx-auto my-auto py-4 text-center text-red-500">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block mx-auto my-auto py-4 text-center text-red-500">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <button type="submit"
                                class="flex w-36 flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-1 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('script')
@endsection