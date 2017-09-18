<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Reply;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role < 100){
            return redirect('/')->withErrors('You are not an administrator!');
        }

        $replies = Reply::latest()->take('10')->with(['post','user'])->get();
        $postCount = Post::whereBetween('created_at',[Carbon::today(),Carbon::now()])->count();
        $replyCount = Reply::whereBetween('created_at',[Carbon::today(),Carbon::now()])->count();

        return view('admin.index', compact(['replies','postCount', 'replyCount']));
    }

    public function categories()
    {
        $categories = Category::paginate(env('HOME_PAGINATE', 15));
        return view('admin.categories', compact('categories'));
    }

    public function users()
    {
        $users = User::paginate(env('HOME_PAGINATE', 15));
        return view('admin.users', compact('users'));
    }

    public function destroyUser($id)
    {
        $id = resolve('App\GeneralMethods')->decrypt($id);
       if(Auth::user()->isAdmin()){
            $user = User::find($id);
            $user->forceDelete();
            return back();
       }

       return back()->withErrors('You are not an administrator!');
    }
}
