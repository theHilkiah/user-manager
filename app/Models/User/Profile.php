<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        "user_id",
        "photo",
        "address",
        "city",
        "state",
        "zip",
        "bio",
    ];

    public function getPhotoAttribute($photo)
    {
      return asset('/storage/'.$photo);
    }
    
}
