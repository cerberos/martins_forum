@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-8">

                    @foreach($categories as $category)
                        <article class="message is-dark clickable" href="{{ $category->path() }}">
                            <div class="message-header">
                                <div class="level-left">{{ $category->title }}</div>
                                <div class="level-right">{{ $temp = $category->getPostsCount() }}  {{str_plural('post', $temp) }}</div>
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

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Last Posts</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-header">
                        <h4>Last replies</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
@endsection
