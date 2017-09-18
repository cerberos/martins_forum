@extends('layouts.adminmaster')

@section('container')


    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="categoryModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="categoryModal">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <form  action="" method="POST" id="categoryForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="categoryTitle" class="control-label">Title:</label>
                            <input type="text" class="form-control" id="categoryTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="categoryBody" class="control-label">Description:</label>
                            <textarea class="form-control" id="categoryBody" name="description" rows="5" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="categorySubmit">Edit</button>
                </div>
            </div>
        </div>
    </div>


    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                </div>
                <!-- /.col-lg-12 -->

                <h3>Create a new category</h3>
                <hr>
                <div class="panel panel-default">
                    <form class="form-horizontal" action="/category/store" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="categoryTitle" class="col-sm-2 control-label">Category Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="categoryTitle" name="title"
                                       placeholder="Write the title here" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoryBody" class="col-sm-2 control-label">Category Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="categoryBody" name="description" rows="5"
                                          required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Create Category</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="col-lg-12">
            <!-- /.col-lg-12 -->
        @foreach($categories as $category)
            <!-- /.col-lg-4 -->
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $category->title }}
                        </div>
                        <div class="panel-body">
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="panel-footer clearfix">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editCategory"
                                        data-title="{{ $category->title }}"
                                        data-description="{{ $category->description }}"
                                        data-destination="{{$category->path()}}">
                                    Edit
                                </button>
                            <form action="{{$category->path()}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline btn-danger" title="Delete This Category"><i
                                            class="fa fa-times"></i>
                                    Delete Category
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            @endforeach
        </div>

        <div class="center-block">
            {{ $categories->links() }}
        </div>

    </div>
    <!-- /#page-wrapper -->
@endsection