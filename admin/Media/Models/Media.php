<?php

namespace Admin\Media\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        "user_id",
        "uploader",
        "file",
        "info",
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeAttribute()
    {
        $images = ['jpg', 'png', 'svg'];
        $videos = ['mov', 'swf'];
        $parts   = explode(".", $this->file);
        $extn  = array_pop($parts);
        if(in_array($extn, $images)) return 'image';
        if(in_array($extn, $videos)) return 'video';
        return 'file';
     }

     public function getUrlAttribute()
     {
        //  Storage::setVisibility($this->file, 'public');
         return Storage::url($this->file);
     }

     public function getExistsAttribute()
     {
         $driver = config('filesystems.default');
         return Storage::disk($driver)->exists($this->file);
     }
}
