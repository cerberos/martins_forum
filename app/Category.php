<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    use GeneralMethods;


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getPostsCount()
    {
        return $this->posts()->count();
    }

    public function path()
    {
        return '/category/' . $this->encrypt($this->id);
    }
}
