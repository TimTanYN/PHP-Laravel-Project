@extends('layout')
@section('title', 'Products | Edit')

@section('body')
<p>
    <button data-get="/food">Index</button>
</p>

<form class="form" method="post" action="/food/{{ $f->food_id }}" enctype='multipart/form-data'>
    @csrf
    @method('put')

    <label>Id</label>
    <b>{{ $f->food_id }}</b>
    <br>
    <label>Name</label>
    <input name="name" maxlength="100" value="{{ old('name',$f) }}">
    <span class="err">@error('name')  {{ $message }}  @enderror</span>
    
    <label>Price</label>
    <input name="price" maxlength="5" value="{{ old('price',$f) }}">
    <span class="err">@error('price')  {{ $message }}  @enderror</span>
    
    <label>Photo</label>
    <label class="upload">
        <input type="file" name="photo" accept="image/*" hidden>
        <img src="/photos/{{ $f->photo }}">
    </label>
    <span class="err">@error('photo')  {{ $message }}  @enderror</span>
    
    <section>
        <button>Submit</button>
        <button type="reset">Reset</button>
    </section>
</form>
@endsection
