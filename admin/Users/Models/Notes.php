<?php

namespace Admin\Users\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Notes extends Model
{
    protected $fillable = [
        "user_id", "author_id", 'type', 'title', 'content'
    ];

    protected $casts = ['type' => "int"];

    public function scopeAllowed($query, $user_id)
    {
      $allowed = ['user_id' => $user_id];
      return $query->where(compact('user_id'))->orWhere();
    }

    public function getSignatureAttribute()
    {
        $date = $this->updated_at->Format('m/d/Y');
        return $this->author->name.' '.$date;
    }

    public function Author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function getTypeAttribute($type)
    {
        return ['!!!!', 'to self', 'for user', 'for all'][$type ?? 0];
    }
}
