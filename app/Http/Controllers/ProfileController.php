<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function Sodium\compare;

class ProfileController extends Controller
{
    public function index($id)
    {
        $active = 'profile';
        $id = resolve('App\GeneralMethods')->decrypt($id);
        $user = User::find($id);
        $posts = $user->posts()->latest()->take(5)->get();
        $replies = $user->replies()->latest()->take(5)->get();

        return view('profile.index', compact(['active', 'user', 'posts', 'replies']));
    }

    public function show($id, $name)
    {
        $user = User::find(resolve('App\GeneralMethods')->decrypt($id));
        if ($name == 'posts' || $name == 'replies') {
            if ($name == 'posts') {
                $posts = $user->posts()->latest()->paginate(env('HOME_PAGINATE', 15));
            } else {
                $posts = $user->replies()->with('post')->latest()->paginate(env('HOME_PAGINATE', 15));
            }
        } else
            return Redirect::back()->withErrors(['This url do not exist.']);

        return view('profile.show', compact(['posts', 'user']));
    }
}
