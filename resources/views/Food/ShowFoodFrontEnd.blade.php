@extends('layout')
@section('title', 'Choose the Food you like')

@section('body')

<form method="POST" action="/checkout">
    @csrf
    @foreach($food as $f)
    <div>
        <input type="checkbox" name="food_id[]" value="{{ $f->food_id }}">
        <label><img src="/photos/{{ $f->photo }}"/>{{ $f->name }} - ${{ $f->price }}</label>
    </div>
    @endforeach
    <button type="submit">Checkout</button>
</form>
@endsection