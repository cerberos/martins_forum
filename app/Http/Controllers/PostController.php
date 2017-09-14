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
        $active = 'allPosts';
        $paginate = Post::paginate(env('HOME_PAGINATE',15));
        $posts = $paginate->load('user');
        return view('post.index', compact(['posts','paginate','active']));
    }

    public function create()
    {
        $active = 'createPost';
        return view('post.create',compact('active'));
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
        $active = '';
        $posts = Post::find($id)->load('user');
        $paginate = $posts->replies()->paginate(env('HOME_PAGINATE',15));
        $replies = $paginate->load('user');

        return view('post.show',compact(['posts', 'replies', 'paginate', 'active']));
    }
}
