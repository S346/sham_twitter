<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{

    protected $fillable = ['user_id', 'friend_user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function friend_user()
    {
        return $this->belongsTo('App\User', 'id', 'friend_user_id');
    }
}
