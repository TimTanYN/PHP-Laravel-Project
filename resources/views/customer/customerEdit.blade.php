<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Customer Details</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <h2>Edit Customer Details</h2><br />
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('customerEdit', $customer->customer_id) }}" method="post">
        {!! csrf_field() !!}
        @method('PUT')
        <label>Customer ID: {{$customer->customer_id}}</label></br>
        <label>Email</label></br>
        <input type="email"  name="email" id="email" class="form-control" value="{{$customer->email}}"></br>
        <label>Password</label></br>
        <input type="text" name="password" id="password" class="form-control"value="{{$customer->password}}"></br>
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$customer->name}}"></br>
        <label>Phone</label></br>
        <input type="phone" pattern="[0-9]{3}-[0-9]{7,8}" name="phone" id="phone" class="form-control" value="{{$customer->phone}}"></br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ route('customerList') }}" class="btn btn-danger btn-sm" title="Cancel">
                        <i class="fa fa-plus" aria-hidden="true"></i> Cancel
                    </a>
        </form>
        
    </body>
</html>
