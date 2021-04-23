@extends('base')

@section('content')

<br>
<h1>Raffle Draw</h1>
<hr>

<div class="row">
    <div id="app" class="col">
        <Raffle></Raffle>
    </div>
</div>

@endsection

@section('scripts')

<script src='{{mix("js/app.js")}}'></script>

@endsection
