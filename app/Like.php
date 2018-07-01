<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_id', 'like', 'user_id'];

    public function post()
    {
        return $this->hasOne('App\post','id', 'post_id');
    }
}
