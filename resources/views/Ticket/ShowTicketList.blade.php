@extends('layout')
@section('title', 'Ticket')

@section('body')

<table class="table">
    <tr>
        <th>Ticket ID</th>
    </tr>
    @foreach ($ticket as $t)
    <tr>
        <td>{{ $t->ticket_id }}</td>
        <td>
            <button data-get="/ticket/{{ $t->ticket_id }}">Show</button>                    
        </td>
    </tr>
    @endforeach
</table>
@endsection