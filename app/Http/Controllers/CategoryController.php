<?php

namespace App\Http\Controllers;

use App\Category;
use App\GeneralMethods;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show($id)
    {
        $active='';
        $id = resolve('App\GeneralMethods')->decrypt($id);
        $category = Category::find($id);
        $posts = $category->posts()->latest()->with('user')->paginate(env('HOME_PAGINATE',15));

        return view('categories.show', compact(['category','active','posts']));
    }
}
