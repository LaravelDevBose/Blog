<?php

namespace App\Http\Controllers;

use Session;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function comment(Request $request)
    {
    	$report = Validator::make($request->all(),[
            'comment'=>'required|string|max:2500',
        ]);

        if($report->passes()){

        	$comment = new Comment;
        	$comment->user_id = $request->user_id;
        	$comment->post_id = $request->post_id;
        	$comment->name = $request->name;
        	$comment->email = $request->email;
        	$comment->comment = $request->comment;
        	$comment->save();

        	Session::flash('success','Thank You For Your Comment.');

        	return redirect()->back();
        }

        return redirect()->back()->with('warning','মন্তব্য খালি!!! অনুগ্রহ করে কিছু লিখুন.');
    }

    public function reply(Request $request)
    {
    	$report = Validator::make($request->all(),[
            'comment'=>'required|string|max:2500',
        ]);

        if($report->passes()){

        	$comment = new Comment;
        	$comment->user_id = $request->user_id;
        	$comment->post_id = $request->post_id;
        	$comment->prent_id = $request->prent_id;
        	$comment->name = $request->name;
        	$comment->email = $request->email;
        	$comment->comment = $request->comment;
        	$comment->save();

        	Session::flash('success','Thank You For Your Comment.');

        	return redirect()->back();
        }

        return redirect()->back()->with('warning','মন্তব্য খালি!!! অনুগ্রহ করে কিছু লিখুন.');
    }
}
