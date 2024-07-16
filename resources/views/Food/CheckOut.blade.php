@extends('layout')
@section('title', 'Checkout')

@section('body')
@if(count($foods) > 0)
<ul>
    @foreach($foods as $food)
    <li>{{ $food->name }} - ${{ $food->price }}</li>
    @endforeach
</ul>
@else
<p>No items selected for checkout.</p>
@endif
@endsection