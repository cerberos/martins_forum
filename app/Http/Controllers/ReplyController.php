<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use App\Post;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $post = Post::find(resolve('App\GeneralMethods')->decrypt($id));
        $this->validate(request(), ['post' => 'required']);

        $post->addReply([
            'body' => request('post'),
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
