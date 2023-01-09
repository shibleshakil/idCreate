@if ($errors->any() || Session::get('success') || Session::get('error'))
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
@endif