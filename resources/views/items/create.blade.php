@extends('base')

@section('content')

<h1>Create RaffleItem</h1>

<div class="row">
    <div class="col-md-4">
        {!! Form::open(['url'=>'/items', 'method'=>'post']) !!}

        @include('items._form')

        <div class="form-group">
            <button class="btn btn-primary float-right">
                <i class="fa fa-save"></i> Create Raffle Item
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection
