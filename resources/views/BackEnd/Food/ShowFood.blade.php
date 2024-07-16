@extends('layout')
@section('title', 'Foods | Show')

@section('body')
<p>
    <button data-get="/food">Index</button>
</p>

<form class="form">
    <label>Id</label>
    <b>{{ $f->food_id }}</b>
    <br>
    
    <label>Name</label>
    <span>{{ $f->name }}</span>
    <br>
    
    <label>Price</label>
    <span>{{ $f->price }}</span>
    <br>
    
    <label>Photo</label>
    <img src="/photos/{{ $f->photo }}" class="photo">
    <br>
</form>
@endsection
