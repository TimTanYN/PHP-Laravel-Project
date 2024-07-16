@extends('rewardlayout')
@section('title', 'Reward Display')
@section('body')

<p>
    <button data-get="/reward">Index</button>
</p>

<form class="form">
    <label>Reward Id : </label>
    <b>{{ $r->id }}</b>
    <br>
    
    <label>Code : </label>
    <span>{{ $r->code }}</span>
    <br>
    
    <label>Name : </label>
    <span>{{ $r->name }}</span>
    <br>
    
    <label>Type : </label>
    <span>{{ $r->type }}</span>
    <br>
    
    <label>Description : </label>
    <span>{{ $r->description }}</span>
    <br>
    
    <label>Discount : </label>
    <span>{{ $r->discount }}</span>
    <br>
   
</form>
@endsection
