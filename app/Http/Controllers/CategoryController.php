<?php

namespace App\Http\Controllers;

use App\Category;
use App\GeneralMethods;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use GeneralMethods;

    public function show($id)
    {
        $active='';
        $id = $this->decrypt($id);
        $category = Category::find($id);
        $paginate = $category->posts()->get();
        $posts = $paginate->load('user');

        return view('categories.show', compact(['category','active','paginate','posts']));
    }
}
