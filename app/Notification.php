<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'description','post_id','event_id','schedule_id','badge_id','course_id','instructor_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }

}
