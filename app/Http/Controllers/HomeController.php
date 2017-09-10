<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(env('HOME_PAGINATE',15))->load('user');
        return view('home', compact('posts'));
    }
}
