<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     /**
     * relation one to one to user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * relation one to many (student has one parent)
     */
    public function parent()
    {
        return $this->belongsTo('App\User');
    }
}
