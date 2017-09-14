@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    @foreach($categories as $category)
                        <article class="message is-dark clickable" href="{{ $category->path() }}">
                            <div class="message-header">
                                <div class="level-left">{{ $category->title }}</div>
                                <div class="level-right">{{ $category->getPostsCount() }}  {{str_plural('post', $category->getPostsCount()) }}</div>
                            </div>
                            <div class="message-body">
                                {{ $category->description }}
                            </div>
                        </article>
                    @endforeach

                        <div class="level-item">
                            {{ $categories->links() }}
                        </div>

            </div>
        </div>
@endsection
