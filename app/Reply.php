<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'body', 'post_id', 'user_id'
    ];

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/post/' . resolve('App\GeneralMethods')->encrypt($this->post()->get()[0]->id);
    }
}
