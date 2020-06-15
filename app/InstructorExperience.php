<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorExperience extends Model
{
    public function instructor()
    {
        return $this->belongsTo('App\Instructor','instructor_id');
    }
}
