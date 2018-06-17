<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Admin\Users\Models\Notes;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        "name",
        "group_id",
        "email",
        "phone",
        "password",
        "temppass",
        "secure_code",
        "verified",
        "active",
        "online",
        "online_at",
        "offline_at",
        "deleted_at",
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsAdminAttribute()
    {
        return $this->group_id == 1;
    }

    public function getFnameAttribute()
    {
        $name = explode(" ", $this->name);
        return array_shift($name);
    }
    
    public function getLnameAttribute()
    {
        $name = explode(" ", $this->name);
        return array_pop($name);
    }

    public function Notes()
    {
        return $q = $this->hasMany(Notes::class);
        dump($q->getBindings(), $q->toSql());
        return $q;
    }
}
