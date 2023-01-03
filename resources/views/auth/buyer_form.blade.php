@extends('layouts.auth.app')
@section('title', 'Buyer Form')
@section('content')

<!-- input fields  -->

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
            <form action="{{ route ('buyerRegistration') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="flex flex-wrap -m-2 form-body">
                    <div class="font-bangla mx-auto font-semibold text-text  text-xl lg:text-2xl mt-8 lg:mt-32">
                        Buyer id form
                    </div>


                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm lg:text-lg text-text">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>


                    <div class="p-2 w-full lg:w-1/2" id="category4">
                        <div class="relative">
                            <label for="category" class="leading-7 text-sm lg:text-lg text-text">Category</label>
                            <select name="category" id="category" required
                                class="w-full h-11 bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option class="hidden" id="selction_category"> </option>
                                <option value="garments" id="garments">garments</option>
                                <option value="accessories">accessories</option>
                                <option value="garments_accessories">garments & accessories</option>
                                <option value="others">others</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-2 w-full lg:w-1/2 hidden" id="category3">
                        <div class="relative">
                            <label for="category2" class="leading-7 text-sm lg:text-lg text-text">Category</label>
                            <input type="text" id="category2" name="category_other" min="11"
                                value="{{old('category_other')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <img id="arrow" class="absolute right-2 top-11 w-3"
                                src="{{ asset ('nav_icon/arrow-down-sign-to-navigate.png')}}" alt="">
                        </div>
                    </div>


                    <div class="p-2 w-full lg:w-1/2">
                        <div class="relative">
                            <label for="nationality" class="leading-7 text-sm lg:text-lg text-text">Nationality</label>
                            <input type="text" id="nationality" name="nationality" min="11"
                                value="{{old('nationality')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>


                    <div class="p-2 w-full lg:w-1/2">
                        <div class="relative">
                            <label for="mobile_number" class="leading-7 text-sm lg:text-lg text-text">Mobile
                                number</label>
                            <input type="number" id="mobile_number" name="mobile_number" min="11"
                                value="{{old('mobile_number')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>
                    <div class="p-2 w-full lg:w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm lg:text-lg text-text">Email (optional)</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>


                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label class="leading-7 text-sm lg:text-lg text-text">New password</label>
                            <input type="text" name="password" id="password" type="password"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>
                    <div class="p-2 w-full lg:w-1/2 ">
                        <div class="relative">
                            <label class="leading-7 text-sm lg:text-lg text-text">Confirm password</label>
                            <input type="text" name="password_confirmation" id="password-confirm" type="password"
                                class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                required>
                        </div>
                    </div>

                </div>
                <div class="p-2 w-full mt-8 lg:mt-12">
                    <button type="submit"
                        class="flex w-36 flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-1 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    category = document.getElementById('category');
    arrow = document.getElementById('arrow');
    category.onchange = (event) => {
        var inputText = event.target.value;
        if (inputText == 'others') {
            document.getElementById('category3').style.display = 'block';
            document.getElementById('category4').style.display = 'none';

        }

    }
    arrow.addEventListener("click", (e) => {
        document.getElementById('category3').style.display = 'none';
        document.getElementById('category4').style.display = 'block';
        document.getElementById('category').value = 'selction_category';
    })
</script>
@endsection