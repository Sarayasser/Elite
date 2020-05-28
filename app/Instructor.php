<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    /**
     * relation one to one to user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * relation one to many (instructor teach many courses)
     */
    public function courses()
    {
        return $this->hasMany('App\Course','instructor_id');
    }
    
}
