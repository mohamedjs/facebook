<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','birhtdata'
        ,'phone','image','gender','job','address','cover'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
      return $this->hasMany('App\Post');
    }
    public function likes()
    {
      return $this->hasMany('App\Like');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    public function creator()
    {
      return $this->hasMany('App\Group','create_id', 'id');
    }
    public function groups(){
      return $this->beLongsToMany('App\group');
    }

    public function sends()
    {
      return $this->beLongsToMany('App\User','user_user','send_id','recive_id')->withPivot('check');
    }

    public function recives()
    {
      return $this->beLongsToMany('App\User','user_user','recive_id','send_id')->withPivot('check');
    }

}
