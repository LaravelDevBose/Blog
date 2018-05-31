<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
    	return view('front.home.index');
    }

    public function blogs()
    {
    	return view('front.blog.blogs');
    }

    public function singelBlog($id)
    {
    	return view('front.blog.singelBlog');
    }

    public function profile($id)
    {
    	return view('front.profile.profile');
    }
}
