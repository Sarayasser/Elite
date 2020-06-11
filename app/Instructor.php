<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Instructor extends Model
{   
    use Rateable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cv','user_id'
    ];

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
        return $this->hasMany('App\Models\Course','instructor_id');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule','instructor_id');
    }
    public function GetNameAttribute()
    {
        return $this->user->name;
    }

    public function setCvAttribute($value)
    {
        $attribute_name = "cv";
        $disk = "uploads"; 

        $path = $value->store('public/cvs');
        $path = str_replace('public/', '', $path);
        $this->attributes[$attribute_name] = $path;
        
    }

    
}
