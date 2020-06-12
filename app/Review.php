<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =['comment', 'user_id', 'course_id', ];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
  
    public function course()
    {
      return $this->belongsTo('App\Models\Course');
    }
}
