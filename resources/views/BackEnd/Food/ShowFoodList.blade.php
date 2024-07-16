@extends('layout')
@section('title', 'Food | Index')

@section('body')
<p>
    <button data-get="/food/create">Create</button>
    {{ count($food) }} record(s)
</p>

<table class="table">
    <tr>
        <th>Food ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Operation</th>
    </tr>
    @foreach ($food as $f)
    <tr>
        <td>{{ $f->food_id }}</td>
        <td>{{ $f->name }}</td>
        <td>{{ $f->price }}</td>
        <td>
            <button data-get="/food/{{ $f->food_id }}">Show</button>                    
            <button data-get="/food/{{ $f->food_id }}/edit">Edit</button>
            
            <form method="post" action="/food/{{ $f->food_id }}">
                @csrf
                @method('delete')
                <button>Delete</button>
            </form>
            
            <img src="/photos/{{ $f->photo }}">
        </td>
    </tr>
    @endforeach
</table>
@endsection