<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function poster(){
    return $this->belongsTo('App\User' , 'user_id', 'id');
  }
    public function likes()
    {
      return $this->hasMany('App\Like');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
     public function groups()
     {
       return $this->belongsTo('App\Group' , 'group_id', 'id');
     }
}
