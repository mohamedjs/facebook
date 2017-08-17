<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  public function users()
  {
    return $this->beLongTo('App\User');
  }
  public function posts()
  {
    return $this->beLongTo('App\Post','post_id','id');
  }
}
