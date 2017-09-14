<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{

    public function index()
    {
        return factory(\App\Category::class, 10)->create();


        $active = 'home';
        $categories = Category::paginate(env('HOME_PAGINATE',15));
        return view('home', compact(['categories', 'active']));
    }
}
