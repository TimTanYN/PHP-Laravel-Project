@extends('order.layout')
@section('content')
<div class="card">
  <div class="card-header">Order Details</div>
  <div class="card-body">
      
  
      <form action="{{ url('order') }}" method="post"><!-- here need to change to route!!!!! -->
        {!! csrf_field() !!}
        <label for="customer">Customer ID</label>
        <select name="customer" id="customer">
        @foreach($customer as $c)
        <option>{{$c->customer_id}}</option>
        @endforeach
        </select></br>
        <label>Total</label></br>
        </br>
        <label>Payment Method</label></br>
        <select name="paymentMethod" id="paymentMethod">
        <option>Touch & Go E-wallet</option>
        <option>Grab Pay</option>
        <option>Credit Card</option>
        </select></br>

        <input type="submit" value="Proceed to Payment" class="btn btn-success">
        <!-- <a href="{{ route('order.index') }}" class="btn btn-danger btn-sm" title="Cancel">
                        <i class="fa fa-plus" aria-hidden="true"></i> Cancel
                    </a> -->
    </form>
  
  </div>
</div>
@stop