<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        return $posts = Post::paginate(10);
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required|exists:categories,id'
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'category_id' => request('category'),
            'title' => request('title'),
            'description' => request('body')
        ]);

        return redirect($post->path());
    }

    public function show($id)
    {
        $posts = Post::find($id)->load('user');
        $paginate = $posts->replies()->paginate(env('HOME_PAGINATE',15));
        $replies = $paginate->load('user');

        return view('post.show',compact(['posts', 'replies', 'paginate']));
    }
}
