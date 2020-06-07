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

//implements MustVerifyEmail
class User extends Authenticatable 
{
    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone_number', 'gender', 'image' , 'is_banned','age'
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
        return $this->belongsToMany('App\Models\Course');
    }


    /**
     * relation one to one to instructor
     */

    public function instructor()
    {
        return $this->hasOne('App\Instructor',"user_id");
    }

    public function readPosts()
    {
        return $this->belongsToMany('App\Models\Post', 'user_read_posts');
    }

}
