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
        $id = $this->decrypt($id);
        $category = Category::find($id);
        return $category->posts()->get();
    }
}
