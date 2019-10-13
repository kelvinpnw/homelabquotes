<nav class="navbar navbar-expand-lg navbar-dark navbar-bg-dark">
    <a class="navbar-brand" href="/">homelab quotes!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent"
            aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarcontent">
        <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
            <input id="searchinput" name="q" class="form-control mr-sm-2" type="search" placeholder="Search"
                   aria-label="Search">
            <button id="searchsubmit" class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        @guest
        @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('account')}}" class="nav-link">{{ Auth::user()->name }}</a>
                </li>
                @if(Auth::user()->admin==1)
                    <li class="nav-item">
                        <a href="{{route('admin.main')}}" class="nav-link">Admin panel</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </li>

            </ul>





            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        @endguest
    </div>
</nav>
