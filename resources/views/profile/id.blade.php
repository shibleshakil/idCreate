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


    <title>ID</title>
</head>

<body class="bg-shade">

    <!-- navbar -->


    <!-- hero -->
    <div class="py-8 mx-auto text-center items-center lg:text-xl">
        <div class="w-full font-bangla mx-auto"> ইউজার সেটিংস সম্পর্কে <a href="#"
                class="text-primary hover:underline">বিস্তারিত জানুন</a> </div>
    </div>
    <hr class="bg-white h-[3px] mb-8">


    <div class="px-3 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto flex justify-between ">
        <p> ডিভাইস আইডি </p>
        <a href="#" class="text-lg lg:text-2xl text-primary px-4"><i class=" fa fa-pencil"></i></a>
    </div>


    <div class="px-3 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto flex justify-between space-x-1">
        <div class="w-11 h-11 bg-white rounded"></div>
        <div class="w-full h-11 bg-white rounded flex justify-between  items-center text-center  pl-2 pr-4 md:px-4">
            <p>{{auth()->user()->name}}</p>
            <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="bg-primary text-white border-2 border-primary hover:bg-white hover:text-primary rounded-full px-2 -mr-6 lg:-mr-16 lg:px-4 text-sm">লগ
                আউট</button>
            <a href="{{ route ('settings') }}" class="text-lg lg:text-2xl text-primary"><i class="	fa fa-gear"></i></a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</body>

</html>