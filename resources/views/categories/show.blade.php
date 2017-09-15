@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="message is-dark">
                    <div class="message-body">
                        <h3>{{ $category->title }}</h3>
                        <p>{{ $category->description }}</p>

                    </div>
                </article>


                @foreach($posts as $post)

                    <article class="message is-primary clickable" href="{{ $post->path() }}">
                        <div class="message-header">
                            <div class="level-left">{{ $post->title }}</div>
                            <div class="level-right">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="message-body">
                            {{ $post->description }}

                        </div>
                    </article>
                @endforeach

                <div class="level-item">
                    {{ $paginate->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="level-item">
                    <a href="/post/create" class="btn btn-outline-primary" role="button" aria-pressed="true">Create new Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection
