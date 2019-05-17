<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use App\Vote;

class Comment extends Model
{
    //
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
      public function votes(){
        return $this->hasMany('App\Vote');
    }
}
