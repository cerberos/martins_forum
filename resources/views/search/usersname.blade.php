@extends('layouts.master')

@section('content')

    <div class="title"> User Search </div>
    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @forelse($users as $p)
                <div class="p-3 mb-2 bg-light text-gray-dark"><a href="{{ $p->path() }}">{{$p->name}}</a></div>
            @empty
                <div class="col-md-12 p-3 mb-2 bg-info text-white level-item">There are no records this time</div>
            @endforelse
        </div>

        <div class="level-item">
            {{ $users->links() }}
        </div>
    </div>
@endsection