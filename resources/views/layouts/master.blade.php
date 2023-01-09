<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/551c06c85c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset ('css/style.css?v1.1')}}">
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
    <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">

    <!-- navbar -->

    <header class="bg-white sticky top-0 z-50">
        <div class="w-full mx-auto md:mx-auto flex justify-center lg:justify-between flex-row items-center lg:px-24">
            <a href="{{ route ('profile') }}"
                class="flex text-primary font-eng text-2xl title-font font-bold items-center mb-4 md:mb-0 hidden lg:block">
                GAAC.ONE
            </a>
            @if (auth()->user()->role_id == 1 )
                @include('layouts.navbar.owner')
            @elseif (auth()->user()->role_id == 2 )
                @include('layouts.navbar.staff')
            @elseif (auth()->user()->role_id == 3 )
                @include('layouts.navbar.worker')
            @elseif (auth()->user()->role_id == 4 )
                @include('layouts.navbar.buyer')
            @else
            <nav class="md:mx-auto flex flex-row text-base justify-between w-full lg:w-[40%]">
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl border-b-4 border-b-primary"
                    href="{{ route ('home') }}"><img class=" w-6 lg:w-12" src="{{ asset ('nav_icon/home.svg') }}" alt="home"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="#"><img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/mission.png') }}"
                        alt="mission"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="#"><img class=" w-6 lg:w-12" src="{{ asset ('nav_icon/message.svg') }}"
                        alt="message"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="#"><img class=" w-6 lg:w-12" src="{{ asset ('nav_icon/news.svg') }}" alt="news"></a>
                <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
                    href="{{ route ('id') }}"><img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/id.svg') }}" alt="id"></a>
                <a class="block lg:hidden w-full flex justify-center  float-left text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl"
                    href="#"><img class=" w-6 lg:w-8" src="{{ asset ('nav_icon/wallet.png') }}" alt="wallet"></a>
            </nav>

            <div>

                <div class="lg:inline-block lg:relative hidden z-50">
                    <a href="#"
                        class="bg-primary text-white hover:bg-white border-2 border-primary hover:border-2 hover:border-primary hover:text-primary px-5 lg:px-10 pb-1 pt-2  lg:text-xl font-bangla rounded-full">
                        <span class="mr-1">ওয়ালেট</span>
                    </a>
                </div>

            </div>
            @endif

        </div>
    </header>

    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    @yield('script')
    <!-- js script  -->
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
        }
    </script>

</body>
</html>