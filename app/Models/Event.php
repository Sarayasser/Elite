<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class Event extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'events';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $dates = ['date'];

    public function user()
    {   
        return $this->belongsTo('App\User');
    }
    public function users()
    {   
        return $this->hasOne('App\User','user_id');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

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
    // public function setImageAttribute($value)
    // {
    //     $attribute_name = "image";
    //     $disk = "uploads"; 
    //     $destination_path = "events"; 

    //     if ($value==null) {
    //         Storage::disk($disk)->delete($this->{$attribute_name});

    //         $this->attributes[$attribute_name] = null;
    //     }

    //     if (Str::startsWith($value, 'data:image'))
    //     {
    //         $image = Image::make($value)->encode('jpg', 90);

    //         $filename = md5($value.time()).'.jpg';

    //         Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

    //         Storage::disk($disk)->delete($this->{$attribute_name});

    //         $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
    //         $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
    //     }
    // }
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads"; 
        $destination_path = "storage/events"; 

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
            $path = $value->store('public/events');
            $path = str_replace('public', 'storage', $path);
            $this->attributes[$attribute_name] = $path;
        }
    }

}
