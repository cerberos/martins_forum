<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(! empty($active)) {{ $active=='home' ? 'active':'' }} @endif">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown @if(! empty($active)) {{ $active=='allPosts' ? 'active':'' }} @endif">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">Posts</a>
                <div class="dropdown-menu">
                    <a href="/posts" class="dropdown-item">All Posts</a>
                    @auth()
                        <a href="/posts?by={{ resolve('App\GeneralMethods')->encrypt(auth()->user()->id) }}"
                           class="dropdown-item">My Posts</a>
                    @endauth
                </div>
            </li>
            @auth
                <li class="nav-item @if(! empty($active)) {{ $active=='createPost' ? 'active':'' }} @endif">
                    <a class="nav-link" href="/post/create">Create Post</a>
                </li>
            @endauth
        </ul>

        <div class="form-inline mt-2 mt-md-0" style="margin-right: 10px">
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item justify-content-end"><a href="#" data-toggle="modal" data-target="#login"
                                                                class="nav-link">Login</a></li>
                    <li class="nav-item @if(! empty($active)) {{ $active=='register' ? 'active':'' }} @endif justify-content-end">
                        <a href="{{ route('register') }}"
                           class="nav-link">Register</a></li>
                    @else
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item justify-content-end"><a href="/admin"
                                                                        class="nav-link">Admin Dashboard</a></li>
                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('profile', resolve('App\GeneralMethods')->encrypt(auth()->id())) }}"
                                   class="dropdown-item">My Profile</a>

                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @endguest
            </ul>
        </div>

        <form class="form-inline mt-3 mt-md-0" method="POST" action="/search">
            {{ csrf_field() }}
            <input name="searchValue" class="form-control mr-sm-1" type="text" placeholder="Search" aria-label="Search"
                   required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <a class="btn btn-outline-success my-3 my-sm-0" type="button" data-toggle="modal" data-target="#advSearch">Adv.
                Search</a>
        </form>
    </div>
</nav>