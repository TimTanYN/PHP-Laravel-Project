@extends('order.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
           
                <div class="card-header">Choose your demanding list</div>
                <div class="card-body">
                    <a href="{{ route('order.orderList') }}" class="btn btn-success btn-sm" title="Order List">
                        <i class="fa fa-plus" aria-hidden="true"></i> Order List
                    </a>
                    <a href="{{ route('customerList') }}" class="btn btn-success btn-sm" title="Customer List">
                        <i class="fa fa-plus" aria-hidden="true"></i> Customer List
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection