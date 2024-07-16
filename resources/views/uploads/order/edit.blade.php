<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Order Details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <h2>Edit Order Details</h2><br />
        <form action="{{ route('edit', $order->order_id) }}" method="post">
        {!! csrf_field() !!}
        @method('PUT')
        <label >Order ID: {{$order->order_id}}</label><br/>
        <label for="customer">Customer ID: {{$order->customer_id}}</label>
        <label>Total</label></br>
        <input type="text" name="total" id="total" class="form-control" value="{{$order->total}}"></br>
        <label>Payment Method</label></br>
        <input type="text" name="paymentMethod" id="paymentMethod" class="form-control" value="{{$order->paymentMethod}}"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control" value="{{$order->status}}"></br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ route('order.index') }}" class="btn btn-danger btn-sm" title="Cancel">
                        <i class="fa fa-plus" aria-hidden="true"></i> Cancel
                    </a>
    </form>
        
    </body>
</html>
