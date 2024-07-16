@extends('order.layout')
@section('content')
<div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Order Summary</p>
      <div class="row">
        <ul class="list-unstyled">
            @foreach($customer as $c)
            <input type="hidden" name="customerId" value="{{$c->customer_id}}"/>
 <li class="text-black">Name: {{$c->name}}</li>
          <li class="text-black mt-1">Email: {{$c->email}}</li>
          <li class="text-black mt-1">Phone No.: {{$c->phone}}</li>
           @endforeach
        </ul>
        <hr>
        @foreach ($foods as $item)
        <div class="col-xl-10">
          <p>{{$item->name}}</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">{{$item->price}}
          </p>
        </div>
        @endforeach
          <div class="col-xl-10">
          <p>Regular</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">{{$regular}}
          </p>
        </div>
          <div class="col-xl-10">
          <p>Premium</p>
        </div>
         <div class="col-xl-2">
          <p class="float-end">{{$premium}}
          </p>
        </div>
        <hr>
      </div> 
    </div>
      
        <hr style="border: 2px solid black;">
      <div class="row text-black">
        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: {{$totalPrice}}
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="text-center" style="margin-top: 90px;">
      <form action="/getReward" method="post"">
          @csrf
      <label for="select1">Enter your Promo Code</label>
<!--        <select id = "select1" class ="form-select">
            <option>credit card</option>
            <option>paypal</option>
        </select>-->
      <input type="paymentMethod" class="form-control" id="paymentMethod" name="ticketcode">
        <input type="submit" value="Proceed" class="btn btn-warning">
      </form>
      </div>

    </div>
  </div>
</div>
@stop