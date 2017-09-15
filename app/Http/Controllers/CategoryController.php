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
        $paginate = $category->posts()->paginate(env('HOME_PAGINATE',15));
        $posts = $paginate->load('user');

        return view('categories.show', compact(['category','active','paginate','posts']));
    }
}
