<?php

namespace App\Http\Controllers;

use App\User;
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
        $posts =  Post::latest()->with('user');

        if($id = \request('by')){
            $user = User::where('id', resolve('App\GeneralMethods')->decrypt($id))->firstOrFail();

            $posts->where('user_id',$user->id);
        }

        $posts = $posts->paginate(env('HOME_PAGINATE', 15));

        return view('post.index', compact(['posts','active']));
    }

    public function create()
    {
        $active = 'createPost';
        return view('post.create',compact('active'));
    }

    public function store(Request $request)
    {
        $request['category'] = resolve('App\GeneralMethods')->decrypt($request['category']);
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required|exists:categories,id'
        ]);


        $post = Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request['category'],
            'title' => $request['title'],
            'description' => $request['body']
        ]);

        return redirect($post->path());
    }

    public function show($id)
    {
        $active = '';
        $id = resolve('App\GeneralMethods')->decrypt($id);
        $posts = Post::find($id)->load('user');
        $paginate = $posts->replies()->paginate(env('HOME_PAGINATE',15));
        $replies = $paginate->load('user');

        return view('post.show',compact(['posts', 'replies', 'paginate', 'active']));
    }

    public function patch($id)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        $id = resolve('App\GeneralMethods')->decrypt($id);
        $post = Post::find($id);

        $this->authorize('update', $post);

        $post->title = request('title');
        $post->description = request('body');

        $post->save();

        return back();
    }

    public function destroy($id)
    {

        $id = resolve('App\GeneralMethods')->decrypt($id);
        $post = Post::find($id);

        $this->authorize('update', $post);

        $post->delete();

        return redirect('/posts');
    }
}
