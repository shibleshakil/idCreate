<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset ('css/style.css?v1')}}">
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1479ff',
                        shade: '#E7F1FF',
                        shade_deep: '#C4DDFF',
                        text: '#0B2445'
                    },
                    fontFamily: {
                        'eng': ['Poppins', 'sans-serif'],
                        'bangla': ['Noto Sans Bengali', 'sans-serif']
                    },

                }
            }
        }
    </script>

    <title>Set id number</title>
</head>

<body>
    <!-- navbar -->
    <!-- input  -->
    <section class="font-bangla body-font relative bg-shade h-screen flex items-center justify-center ">
        <div class="container px-5 py-0 mx-auto ">
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
            <div class="lg:w-1/4 md:w-2/3 mx-auto">
                <form action="{{ route ('changeID') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="flex flex-wrap -m-2 -mt-56 md:-mt-44">

                        <div class="p-10 w-full">
                            <div class="relative flex justify-center items-center text-center lg:text-lg">
                                <h1 class="font-bangla mx-auto  text-xl lg:text-2xl">আইডি নাম্বার পরিবর্তন </h1>
                            </div>
                        </div>

                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">বর্তমান আইডি মোবাইল নাম্বার</label>
                                <input type="text" name="current_mobile_number" value="{{old('current_mobile_number')}}" id="current_mobile_number"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>
                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">আইডি পাসওয়ার্ড</label>
                                <input type="text" name="password" value="{{old('password')}}" id="password"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>
                        <div class="p-2 w-full ">
                            <div class="relative">
                                <label class="leading-7 text-sm lg:text-lg text-text">নতুন মোবাইল নাম্বার</label>
                                <input type="text" name="mobile_number" value="{{old('mobile_number')}}" id="mobile_number"
                                    class="w-full bg-white rounded border focus:border-shade_deep focus:bg-white focus:ring-1 text-base outline-none text-primary py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    required>
                            </div>
                        </div>


                        <div class="p-2 w-full mt-8">
                            <button type="submit"
                                class="flex w-36 flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-1 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg">সাবমিট</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>