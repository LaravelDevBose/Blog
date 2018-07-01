<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadPost extends Model
{
    protected $fillable = ['post_id', 'reading_count '];

    public function post()
    {
        return $this->hasOne('App\post','id', 'post_id');
    }
}
