@extends('layouts.adminmaster')

@section('container')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
            <?php $i = 1; ?>
            <!-- /.col-lg-12 -->
            @foreach($users as $user)
                <!-- /.col-lg-4 -->
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                {{ $user->name }}
                            </div>
                            <div class="panel-body">
                                Email: <p>{{ $user->email }}</p>
                            </div>
                            <div class="panel-footer">
                                <form action="{{$user->path()}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-circle btn-lg" title="Delete This User"><i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                @endforeach
            </div>

            <div class="center-block">
                {{ $users->links() }}
            </div>


        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection