<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  public function liker(){
      return $this->belongsTo('App\User' , 'user_id' ,'id') ;
  }
  public function posts()
  {
    return $this->belongsTo('App\Post','post_id','id');
  }
}
