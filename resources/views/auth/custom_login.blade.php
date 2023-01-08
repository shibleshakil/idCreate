@extends('layouts.auth.app')
@section('title', 'Login')

@section('content')
    <!-- input  -->
    <section class="font-bangla body-font relative bg-shade h-screen flex items-center justify-center ">
        <div class="container px-5 py-0 mx-auto ">
            <div class="lg:w-1/4 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2 -mt-52">
                    <form action="{{ route ('login') }}" method="post">@csrf
                        <div class=" w-full -mt-5 ">
                            <div class="relative flex justify-center items-center text-center lg:text-lg">
                                <h1 class="font-bangla mx-auto  text-xl lg:text-2xl">{{__('Log in')}} </h1>
                            </div>
                        </div>

                        <div class="p-2 mt-16 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">{{__('ID mobile number')}}</label>
                                <input type="text" name="login"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>
                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">{{__('ID Password')}}</label>
                                <input type="password" name="password" id="password"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 pr-8 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                                    <div class="absolute top-[37px] right-2"><i class="fa fa-eye-slash" id="eye"></i></div>
                            </div>
                        </div>

                        <a href="{{ route ('forgotPasswordShow')}}" 
                            class="mb-4 w-full flex w-44 flex justify-center items-center text-center mx-auto text-primary hover:text-text  text-lg">{{__('Forgot password')}}?
                        </a>

                        <div class="p-2 w-full mt-1">
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
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block mx-auto my-auto py-4 text-center text-green-500">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <button type="submit"
                            class="flex w-36 flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-1 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
@endsection