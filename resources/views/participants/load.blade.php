@extends('base')

@section('content')

<h1>Load Participants</h1>

<div class="row">
    <div class="col-md-3">
        {!! Form::open(['/participants/load', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label("file", "Select Source File") !!}
            {!! Form::file("file") !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary">
                <i class="fa fa-download"></i> Load Participants
            </button>
        </div>

        {!!Form::close() !!}
    </div>
</div>

@endsection


