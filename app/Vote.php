<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Vote extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
