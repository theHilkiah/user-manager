<?php

namespace Admin\Media\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        "user_id",
        "uploader_id",
        "file",
        "title",
        "info",
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Uploader()
    {
      $q = $this->belongsTo(User::class, 'uploader_id');
      // dump($q->toSql(), $q->getBindings());
      return $q;
    }

    public function getPreviewAttribute()
    {
      switch ($this->type) {
        case 'image':
          return 'src="'.asset('storage/'.$this->file).'"';
          break;
        case 'video':
          return 'src="//placehold.it/50X50?text=VIDEO"';
          break;
        default:
          $EXTN = strtoupper($this->extension);
          return 'src="//placehold.it/50X50?text='.$EXTN.'"';
          break;
      }
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
     }

     public function getTypeAttribute()
    {
        $images = ['jpg', 'png', 'svg', 'jpeg'];
        $videos = ['mov', 'swf', 'mp4'];
        $files = ['doc', 'pdf', 'docx', 'xls', 'txt'];
        $parts  = explode(".", $this->file);
        $extn   = $this->extension;
        if(in_array($extn, $images)) return 'image';
        if(in_array($extn, $videos)) return 'video';
        if(in_array($extn, $files)) return 'file';
        return 'doc';
     }

     public function getTitleAttribute($title)
     {
       if(!empty($title)) return ucwords($title);
       $name = kebab_case(basename($this->file));
       $remove = ["." . $this->extension, "-"];
       return ucwords(str_replace($remove, " ", $name));
        
     }

     public function getUrlAttribute()
     {
        //  Storage::setVisibility($this->file, 'public');
         return Storage::url($this->file);
     }

     public function getExistsAttribute()
     {
         $driver = config('filesystems.default');
         return Storage::disk($driver)->exists($this->file);
     }
}
