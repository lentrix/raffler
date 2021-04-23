@extends('base')

@section('content')

    <div class="row">
        <div class="col">
            <h1>List of Participants</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th>&amp;</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($participants as $part)
                    <tr>
                        <td>{{$part->full_name}}</td>
                        <td>{{$part->other_info}}</td>
                        <td>
                            <a href='{{url("/participants/$part->id")}}' class="btn btn-sm btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
