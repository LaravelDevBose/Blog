<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title','author_id','author_type','cat_id','details','tags','image','pdf','status','selected'
    ];

    public function getTitleAttribute($value)
	{
	    return ucfirst($value);
	}

    

    public function author()
    {
    	return $this->hasOne('App\User', 'id','author_id');
    }

    public function admin_author()
    {
        return $this->hasOne('App\Admin', 'id','author_id');
    }

    public function category()
    {
    	return $this->hasOne('App\Category', 'id','cat_id');
    }

    public function reading()
    {
        return $this->hasOne('App\ReadPost', 'post_id','id');
    }

    public function like()
    {
        return $this->hasOne('App\Like', 'post_id','id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id','id');
    }
    
}
