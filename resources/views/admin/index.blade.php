@extends('layouts.adminmaster')

@section('container')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$replyCount}}</div>
                                <div>Today's Comments!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$postCount}}</div>
                                <div>Today's Posts!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> 10 last Replies
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            <?php $i = 1; ?>
                            @forelse($replies as $reply)
                            <li @if($i % 2 == 0) class="timeline-inverted clickable" @else class="clickable" @endif href="{{$reply->post->path()}}">
                                <div class="timeline-badge"><i class="fa fa-comments fa-fw"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5>Post Title:</h5>
                                        <hr>
                                        <h4 class="timeline-title">{{ $reply->post->title }}</h4>
                                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{$reply->created_at->diffForHumans() }} by {{ $reply->user->name }}</small>
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="timeline-body">
                                        <h5>Reply's body:</h5>
                                        <hr>
                                        <p>{{ $reply->body }}</p>
                                    </div>
                                </div>
                            </li>
                                <?php $i++; ?>
                            @empty

                                <li>
                                    <div class="timeline-badge"><i class="fa fa-comments fa-fw"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">No Replies</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> Now</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>There are no replies to show!</p>
                                        </div>
                                    </div>
                                </li>

                            @endforelse

                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection