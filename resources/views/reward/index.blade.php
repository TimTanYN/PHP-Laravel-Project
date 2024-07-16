@extends('rewardlayout')
@section('title', 'Reward Control')
@section('body')

<p>
    <button data-get="/reward/create" class="button-55">Create</button>
    {{ count($reward) }} record(s)
</p>

<div class="all">
<section class="wrapper">
<table class="mydatagrid">
    <tr>
        <th>Reward ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Type</th>
        <th>Discount Percent</th>
        <th></th>
    </tr>
    @foreach ($reward as $r)
    <tr>
        <Columns>
        <td>{{ $r->id }}</td>
        <td>{{ $r->code }}</td>
        <td>{{ $r->name }}</td>
        <td>{{ $r->type }}</td>
        <td>{{ $r->discount }}</td>
        <td>
            <button data-get="/reward/{{ $r->id }}">Show</button>                    
            <button data-get="/reward/{{ $r->id }}/edit">Edit</button>
      
            <form method="post" action="/reward/{{ $r->id }}">
                @csrf
                @method('delete')
                <button onclick="return confirm('{{ __('Are you sure you want to delete this reward?') }}')">
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
