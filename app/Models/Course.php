<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use willvincent\Rateable\Rateable;

class Course extends Model
{
    use CrudTrait;
    use Rateable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'courses';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'instructor_id', 'age', 'duration', 'capacity', 'description', 'image', 'schedule_id'];
    // protected $hidden = [];
    // protected $dates = [];schedules

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */public function setImageAttribute($value)
    {
        //dd($value);
        $attribute_name = "image";
        // or use your own disk, defined in config/filesystems.php
        $disk = "uploads"; 
        // destination path relative to the disk above
        $destination_path = "storage/avatars"; 

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {   
                   
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);
            
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it 
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    /**
     * relation one to many with instructor
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }
    public function schedule()
    {
        return $this->hasOne('App\Models\Schedule');
    }

    /**
     * The students that belong to the course.
     */
    public function students()
    {
        return $this->belongsToMany('App\User', 'course_student', 'course_id', 'student_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    public function reviews()
    {
      return $this->hasMany('App\Review');
    }

}
