<?php

namespace App\Http\Controllers;

use App\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class FollowerController extends Controller
{
    public function admin_follower_list(){

        $followers = Auth::user()->followers();
        $follows = Auth::user()->follows();

        return view('admin.follower.index', compact('followers', 'follows'));
    }


    public function follow($follow_id, $type=Null)
    {
        if(Auth::guard('web')->check()){
            $follower = auth()->user();
            if ($follower->id == $follow_id && $type == 'U') {
                Session::flash('warning', "You can't follow yourself")
                return redirect()->back();
            }
            if(!$follower->isFollowing($follow_id)){
                $follower->follow($follow_id);

                // sending a notification
                $user->notify(new UserFollowed($follower));

                return back()->withSuccess("You are now friends with {$user->name}");
            }
        }


        return back()->withError("You are already following {$user->name}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }

}
