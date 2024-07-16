@extends('customer.customerLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Customer List</div>
                <div class="card-body">
                    <a href="{{ route('customer.customerCreate') }}" class="btn btn-success btn-sm" title="Add New Customer">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <a href="{{ route('order.index') }}" class="btn btn-success btn-sm" title="Add New Customer">
                        <i class="fa fa-plus" aria-hidden="true"></i> Order List
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($customer as $item)
                                <tr>
                                    
                                    <td>{{ $item->customer_id }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->password }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a href="{{ route('customerEdit', $item->customer_id) }}" title="Edit Customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <a href="{{ route('customerDelete', $item->customer_id) }}" title="Delete Customer"><button class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Delete</button></a>

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