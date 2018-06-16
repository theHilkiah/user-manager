<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        "label",
        "title",
        "content",
    ];
}
