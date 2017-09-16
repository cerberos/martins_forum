@extends('layouts.master')

@section('content')

    <div class="title"> {{ $user->name }} </div>
    <div class="subtitle">Member since {{ $user->created_at->diffForHumans() }} </div>
    <hr>


    @foreach($posts as $post)
        <div class="row clickable" href="{{ $post->path() }}">
            <div class="col-md-10" style="padding-right: 0px">
                <div class="p-3 mb-2 bg-dark text-white">{{ $post->title ? $post->title : $post->post->title }}</div>
            </div>
            <div class="col-md-2" style="padding-left: 0px">
                <div class="p-3 mb-2 bg-light text-gray-dark">{{ $post->created_at->diffForHumans() }}</div>
            </div>
        </div>
    @endforeach

    <div class="level-item">
        {{ $posts->links() }}
    </div>
@endsection