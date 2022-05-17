<?php

namespace App\Models;



use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Hekmatinasser\Verta\Verta;
use App\Models\Traites\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory,Likeable;
    protected $guarded = [];
    protected $perPage =18;
    protected $with =['category','user'];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getCategoryNameAttribute()
    {   
        
        return $this->category?->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOwnerNameAttribute()
    {  
      return $this->user?->name;
    }
    public function getOwnerAvatarAttribute()
    {
        return $this->user?->gravatar;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    
   



}
