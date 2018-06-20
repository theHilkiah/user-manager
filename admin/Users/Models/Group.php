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

  public function Group()
  {
    $q = $this->belongsTo(Group::class);
    //dump($this->id, $this->group_id, $q->toSql(), $q->getBindings());
    return $q;
  }

  
}
