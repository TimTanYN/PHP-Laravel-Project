@extends('order.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Order</div>
                <div class="card-body">
                 
                    <a href="{{ route('customerList') }}" class="btn btn-success btn-sm" title="Customer List">
                        <i class="fa fa-plus" aria-hidden="true"></i> Customer List
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer ID</th>
                                    <th>Total</th>
                                    <th>Payment Method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($order as $item)
                                
                                <tr>
                                    
                                    <td>{{ $item->order_id }}</td>
                                    
                                    <td>{{ $item->customer_id }}</td>
                                   
                                    <td>RM{{ $item->total }}</td>
                                    <td>{{ $item->paymentMethod }}</td>
                                    <td>
                                        <!-- <a href="{{ url('/order/' . $item->order_id) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                        <a href="{{ route('edit',$item->order_id) }}" title="Edit Order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <a href="{{ route('order.delete',$item->order_id) }}" title="Edit Order"><button class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Delete</button></a>
                                        <!-- <form method="POST" action="{{ url('/order' . '/' . $item->order_id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm( & quot; Confirm delete? & quot; )"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection