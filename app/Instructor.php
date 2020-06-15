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

    
    

    public static function getYears()
    {
        return $year_of_experience = [
            '0' => 'No Experience', 
            '1' => 'Less than 1 year',
            '2' => '1 year',
            '3' => '2 years',
            '4' => '3 years',
            '5' => 'More than 3 years'
        ];
    }
    
    protected $fillable = [
        'cv','user_id','facebook','instagram','github','twitter','year_of_experience','title'
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
    public function events()
    {
        return $this->hasMany('App\Models\Event','user_id');
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

      /**
     * relation one to many  experience
     */
    public function experiences()
    {
        return $this->hasMany('App\InstructorExperience');
    }



}
