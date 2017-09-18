<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $this->validate(request(), ['searchValue' => 'required']);

        $searchValue = request('searchValue');
        $post = Post::latest()->where('title', 'like', "%$searchValue%")
            ->orWhere('description', 'like', "%$searchValue%")
            ->get();
        $repliesBody = Reply::where('body', 'like', "%$searchValue%")->with('post')->get();

        foreach ($repliesBody as $r) {
            $post[] = $r->post;
        }

        return view('search.index', compact('post'));
    }

    public function userSearch()
    {
        $this->validate(request(), ['userName' => 'required']);
        $name = request('userName');
        $users = User::where('name','like', "%$name%")->paginate(env('HOME_PAGINATE', 15));
        return view('search.usersname', compact('users'));
    }

    public function categorySearch()
    {
        $this->validate(request(), ['category' => 'required']);

        $a = request('category');

        $categories = Category::where('title', 'like', "%$a%")
            ->orWhere('description', 'like', "%$a%")
            ->paginate(env('HOME_PAGINATE', 15));

        return view('search.categories', compact('categories'));
    }

    public function postSearch()
    {
        $this->validate(request(), ['post' => 'required']);

        $a = request('post');

        $posts = Post::latest()->where('title', 'like', "%$a%")
            ->orWhere('description', 'like', "%$a%")
            ->paginate(env('HOME_PAGINATE', 15));

        return view('search.posts', compact('posts'));
    }

    public function replySearch()
    {
        $this->validate(request(), ['reply' => 'required']);

        $a = request('reply');

        $replies = Reply::where('body', 'like', "%$a%")->with('post')->paginate(env('HOME_PAGINATE', 15));

        return view('search.replies', compact('replies'));
    }

    public function postTimeSearch()
    {
        $this->validate(request(), [
            'from' => 'required|date',
            'to' => 'required|date'
        ]);

        request('from') > request('to') ? $from = request('to') : $from = request('from') ;
        request('to') > request('from') ? $to = request('to') : $to = request('from') ;

        $posts = Post::whereBetween('created_at', [$from,$to])
            ->paginate(env('HOME_PAGINATE', 15));

        return view('search.posts', compact('posts'));

    }
}
