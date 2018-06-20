<?php

namespace Admin\Users\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Group extends Model
{
   protected $fillable = [
      "label",
      'group_id',
      'desc',
      "permissions",
   ];

   protected $casts = [
     "permissions" => "array"
  ];

  public function Users()
  {
    return $this->hasMany(User::class);
  }

  
}
