@extends('layouts.auth.app')
@section('title', 'Forgot password')

@section('content')
    <!-- input  -->
    <section class="font-bangla body-font relative bg-shade h-screen flex items-center justify-center ">
        <div class="container px-5 py-0 mx-auto ">
            <div class="lg:w-1/4 md:w-2/3 mx-auto">
                <form action="{{ route ('forgotOtpVarify') }}" method="post">@csrf
                
                    <div class="flex flex-wrap -m-2 -mt-72">
        
                        <div class="px-2 py-10 w-full ">
                            <div class="relative flex justify-center items-center text-center lg:text-xl mb-5 mt-32">
                                <h1>{{__('We sent you a OTP code, submit it')}}</h1>
                            </div>
                        </div>
                        <div class="p-2 w-full ">
                            <input type="hidden" name="mobile_number" value="{{\Session::get('mobile_number')}}">
                            <input type="text" name="code" id="code" value="{{old('code')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>
                    </div>
        
                    <div class="p-2 w-full mt-4">
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
                            class="flex w-36 flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-1 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg mt-10">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('script')
@endsection