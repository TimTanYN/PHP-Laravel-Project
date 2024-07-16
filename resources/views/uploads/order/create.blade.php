@extends('order.layout')
@section('content')
<div class="card">
  <div class="card-header">Create New Order Page</div>
  <div class="card-body">
      
      <form action="{{ route('order.processOrder') }}" method="post">
        {!! csrf_field() !!}
        <label for="customer">Customer ID</label>
        <select name="customer" id="customer">
        @foreach($customer as $c)
        <option>{{$c->customer_id}}</option>
        @endforeach
        </select></br>
        <label>Total</label></br>
        <input type="number" step="0.01" name="total" id="total" class="form-control"></br>
        <label>Payment Method</label></br>
        <input type="text" name="paymentMethod" id="paymentMethod" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ route('order.index') }}" class="btn btn-danger btn-sm" title="Cancel">
                        <i class="fa fa-plus" aria-hidden="true"></i> Cancel
                    </a>
    </form>
  
  </div>
</div>
@stop