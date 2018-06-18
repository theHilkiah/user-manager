<?php

namespace Admin\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   protected $fillable = [
      "label",
      'group_id',
      "permissions",
   ];

   protected $casts = [
     "permissions" => "array"
  ];
}
