@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
            <div class="card clickable" href="{{ $post->path() }}">
                <div class="card-header">
                    {{ $post->user->name }}
                    <span class="badge badge-secondary">{{ $post->replies_count }} {{str_plural('reply', $post->replies_count)}}</span>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $post->title }}</p>
                        <footer class="blockquote-footer">Created <cite title="Source Title">{{ $post->created_at->diffForHumans() }}</cite></footer>
                    </blockquote>
                </div>
            </div>
            @endforeach

            <div class="">
                {{ $paginate->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
