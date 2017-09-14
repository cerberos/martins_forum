@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-8">
                <article class="message is-dark">
                    <div class="message-body">
                        <h2>{{ $category[0]->title }}</h2>
                        {{ $category[0]->description }}

                    </div>
                </article>

            </div>
            </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
        </div>
    </div>
@endsection
