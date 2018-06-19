<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Admin\Users\Models\Group;
use Admin\Users\Models\Notes;
use Admin\Media\Models\Media;
use App\Models\User\Profile;
use App\Models\User\Settings;

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
        "status",
        "online_at",
        "offline_at",
        "deleted_at",
    ];

    protected $casts = ["status" => "int"];

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
        return $this->group_id > 0;
    }

    public function getFnameAttribute()
    {
        $name = explode(" ", $this->name);
        $fName = array_shift($name);

        if(count($name) > 1 && str_is('*.', $fName))
            $fName = $fName.' '.array_shift($name);
        return $fName;
    }

    public function getLnameAttribute()
    {
        $lName = str_replace($this->fname,'', $this->name);
        return $lName;
    }
    public function Group()
    {
        $q = $this->belongsTo(Group::class);
        //dd($q->toSql(), $q->getBindings());
        return $q;
    }

    public function Media()
    {
        $q = $this->hasMany(Media::class);
        // dd($q->toSql(), $q->getBindings());
        return $q;
    }
    public function Notes()
    {
        $q = $this->hasMany(Notes::class)->where(function($w){
                      $w->where('author_id', auth()->id())
                        ->orWhere('type', '>', 1);
                    });
        // dump($q->toSql(), $q->getBindings());
        return $q;
    }
    public function Profile()
    {
        return $q = $this->hasOne(Profile::class);
        return $q;
    }

    public function Settings()
    {
      return $this->hasOne(Settings::class);
    }


}
