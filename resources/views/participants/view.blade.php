@extends('base')

@section('content')

<h1>View User</h1>
<div class="row">
    <div class="col-md-4">
        {!! Form::model($participant, ['url'=>'/participants/' . $participant->id,'method'=>'put']) !!}

        @include('participants._form')

        <div class="form-group">
            <button class="btn btn-danger" title="Delete Participant">
                <i class="fa fa-trash-alt"></i>
            </button>
            <button class="btn btn-primary float-right">
                <i class="fa fa-save"></i> Save Changes
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection
