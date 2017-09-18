@extends('layouts.master')

@section('content')

    <div class="title"> Posts Replies</div>
    <hr>

    <div class="modal fade" id="editReply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit This Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="messageForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Reply:</label>
                            <textarea name="reply" class="form-control" id="message-text" rows="5" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="replySubmit">Edit</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit This Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="postForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="title" class="form-control-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Message:</label>
                            <textarea class="form-control" id="message-text" rows="5" name="body" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="postSubmit">Edit</button>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">

            <div class="card text-white bg-dark mb-3">
                <div class="card-header">
                    <a href="{{ route('profile', resolve('App\GeneralMethods')->encrypt($posts->user->id)) }}"
                       style="color: greenyellow">{{$posts->user->name}}</a>
                    <h4 class="card-title">{{ $posts->title }}</h4>
                </div>

                <div class="card-body">
                    <p class="card-text">{{ $posts->description }}</p>
                </div>

                <div class="card-footer">
                    @can('update', $posts)
                        <div class="btn-group" role="group" aria-label="PostGroup">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editPost"
                                    data-title="{{ $posts->title }}"
                                    data-message="{{ $posts->description }}"
                                    data-destination="/post/{{ resolve('App\GeneralMethods')->encrypt($posts->id) }}">
                                Edit
                            </button>
                            <form action="{{$posts->path()}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endcan
                    <p class="float-right" style="margin: 0.5em">{{ $posts->created_at->diffForHumans() }}</p>
                </div>
            </div>

            @foreach($replies as $reply)
                <div class="card border-dark mb-3">
                    <div class="card-header"><a
                                href="{{ route('profile', resolve('App\GeneralMethods')->encrypt($reply->user->id)) }}">
                            {{ $reply->user->name }}</a>
                        said {{$reply->created_at->diffForHumans()}}:
                    </div>
                    <div class="card-body text-dark">
                        <p class="card-text">{{ $reply->body }}</p>
                    </div>

                    @can('update', $reply)
                        <div class="card-footer">
                            <div class="btn-group" role="group" aria-label="ReplyGroup">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editReply"
                                        data-message="{{ $reply->body }}"
                                        data-destination="/reply/{{ resolve('App\GeneralMethods')->encrypt($reply->id) }}">
                                    Edit
                                </button>

                                <form action="/reply/{{ resolve('App\GeneralMethods')->encrypt($reply->id) }}"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
            @endforeach

            <div class="level-item">{{ $paginate->links() }}</div>

            <hr>


            @if(auth()->check())
                <form method="POST" action="{{$posts->path() . '/replies'}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="post" id="post" class="form-control" placeholder="Have something to say?"
                                  rows="5" value="{{ old('post') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            @else
                <p class="text-center">Please <a href="#" data-toggle="modal" data-target="#login">sign in</a> to
                    participate in this discussion!</p>
            @endif

        </div>
    </div>
@endsection