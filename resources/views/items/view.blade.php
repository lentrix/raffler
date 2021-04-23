@extends('base')

@section('content')

<h1>View Raffle Item</h1>

<div class="row">
    <div class="col-md-4">
        {!! Form::model($item, ['url'=>"/items/$item->id", 'method'=>'put']) !!}

        @include('items._form')

        <div class="form-group">
            <button class="btn btn-primary float-right">
                <i class="fa fa-save"></i> Save Changes
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection
