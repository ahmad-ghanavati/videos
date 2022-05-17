<?php

namespace App\Models\Traites;

use App\Models\Like;
use App\Models\User;

trait Likeable
{

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->where('vote',1)->count();
    }

    public function getDisLikesCountAttribute()
    {
        return $this->likes()->where('vote', -1)->count();
    }

    public function likedBy(User $user)
    {
        if($this->isLikedBy($user))return
        $this->likes() //remove like
        ->where('vote',1)
        ->where('user_id',$user->id)->delete();
        return $this->likes()->create([   //Like
            'vote' => 1,
            'user_id' =>$user->id
        ]);

     
    }

    public function dislikedBy(User $user)
    {
        if($this->isDislikedBy($user))return
        $this->likes() //remove Dislike
        ->where('vote',-1)
        ->where('user_id',$user->id)->delete();
        return $this->likes()->create([  //Dislike
            'vote' => -1,
            'user_id'=>$user->id
        ]);
    }


    public function isLikedBy(User $user)
    {
        return $this->likes() //Only Like
        ->where('vote',1)
        ->where('user_id',$user->id)
        ->exists();
    }

    public function isDislikedBy(User $user)
    {
        return $this->likes() //only Dislike
        ->where('vote',-1)
        ->where('user_id',$user->id)
        ->exists();
    }







}