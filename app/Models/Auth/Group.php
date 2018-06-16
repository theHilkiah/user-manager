<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        "name",
        'group_id',
        "permissions",
    ];
}
