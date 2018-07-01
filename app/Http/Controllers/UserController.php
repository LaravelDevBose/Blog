<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {	
    	$users = User::all();
    	return view('admin.user.index', ['users'=>$users]);
    }

    public function view($id)
    {
    	return view('admin.user.view');
    }
}
