<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return $posts = Post::paginate(10);
        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::find($id)->load('user');
        $paginate = $posts->replies()->paginate(env('HOME_PAGINATE',15));
        $replies = $paginate->load('user');

        return view('post.show',compact(['posts', 'replies', 'paginate']));
    }
}
