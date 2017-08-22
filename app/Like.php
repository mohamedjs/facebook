<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  public function user(){
      return $this->belongsTo('App\User' , 'user_id' ,'id') ;
  }
  public function posts()
  {
    return $this->beLongTo('App\Post','post_id','id');
  }
}
