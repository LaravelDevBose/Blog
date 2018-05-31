<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{	
	protected $table = 'categories';
    protected $fillable = [
    	'cat_title', 'cat_status',
    ];

    public function getCatTitleAttribute($value)
	{
	    return ucfirst($value);
	}
}
