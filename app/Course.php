<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * relation one to many with instructor
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }

    /**
     * The students that belong to the course.
     */
    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
