<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    protected $fillable = [
        'title', 'description'
    ];

    protected $guarded = [];


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
        return '/category/' . resolve('App\GeneralMethods')->encrypt($this->id);
    }
}
