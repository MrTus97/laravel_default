@if(session('msg'))
    {{ session('msg') }}
@endif
<form action='/store' method="post">
    <div class="">
        {{-- @if($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errorMessage }}
            </div>
        @endif --}}
        @error('msg')
            <div class="alert alert-danger text-center">{{$message}}</div>
        @enderror
    </div>
    <div class="">
        <input type="text" name="product_name" placeholder="Nhập ...">
        @error('product_name')
            <span style="color: red">{{$message}}</span>
        @enderror
    </div>
    @csrf
    <button type="submit">Submit</button>
</form>