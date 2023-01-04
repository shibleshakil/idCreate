<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
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
                        text: '#0B2445',
                        shade_deep: '#C4DDFF'
                    },
                    fontFamily: {
                        'eng': ['Poppins', 'sans-serif'],
                        'bangla': ['Noto Sans Bengali', 'sans-serif']
                    },

                }
            }
        }
    </script>

    <title>GAAC</title>
</head>

<body class="bg-shade_deep">

    <!-- navbar -->
    <header class="bg-white ">
        <div class="w-full mx-auto md:mx-auto flex justify-between flex-row items-center px-2 lg:px-24 py-3 lg:py-5">
            <a href="{{route ('home') }}"
                class="flex text-primary font-eng text-xl lg:text-2xl title-font font-bold items-center md:mb-0">
                GAAC.ONE
            </a>

            <div class="flex flex-row justify-center space-x-2 lg:space-x-5 items-center text-center">
                <div class="dropdown lg:inline-block ">
                    <button class="text-primary font-semibold text-xl lg:text-2xl inline-flex">
                        <span class="mr-1">{{__('Translate')}}</span>
                        <svg class="fill-current h-4 w-4 mt-2 lg:mt-3" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu absolute hidden text-gray-700">
                        <li class=""><a
                                class="rounded-t bg-shade_deep hover:bg-primary font-bold hover:text-white py-2 px-8 text-black block whitespace-no-wrap"
                                href="{{ route('language', 'bn') }}">বাংলা</a></li>
                        <li class=""><a
                                class="rounded-b bg-shade_deep hover:bg-primary font-bold py-2 px-8 text-black hover:text-white block whitespace-no-wrap"
                                href="{{ route('language', 'en') }}">English</a></li>
                    </ul>
                </div>
                @guest
                    
                <a href="{{ route ('login') }}"
                    class="bg-primary text-white hover:bg-white border-2 border-primary hover:border-2 hover:border-primary hover:text-primary px-5 lg:px-10 py-1 lg:py-2 lg:text-2xl font-bangla rounded-full">
                    {{__('Login')}}
                </a>

                @else
                    
                <a href="{{ route ('profile') }}"
                    class="bg-primary text-white hover:bg-white border-2 border-primary hover:border-2 hover:border-primary hover:text-primary px-5 lg:px-10 py-1 lg:py-2 lg:text-2xl font-bangla rounded-full">
                    {{__('Profile')}}
                </a>
                
                @endguest
            </div>


        </div>
    </header>
    <!-- welcome      -->

    <section class="bg-shade py-10 md:py-24 px-5 mx-auto ">
        <div class="flex flex-col items-start mx-auto w-full md:w-1/2 lg:w-1/3 text-text font-bangla">
            <div class="text-xl md:text-2xl lg:text-3xl font-semibold">{{__('Welcome')}}</div>
            <div class="text-lg md:text-xl lg:text-2xl text-justify w-full inline-block">{{__('Home Page Welcome Note')}}</div>

            <div
                class="flex flex-row justify-between items-center text-lg md:text-xl lg:text-2xl text-white w-full pt-5">
                <a href="./homepage/digital_service.html"
                    class="bg-primary rounded-md text-center items-center px-2 lg:px-4 py-1 hover:text-shade_deep">{{__('Digital service')}}</a>
                <a href="./message/guest_message.html"><img class="w-10 " src="{{ asset('nav_icon/msg5.png')}}"
                        alt="message"></a>
            </div>
        </div>
    </section>

    <!-- hero    -->
    <section class="bg-shade_deep py-10 md:py-24 px-5 mx-auto">
        <div
            class="flex flex-col items-center mx-auto w-full md:w-1/2 text-text text-lg md:text-xl lg:text-2xl font-bangla">
            <div>{{__('Create id as per your category')}}</div>
            <div class="pt-10 flex flex-col mx-auto items-center w-full text-sm md:text-xl lg:text-2xl mt-8 ">
                <a href="#"
                    class="bg-white border-2 hover:border-2 hover:border-primary text-primary rounded-full w-44 py-2 text-center"
                    id="company">{{__('Company')}}</a>
                <div id="owner" class="hidden w-full mx-auto items-center">
                    <div
                        class="flex flex-row space-x-2 lg:space-x-8 py-4 w-full items-center mx-auto justify-center mt-8">
                        <a href="{{ route ('ownerRegistrationForm') }}"
                            class="bg-primary text-white rounded-full w-1/3 lg:w-44 py-2 text-center hover:text-shade_deep text-sm md:text-xl lg:text-2xl">{{__('Owner')}}</a>
                        <a href="{{ route ('staffRegistrationForm') }}"
                            class="bg-primary text-white rounded-full w-1/3 lg:w-44 py-2 text-center hover:text-shade_deep text-sm md:text-xl lg:text-2xl">{{__('Staff')}}</a>
                        <a href="{{ route ('workerRegistrationForm') }}"
                            class="bg-primary text-white rounded-full w-1/3 lg:w-44 py-2 text-center hover:text-shade_deep text-sm md:text-xl lg:text-2xl">{{__('Worker')}}</a>
                    </div>
                </div>
                <a href="{{ route ('buyerRegistrationForm') }}"
                    class="bg-primary hover:text-shade_deep text-white rounded-full w-44 py-2 text-center mt-12"
                    id="buyer">{{__('Buyer')}}</a>
            </div>

        </div>
    </section>

    <script>
        company = document.getElementById('company')
        owner = document.getElementById('owner')
        buyer = document.getElementById('buyer')
        opened = false
        company.addEventListener('click', (e) => {
            if (opened === false) {
                owner.style.display = 'block'
                buyer.style.display = 'none';
                opened = true
            }
            else {
                owner.style.display = 'none'
                buyer.style.display = 'block';
                opened = false
            }
        })
    </script>

</body>

</html>