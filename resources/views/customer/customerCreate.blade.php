@extends('order.layout')
@section('content')
<div class="card">
  <div class="card-header">Create New Customer Page</div>
  <div class="card-body">
      
      <form action="{{ url('customer') }}" method="post">
        {!! csrf_field() !!}
        <label>Email</label></br>
        <input type="email"  name="email" id="email" class="form-control"></br>
        <label>Password</label></br>
        <input type="password" name="password" id="password" class="form-control"></br>
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Phone</label></br>
        <input type="tel" pattern="[0-9]{3}-[0-9]{7,8}" placeholder="012-3456789" name="phone" id="phone" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ route('customerList') }}" class="btn btn-danger btn-sm" title="Cancel">
                        <i class="fa fa-plus" aria-hidden="true"></i> Cancel
                    </a>
    </form>
  
  </div>
</div>
@stop