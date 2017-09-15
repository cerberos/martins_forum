<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = ['post'];

    protected $fillable = [
        'title', 'description', 'user_id', 'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function path()
    {
        return '/post/'.$this->id;
    }

    public function addReply($reply){
        $this->replies()->create($reply);
    }
}
