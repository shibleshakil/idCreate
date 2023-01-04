<div onclick="changeImage()">
    <img class="w-16 lg:w-20 h-16 lg:h-20 bg-white" src="{{$data->image ?  asset ('/uploads/'.$data->image) : asset ('/nav_icon/avatar.png')}}" alt="">
</div>
<div style="display:none">
    <form id="change-image-form" method="post" action="{{ route ('changeImage') }}" enctype="multipart/form-data">@csrf
        <input type="file" name="image" id="uploadImage">
    </form>
</div>