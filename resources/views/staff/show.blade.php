@extends('stafflayout')
@section('title', 'Staff Display')
@section('body')

<p>
    <button data-get="/staff">Index</button>
</p>

<form class="form">
    <label>Staff Id : </label>
    <b>{{ $s->staff_id }}</b>
    <br>
    
    <label>Password : </label>
    <span>{{ $s->password }}</span>
    <br>
    
    <label>First Name : </label>
    <span>{{ $s->first_name }}</span>
    <br>
    
    <label>Last Name : </label>
    <span>{{ $s->last_name }}</span>
    <br>
    
    <label>Email : </label>
    <span>{{ $s->email }}</span>
    <br>
    
    <label>Phone Number : </label>
    <span>{{ $s->phone_number }}</span>
    <br>
    
    <label>Position : </label>
    <span>{{ $s->position }}</span>
    <br>
    
    <label>Gender : </label>
    <span>{{ $s->gender }}</span>
    <br>
</form>
@endsection
