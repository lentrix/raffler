@extends('base')

@section('content')

<h1>List of Raffle Items</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Sponsor</th>
            <th>Value</th>
            <th>Winner</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)

        <tr>
            <td>{{$item->item}}</td>
            <td>{{$item->sponsor}}</td>
            <td>{{$item->value}}</td>
            <td>{{$item->participant}}</td>
            <td>
                <a href="{{url('/items/' . $item->id)}}" class="btn btn-info btn-sm" title="View/Edit Item">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection
