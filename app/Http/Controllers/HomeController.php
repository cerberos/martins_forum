<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Post;

class HomeController extends Controller
{

    public function index()
    {
        $paginate = Post::paginate(env('HOME_PAGINATE',15));
        $posts = $paginate->load('user');
        return view('home', compact(['posts','paginate']));
    }
}
