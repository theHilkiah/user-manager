<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable = [
      "user_id",
      "data",
    ];

    protected $cast = [
      "data" => "array"
    ];
}
