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
}
