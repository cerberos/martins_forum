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
}
