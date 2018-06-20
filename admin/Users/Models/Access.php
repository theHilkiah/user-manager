<?php

namespace Admin\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
   protected $fillable = [
      "label",
      "title",
      'score',
      'code',
      "desc",
   ];
}
