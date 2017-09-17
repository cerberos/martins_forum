<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.2/css/bulma.min.css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sticky-footer-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.bulma.css') }}">
</head>
<body>
@include('layouts.nav')

<!-- Modal -->
@guest
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @include('auth.login')
                </div>
            </div>
        </div>
    </div>
@endguest

<div class="modal fade bd-example-modal-lg" id="advSearch" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="level-item">Search by:</h3>
                <hr>

                <form class="form-inline level-item" action="/search/user" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="userName" class="sr-only">username</label>
                        <input type="text" readonly class="form-control-plaintext" value="User's Name">
                    </div>
                    <div class="form-group mx-sm-3">
                        <input type="text" class="form-control" name="userName" placeholder="Name Surname" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <hr>

                <form class="form-inline level-item" action="/search/category" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="userName" class="sr-only">category</label>
                        <input type="text" readonly class="form-control-plaintext" value="Category's title or body">
                    </div>
                    <div class="form-group mx-sm-3">
                        <input type="text" class="form-control" name="category" placeholder="Categry's key word"
                               required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <hr>

                <form class="form-inline level-item" action="/search/post" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="userName" class="sr-only">post</label>
                        <input type="text" readonly class="form-control-plaintext" value="Post's title or body">
                    </div>
                    <div class="form-group mx-sm-3">
                        <input type="text" class="form-control" name="post" placeholder="Post's key word"
                               required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <hr>

                <form class="form-inline level-item" action="/search/reply" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="userName" class="sr-only">reply</label>
                        <input type="text" readonly class="form-control-plaintext" value="Reply's body">
                    </div>
                    <div class="form-group mx-sm-3">
                        <input type="text" class="form-control" name="reply" placeholder="Post's key word"
                               required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <hr>

                <form class="form-inline level-item" action="/search/postTime" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="userName" class="sr-only">from</label>
                            <input type="text" readonly class="form-control-plaintext" value="Post's from">
                        </div>
                        <div class="form-group mx-md-3">
                            <input class="form-control" type="date" value="{{ Carbon\Carbon::now() }}" name="from"
                                   id="example-date-input" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="userName" class="sr-only">to</label>
                            <input type="text" readonly class="form-control-plaintext" value="to">
                        </div>
                        <div class="form-group mx-md-2">
                            <input class="form-control" type="date" value="{{ Carbon\Carbon::now() }}" name="to"
                                   id="example-date-input" required>
                        </div>
                        <button type="submit" class="btn btn-primary  mx-md-2">Search</button>
                </form>
                <hr>

            </div>
        </div>
    </div>
</div>


@if(count($errors)>0)
    <div class="notification is-danger" style="margin-top: 0px">
        <button class="delete"></button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Copyright Martin Zani © 2017</span>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/4967b0e393.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>


</body>
</html>
