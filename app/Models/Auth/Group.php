<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        "label",
        'group_id',
        "permissions",
    ];
}
