<?php

namespace App\Http\Controllers;

use App\Category;
use App\GeneralMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store()
    {

        $this->validate(request(),[
            'title' => 'required',
            'description' => 'required'
        ]);


        if(Auth::user()->isAdmin()){
            Category::create([
                'title' => request('title'),
                'description' => request('description')
            ]);
            return back();
        }
        return back();
    }

    public function patch($id)
    {
        $this->validate(request(),[
            'title' => 'required',
            'description' => 'required'
        ]);

        if(Auth::user()->isAdmin()) {
            $id = resolve('App\GeneralMethods')->decrypt($id);
            $category = Category::find($id);
            $category->title = request('title');
            $category->description = request('description');
            $category->save();
            return back();
        }

        return back();
    }

    public function destroy($id)
    {
        if(Auth::user()->isAdmin()) {
            $id = resolve('App\GeneralMethods')->decrypt($id);
            $category = Category::find($id);

            $category->posts()->each(function ($post){
                $post->replies()->forceDelete();
            });

            $category->posts()->forceDelete();
            $category->forceDelete();
            return back();
        }

        return back();
    }
}
