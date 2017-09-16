@extends('layouts.master')

@section('content')
    <div class="title"> {{ $user->name }} </div>
    <div class="subtitle">Member since {{ $user->created_at->diffForHumans() }} </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <h2 class="title level-item">
                Recent Posts
            </h2>
            @if(count($posts) == 5)
                <small class="subtitle level-item">
                    <a href="/profile/{{resolve('App\GeneralMethods')->encrypt($user->id)}}/posts">
                        Click for more...
                    </a>
                </small>
            @endif

            <hr>

            @forelse($posts as $post)
                <div class="p-3 mb-2 bg-light text-gray-dark">
                    <a href="{{$post->path()}}">{{ $post->title }}</a>
                </div>
            @empty
                <small class="level-item">There are no replies for this user</small>
            @endforelse
        </div>

        <div class="col-md-6">
            <h2 class="title level-item">
                Recent Replies
            </h2>
            @if(count($replies) == 5)
                <small class="subtitle level-item">
                    <a href="/profile/{{resolve('App\GeneralMethods')->encrypt($user->id)}}/replies">
                        Click for more...
                    </a>
                </small>
            @endif

            <hr>
            @forelse($replies as $reply)
                <div class="p-3 mb-2 bg-light text-gray-dark">
                    <a href="{{$reply->path()}}">{{ $reply->post->title }}</a>
                </div>
            @empty
                <small class="level-item">There are no replies for this user</small>
            @endforelse
        </div>
    </div>
@endsection