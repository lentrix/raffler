<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Raffler Inc.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">
        @if(!auth()->guest())
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/participants')}}">Participants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/items')}}">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/users')}}">Users</a>
            </li>
        @else
            <li class="nav-item">
            <a class="nav-link" href="{{url('/login')}}">Login</a>
            </li>
        @endif
        </ul>

        </div>
    </div>
</nav>
