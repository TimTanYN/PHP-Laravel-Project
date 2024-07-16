@extends('stafflayout')
@section('title', 'Staff Control')
@section('body')

<p>
    <button data-get="/staff/create" class="button-55">Create</button>
   
</p>

<div class="all">
<section class="wrapper">
<table class="mydatagrid">
    <tr>
        <th>Staff ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Position</th>
        <th>Gender</th>
        <th></th>
    </tr>
    @foreach ($data as $s)
    <tr>
        <Columns>
        <td>{{ $s['staff_id'] }}</td>
        <td>{{ $s['first_name'] }}</td>
        <td>{{ $s['last_name'] }}</td>
        <td>{{ $s['email'] }}</td>
        <td>{{ $s['phone_number'] }}</td>
        <td>{{ $s['position'] }}</td>
        <td>{{ $s['gender'] }}</td>
        <td>
            <button data-get="/staff/{{ $s['staff_id'] }}">Show</button>                    
            <button data-get="/staff/{{ $s['staff_id'] }}/edit">Edit</button>
      
            <form method="post" action="/staff/{{ $s['staff_id'] }}">
                @csrf
                @method('delete')
                <button onclick="return confirm('{{ __('Are you sure you want to delete this staff?') }}')">
                    {{ __('Delete') }}
                </button>
            </form>
        </td>
        </Columns>
    </tr>
    @endforeach
</table>
</div>
</section>
@endsection
