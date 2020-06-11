<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
