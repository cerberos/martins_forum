@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="form-control" id="category" name="category">
                            @forelse(\App\Category::all() as $category)
                                <option value="{{resolve('App\GeneralMethods')->encrypt($category->id)}}">{{ $category->title }}</option>
                            @empty
                                <div class="col-md-12 p-3 mb-2 bg-info text-white level-item">There are no records this time</div>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Posts Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Your Post Body</label>
                        <textarea class="form-control" id="body" name="body" rows="5" value="{{ old('body') }}" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
@endsection