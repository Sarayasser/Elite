<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use QCod\Gamify\Gamify;

//implements MustVerifyEmail
class User extends Authenticatable
{
    use Notifiable, Gamify;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone_number', 'gender', 'image' , 'is_banned','age','google_id',"parent_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "storage/avatars";

        if ($value==null) {
            Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = null;
        }

        elseif (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);

            $filename = md5($value.time()).'.jpg';

            Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            Storage::disk($disk)->delete($this->{$attribute_name});

            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
        else {
            $path = $value->store('public/avatars');
            $path = str_replace('public', 'storage', $path);
            $this->attributes[$attribute_name] = $path;
        }
    }



    /**
     * relation one to many (student has one parent)
     */
    public function parent()
    {
        return $this->belongsTo('App\User','parent_id');
    }


    /**
     * relation one to many (parent has many children)
     */
    public function students()
    {
        return $this->hasMany('App\User','parent_id');
    }

    /**
     * The courses that belong to the student.
     */
    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'course_student', 'student_id', 'course_id');
    }

    /**
     * relation one to one to instructor
     */

    public function instructor()
    {
        return $this->hasOne('App\Instructor',"user_id");
    }
    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function readPosts()
    {
        return $this->belongsToMany('App\Models\Post', 'user_read_posts');
    }


}
