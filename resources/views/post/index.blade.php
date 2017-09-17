@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($posts) > 0 )

                <div class="col-md-12">

                    @forelse($posts as $post)
                        <article class="message is-primary clickable" href="{{ $post->path() }}">
                            <div class="message-header">
                                <div class="level-left"><a
                                            href="{{ route('profile', resolve('App\GeneralMethods')->encrypt($post->user->id)) }}">
                                        {{ $post->user->name }}</a></div>
                                <span class="badge badge-secondary">{{ $post->replies_count }} <i
                                            class="fa fa-commenting-o"
                                            aria-hidden="true"></i></span>
                                <div class="level-right">{{ $post->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="message-body">
                                <h3>{{ $post->title }}</h3>
                                {{ $post->description }}

                            </div>
                        </article>
                    @empty
                        <div class="col-md-12 p-3 mb-2 bg-info text-white level-item">There are no records this time</div>
                    @endforelse

                    <div class="level-item">
                        {{ $posts->links() }}
                    </div>
                </div>

            @else
                <div class="col-md-12 p-3 mb-2 bg-info text-white level-item">You don't have create any post yet!</div>
            @endif

        </div>
    </div>
@endsection
