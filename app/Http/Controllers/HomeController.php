<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Reply;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{

    public function index()
    {
        $active = 'home';
        $categories = Category::paginate(env('HOME_PAGINATE', 15));
        $posts = Post::latest()->take(5)->get();
        $replies = Reply::latest()->with('post')->take(5)->get();
        //dd($replies[0]);
        return view('home', compact(['categories', 'active', 'posts', 'replies']));
    }
}
