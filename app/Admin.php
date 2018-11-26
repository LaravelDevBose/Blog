<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Node\Stmt\Return_;

Use DB;
class Admin extends Authenticatable
{
    use Notifiable;
     protected $guard = "admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phoneNo','avater','bio','password',
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
        return $this->hasMany('App\Post','author_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }


    public function followers()
    {
        return DB::table('admins')
            ->select('users.id', 'users.name', 'users.email','users.phoneNo', 'users.avatar', 'followers.created_at')
            ->join('followers', 'admins.id', '=', 'followers.follows_id')
            ->join('users', 'followers.user_id', '=','users.id')
            ->where('followers.follows_type', 'A')
            ->where('followers.user_type', 'U')
            ->orderBy('followers.created_at', 'desc')
            ->get();

//        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
//            ->where('user_type', 'A')->withTimestamps();
    }

    public function follows()
    {
        return DB::table('admins')
            ->select('users.id', 'users.name', 'users.email','users.phoneNo', 'users.avatar', 'followers.created_at')
            ->join('followers', 'admins.id', '=', 'followers.user_id')
            ->join('users', 'followers.follows_id', '=','users.id')
            ->where('followers.user_type', 'A')
            ->where('followers.follows_type', 'U')
            ->orderBy('followers.created_at', 'desc')
            ->get();

//        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
//            ->withTimestamps();
    }

    public function follow($admin_id)
    {
        $this->follows()->attach($admin_id);
        return $this;
    }

    public function unfollow($admin_id)
    {
        $this->follows()->detach($admin_id);
        return $this;
    }

    public function isFollowing($admin_id)
    {
        return (boolean) $this->follows()->where('follows_id', $admin_id)->first(['id']);
    }
}
