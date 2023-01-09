@extends('layouts.master')
@section('title', 'ID')
@section('content')

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
        <div class="w-11 h-11 bg-white rounded">
            <img class="w-11 h-11 bg-white rounded" src="{{auth()->user()->image ?  asset ('/uploads/'.auth()->user()->image) : asset ('/nav_icon/avatar.png')}}" alt="">
        </div>
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

    <div class="px-3 py-4 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto space-x-1 ">
        <a href="{{ route ('addAssociatedIdForm') }}" class="w-full font-bangla bg-primary">
            <div
                class="flex bg-primary flex justify-center items-center text-center mx-auto text-white  border-0 py-2  focus:outline-none hover:bg-shade_deep hover:text-text rounded text-sm lg:text-lg">
                সহযোগী আইডি যোগ করুন</div>
        </a>
    </div>
    
    <div class="px-3 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto flex justify-between ">
        <p> সহযোগী আইডি</p>
    </div>
    
    @php
        $associateIds = explode(',', auth()->user()->associate_id);
        $users = App\Models\User::where('is_active', 1)->get();
    @endphp
    @if (sizeof($associateIds) > 0)
        @foreach ($associateIds as $associate)
            @php
                $associateUser = $users->where('id', $associate)->first();
            @endphp
            @if ($associateUser)
            <div class="mb-3 px-3 text-text font-bangla text-sm lg:text-lg w-full lg:w-1/3 mx-auto flex justify-between space-x-1">
                <div class="w-11 h-11 bg-white rounded">
                    <img class="w-11 h-11 bg-white rounded" src="{{$associateUser->image ?  asset ('/uploads/'.$associateUser->image) : asset ('/nav_icon/avatar.png')}}" alt="">
                </div>
                <div class="w-full h-11 bg-white rounded flex justify-between items-center text-center pl-2 pr-4 md:px-4">
                    <p>{{$associateUser->name}}</p>
                    <button type="button" onclick="associateLoginAttempt('{{ route('associateLogin', ['id'=>auth()->user()->id, 'targetId'=>$associateUser->mobile_number]) }}')"
                        class="bg-white text-primary hover:text-white hover:bg-primary border-2 border-primary rounded-full px-5  lg:px-7 -mr-6 lg:-mr-16 text-sm">লগ ইন
                    </button>
                    <button type="button" onclick="associateIdDelete('{{ route('associateIdDelete', ['targetId'=>$associateUser->id]) }}')"
                        class="text-lg lg:text-2xl text-primary"><i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
            @endif
        @endforeach
    @endif

@endsection
@section('script')
    <script type="text/javascript">
        function associateLoginAttempt(url){
            let renderUrl = "{{ route ('profile') }}";
            $.ajax({
                url: url,
                type: "put",
                data: {
                    "_token": $('#csrfToken').val(),
                },
                success: function (result) {
                    window.location = renderUrl;
                }
            });
        }

        function associateIdDelete(url){
            $.ajax({
                url: url,
                type: "delete",
                data: {
                    "_token": $('#csrfToken').val(),
                },
                success: function (result) {
                    alert(result);
                    location.reload();
                }
            });
        }
    </script>
@endsection