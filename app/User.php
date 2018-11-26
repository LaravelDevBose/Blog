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
        'name','username','email','phoneNo', 'bio','status','confirmed','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','token'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post','author_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    function socialProviders(){
        return $this->hasMany(SocialProvider::Class);
    }


    public function followers()
    {
        return DB::table('users')
            ->select('users.id', 'users.name', 'users.email','users.phoneNo', 'users.avatar', 'followers.created_at')
            ->join('followers', 'admins.id', '=', 'followers.follows_id')
            ->join('users', 'followers.user_id', '=','users.id')
            ->where('followers.user_type', 'U')
            ->orderBy('followers.created_at', 'desc')
            ->get();

    }

    public function follows()
    {
        return DB::table('users')
            ->select('users.id', 'users.name', 'users.email','users.phoneNo', 'users.avatar', 'followers.created_at')
            ->join('followers', 'users.id', '=', 'followers.user_id')
            ->join('users', 'followers.follows_id', '=','users.id')
            ->where('followers.user_type', 'U')
            ->orderBy('followers.created_at', 'desc')
            ->get();

    }


    public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId)
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first(['id']);
    }
}
