<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <title>@yield('title')</title>
</head>

<body>
    <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">
    <!-- navbar -->
    <header class="bg-white z-50 sticky top-0 ">
        <div class="w-full mx-auto md:mx-auto flex justify-between flex-row items-center px-2 lg:px-24 py-3 lg:py-5">
            <a href="{{ route ('home') }}"
                class="flex text-primary font-eng text-xl lg:text-2xl title-font font-bold items-center md:mb-0">
                GAAC.ONE
            </a>

            <a href="{{ route ('login') }}"
                class="bg-primary text-white hover:bg-white border-2 border-primary hover:border-2 hover:border-primary hover:text-primary px-5 lg:px-10 py-1 lg:py-2 lg:text-2xl font-bangla rounded-full">
                লগইন
            </a>
        </div>
    </header>


    <!-- input  -->
    @yield('content')

    @yield('script')

</body>

</html>