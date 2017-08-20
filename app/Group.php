<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function creator()
    {
      return $this->belongsTo('App\User' , 'user_id', 'id');
    }
    public function posts()
    {
      return $this->hasMany('App\Post');
    }
    public function users(){
      return $this->beLongsToMany('App\User');
    }

}
