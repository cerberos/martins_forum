@extends('layouts.master')

@section('content')

    <div class="title"> Categories </div>
    <hr>

    <div class="row">
        <div class="col-md-8">

            @forelse($categories as $category)
                <article class="message is-dark clickable" href="{{ $category->path() }}">
                    <div class="message-header">
                        <div class="level-left">{{ $category->title }}</div>
                        <div class="level-right">{{ $category->posts_count }}  {{str_plural('post', $category->posts_count ) }}</div>
                    </div>
                    <div class="message-body">
                        {{ $category->description }}
                    </div>
                </article>
            @empty
                <div class="level-item">There are no records this time</div>
            @endforelse

            <div class="level-item">
                {{ $categories->links() }}
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Newest Posts</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($posts as $post)
                        <li class="list-group-item"><a href="{{$post->path()}}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
                <div class="card-header">
                    <h4>Recent replies</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($replies as $reply)
                        <li class="list-group-item"><a href="{{$reply->post->path()}}">{{ $reply->post->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
