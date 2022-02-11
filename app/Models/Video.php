<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $perPage =18;

    public function getlengthInHumanAttribute()
    {

        return gmdate('i:s',$this->attributes['length']);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }    
    public function getCreatedAtAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }

    public function relatedVideo(int $count=6)
    {
      
        return $this->category->getRandomVideos($count)->except($this->id);
    }

    public function Category()
    {
        return $this->belongsTo(category::class);
    }
    
    public function getCategoryNameAttribute()
    {
        return $this->category?->name;
    }

}
