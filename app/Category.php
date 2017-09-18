<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    protected $fillable = [
        'title', 'description'
    ];


    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('postCount', function ($builder) {
            $builder->withCount('posts');
        });

        static::deleting(function ($category){
            $category->posts()->each(function ($post){
                $post->replies()->forceDelete();
            });


            $category->posts()->forceDelete();
        });

    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function path()
    {
        return '/category/' . resolve('App\GeneralMethods')->encrypt($this->id);
    }
}
