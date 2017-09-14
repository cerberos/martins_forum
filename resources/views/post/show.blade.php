@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="card text-white bg-dark mb-3">
                <div class="card-header">
                    <a href="#" style="color: greenyellow">{{$posts->user->name}}</a>
                    <h4 class="card-title">{{ $posts->title }}</h4>
                </div>

                <div class="card-body">
                    <p class="card-text">{{ $posts->description }}</p>
                </div>
            </div>

            @foreach($replies as $reply)
                <div class="card border-dark mb-3">
                    <div class="card-header"><a href="#"> {{ $reply->user->name }}</a>
                        said {{$reply->created_at->diffForHumans()}}:
                    </div>
                    <div class="card-body text-dark">
                        <p class="card-text">{{ $reply->post }}</p>
                    </div>
                </div>
            @endforeach

            {{ $paginate->links() }}

            <hr>


            @if(auth()->check())
                <form method="POST" action="{{$posts->path() . '/replies'}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="post" id="post" class="form-control" placeholder="Have something to say?"
                                  rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            @else
                <p class="text-center">Please <a href="#" data-toggle="modal" data-target="#login">sign in</a> to
                    participate in this discussion!</p>
            @endif

        </div>
    </div>
@endsection