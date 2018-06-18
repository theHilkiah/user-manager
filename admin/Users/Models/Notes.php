<?php

namespace Admin\Users\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Notes extends Model
{
    protected $fillable = [
        "user_id", "author_id", 'type', 'title', 'content'
    ];

    public function getSignatureAttribute()
    {
        $date = $this->updated_at->Format('m/d/Y');
        return $this->author->name.' '.$date;
    }

    public function Author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
