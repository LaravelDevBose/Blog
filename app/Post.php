<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title','author_id', 'cat_id','detials','tags','image','pdf','status'
    ];

    public function getTitleAttribute($value)
	{
	    return ucfirst($value);
	}

    public function author()
    {
    	return $this->hasOne('App\User', 'id','author_id');
    }

    public function category()
    {
    	return $this->hasOne('App\Category', 'id','cat_id');
    }

    
}
