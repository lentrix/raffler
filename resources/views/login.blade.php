@extends('base')

@section('content')

<div class="row">
    <div class="col">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>User Login</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/login')}}" method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="user">User Name</label>
                                    <input type="text" name="user" id="user" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary float-right">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
