<nav class="md:mx-auto flex flex-row text-base justify-between w-full lg:w-[40%]">
    <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl @if($url == 'profile') border-b-4 border-b-primary @endif"
        href="{{ route ('profile') }}">
        <img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/home.svg') }}" alt="home">
    </a>
    <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
        href="#">
        <img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/mission.png') }}" alt="mission">
    </a>
    <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
        href="#">
        <img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/message.svg') }}" alt="message">
    </a>
    <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl "
        href="#">
        <img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/plan.png') }}" alt="plan">
    </a>
    <a class=" w-full flex justify-center text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl @if($url == 'id' || $url == 'changePasswordForm' || $url == 'changeIDForm' || $url == 'settings') border-b-4 border-b-primary @endif"
        href="{{ route ('id') }}">
        <img class=" w-6 lg:w-12" src="{{ asset ('/nav_icon/id.svg') }}" alt="id">
    </a>
    <a class="block lg:hidden w-full flex justify-center  float-left text-primary text-center px-3 md:px-10 lg:px-10 py-3 lg:py-5 hover:bg-shade text-2xl lg:text-3xl"
        href="#">
        <img class=" w-6 lg:w-8" src="{{ asset ('/nav_icon/wallet.png') }}" alt="wallet">
    </a>
</nav>

<div>
    <div class="lg:inline-block lg:relative hidden z-50">
        <a href="#" class="bg-primary text-white hover:bg-white border-2 border-primary hover:border-2 hover:border-primary hover:text-primary px-5 lg:px-10 pb-1 pt-2  lg:text-xl font-bangla rounded-full">
            <span class="mr-1">ওয়ালেট</span>
        </a>
    </div>
</div>