@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="/post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="form-control" id="category" name="category">
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Posts Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Your Post Body</label>
                        <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
@endsection