@extends('layout')
@section('title', 'Foods | Create')

@section('body')
<p>
    <button data-get="/food">Index</button>
</p>

<form method="post" action="/food" enctype="multipart/form-data">
    @csrf
    <label for="name">Food ID:</label>
    <input type="text" maxlength="5" id="food_id" name="food_id" data-upper value="{{ old('food_id') }}">
    <br>
    <span class="err">@error('id') {{ $message }} @enderror</span>
    <label for="name">Food name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <span class="err">@error('name') {{ $message }} @enderror</span>
    <br>
    <label for="price">Food price:</label>
    <input type="text" id="price" name="price" value="{{ old('price') }}">
    <span class="err">@error('price') {{ $message }} @enderror</span>
    <br>
    <label for="photo">Select a photo:</label>
    <label class="upload">
        <input type="file" name="photo" accept="image/*" hidden>
        <img src="/photos/0.jpg">
    </label>
    <span class="err">@error('photo') {{ $message }} @enderror</span>
    <br>

    <section>
        <button>Submit</button>
        <button type="reset">Reset</button>
    </section>
</form>
@endsection