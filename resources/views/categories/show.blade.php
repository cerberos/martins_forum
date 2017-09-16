@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article class="message is-dark">
                    <div class="message-body">
                        <h3>{{ $category->title }}</h3>
                        <p>{{ $category->description }}</p>

                    </div>
                </article>


                @foreach($posts as $post)

                    <article class="message is-primary clickable" href="{{ $post->path() }}">
                        <div class="message-header">
                            <div class="level-left">
                                <a href="{{ route('profile', resolve('App\GeneralMethods')->encrypt($post->user->id)) }}">
                                    {{ $post->user->name }}</a>
                            </div>
                            <span class="badge badge-secondary">{{ $post->replies_count }} <i class="fa fa-commenting-o"
                                                                                              aria-hidden="true"></i></span>
                            <div class="level-right">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="message-body">
                            <h3>{{ $post->title }}</h3>
                            {{ $post->description }}

                        </div>
                    </article>
                @endforeach

                <div class="level-item">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
