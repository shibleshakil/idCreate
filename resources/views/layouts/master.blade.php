<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/551c06c85c.js" crossorigin="anonymous"></script>
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

    <title>@yield('title')</title>
</head>

<body class="bg-shade">

    <!-- navbar -->

    <header class="bg-white sticky top-0 z-50">
        <div class="w-full mx-auto md:mx-auto flex justify-center lg:justify-between flex-row items-center lg:px-24">
            <a href="{{ route ('home') }}"
                class="flex text-primary font-eng text-2xl title-font font-bold items-center mb-4 md:mb-0 hidden lg:block">
                GAAC.ONE
            </a>
            <nav class="md:mx-auto flex flex-row text-base justify-between w-full lg:w-[40%]">
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl border-b-4 border-b-primary"
                    href="{{ route ('home') }}"><img class=" w-6 lg:w-12" src="{{ asset ('nav_icon/home.svg') }}" alt="home"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="/homepage/mission.html"><img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/mission.png') }}"
                        alt="mission"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="/message/staff_message.html"><img class=" w-6 lg:w-12" src="{{ asset ('nav_icon/message.svg') }}"
                        alt="message"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="/news/news.html"><img class=" w-6 lg:w-12" src="{{ asset ('nav_icon/news.svg') }}" alt="news"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="{{ route ('id') }}"><img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/id.svg') }}" alt="id"></a>
                <a class="block lg:hidden w-full flex justify-center  float-left text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl"
                    href="/wallet/wallet.html"><img class=" w-6 lg:w-8" src="{{ asset ('nav_icon/wallet.png') }}" alt="wallet"></a>
            </nav>

            <div>

                <div class="lg:inline-block lg:relative hidden z-50">
                    <a href="/wallet/wallet.html"
                        class="bg-primary text-white hover:bg-white border-2 border-primary hover:border-2 hover:border-primary hover:text-primary px-5 lg:px-10 pb-1 pt-2  lg:text-xl font-bangla rounded-full">
                        <span class="mr-1">ওয়ালেট</span>
                    </a>
                </div>

            </div>

        </div>
    </header>
    <div id="alertDiv" class="flex flex-col md:flex-row  md:items-center bg-shade border-y-2 border-y-white">
        @if ($errors->any())
        <div class="alert alert-danger px-3 lg:px-24 py-4 text-left text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block px-3 lg:px-24 py-4 text-left text-green-500">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block px-3 lg:px-24 py-4 text-left text-red-500">
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>

    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    @yield('script')
    <!-- js script  -->
    <script>
        function logSubmit(event) {
            document.getElementById('no_company_text').innerHTML = ` 

            <div class="text-red-600 mx-auto text-center items-center text-lg lg:text-xl mt-12">
                আপনার খোঁজ করা কোম্পানিটি পাওয়া যায়নি
            </div>
            <div class="text-red-600 mx-auto text-center items-center text-lg lg:text-xl">
                কোম্পানিটি খোঁজে না পাওয়া গেলে করণীয়-
            </div>
            <ul class="flex flex-col md:w-1/2 lg:w-1/4 mx-auto text-center  items-center list-disc">
                <li class="text-text mt-8 text-start  text-lg lg:text-xl">
                    ভাল করে দেখুন বানানে কোন ভুল আছে কি না। 
                </li>
                <li class="text-text mt-8 text-justify  text-lg lg:text-xl">
                    আপনার কোম্পানীতে অন্য কেউ আইডি তৈরী করে থাকলে তার কাছ থেকে কোম্পানী কোড নিয়ে সার্চ করুন। কোম্পানী কোডটি প্রতিটি প্রোফাইলের শুরুতেই দেয়া আছে।
                </li>
                <li class="text-text mt-8 text-justify  text-lg lg:text-xl">
                    বানান সঠিক থাকার পরেও কোম্পানিটি খোঁজে না পাওয়া মানে উক্ত কোম্পানীটি এখনো কেউ যুক্ত করেনি। নিচের কোম্পানী যোগ অপশন থেকে যোগ করে নিন। এটি একদম সহজ। আপনিও পারবেন। 
                </li>
            </ul>
            <div class="p-2 w-full mt-5">
                <button type="submit"
                    class="flex flex justify-center items-center text-center mx-auto text-white bg-primary border-0 py-2 px-8 focus:outline-none hover:bg-shade_deep hover:text-text rounded-full text-lg">কোম্পানী যোগ করুন</button>
            </div>`;
            event.preventDefault();
        }
        search = document.getElementById('search')
        search = document.getElementById('search2')
        search.addEventListener('submit', logSubmit);

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#uploadImage").on('change', function(){
                $("#change-image-form").submit();
            });

            setTimeout(function() {
                $('#alertDiv').fadeOut('fast');
            }, 4000);
        });

        function changeImage(){
            $('#uploadImage').trigger('click');
            // let file = $('#uploadImage').val();
            // console.log(file);
        }
    </script>

</body>
</html>