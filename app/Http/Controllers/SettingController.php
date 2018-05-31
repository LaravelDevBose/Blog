<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Admin;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{	
	
    public function siteSetting()
    {
    	return view('admin.setting.siteSetting');
    }

    public function siteName($value)
    {
    	$siteName = Setting::updateOrCreate(['setting_key'=>'siteName'],['setting_value'=>$value]);
    	return $siteName;
    }

    public function siteLogo(Request $request)
    {	
    	$fileInfo = $request->file('logo');
    	//Get Image name
        $fileName =$fileInfo->getClientOriginalName();
        $move_file = explode('.',$fileName);
        $fileName = 'logo_'.$move_file[0].str_random(8).".".$move_file[1];
        
        //Define Uplode path 
        $uploadPath ='public/images/';

        //move to Define folder and Check its pass to move
        if($fileInfo->move($uploadPath, $fileName)){
            //If pass return totel url to join uplodepath and fileName
            $fileUrl = $uploadPath . $fileName;

            $image = Setting::where('setting_key', 'logo')->value('setting_value');
            if(file_exists($image)){
                unlink($image);
            }
            $logo = Setting::updateOrCreate(['setting_key'=> 'logo'], ['setting_value'=>$fileUrl]);

            Session::flash('success','Site Logo Uploded Successfully');
            return redirect()->back();
        }else{
            //If Fails return empty $fileUrl
            Session::flash('unsuccess','Site Logo Not Uploded Successfully');
            return redirect()->back();
        }
    }

    public function aboutUs(Request $request)
    {
    	$aboutUs = Setting::updateOrCreate(['setting_key'=>'aboutUs'],['setting_value'=>$request->aboutUs]);
    	return $aboutUs;
    }

    public function address(Request $request)
    {
    	$address = Setting::updateOrCreate(['setting_key'=>'address'],['setting_value'=>$request->address]);
    	return $address;
    }

    public function phoneNo($value)
    {
    	$phoneNo = Setting::updateOrCreate(['setting_key'=>'phoneNo'],['setting_value'=>$value]);
    	return $phoneNo;
    }

    public function email($value)
    {
    	$email = Setting::updateOrCreate(['setting_key'=>'email'],['setting_value'=>$value]);
    	return $email;
    }

   
    public function facebookLink(Request $request)
    {
    	$facebookLink = Setting::updateOrCreate(['setting_key'=>'facebookLink'],['setting_value'=>$request->fbUrl]);
    	return $facebookLink;
    }

    public function twitterLink(Request $request)
    {
    	$twitterLink = Setting::updateOrCreate(['setting_key'=>'twitterLink'],['setting_value'=>$request->tUrl]);
    	return $twitterLink;
    }

    public function instagramLink(Request $request)
    {
    	$instagramLink = Setting::updateOrCreate(['setting_key'=>'instagramLink'],['setting_value'=>$request->insUrl]);
    	return $instagramLink;
    }

    public function accountSetting()
    {	
    	
    	return view('admin.setting.accountSetting');
    }

    public function fullName($value)
    {
    	$name = Admin::find(Auth::id());
    	$name->name = $value;
    	$name->save();

    	return $name;
    	
    }

    public function avater(Request $request)
    {	
    	$fileInfo = $request->file('avater');
    	//Get Image name
        $fileName =$fileInfo->getClientOriginalName();
        $move_file = explode('.',$fileName);
        $fileName = $move_file[0].str_random(8).".".$move_file[1];
        
        //Define Uplode path 
        $uploadPath ='public/images/avater/';

        //move to Define folder and Check its pass to move
        if($fileInfo->move($uploadPath, $fileName)){
            //If pass return totel url to join uplodepath and fileName
            $fileUrl = $uploadPath . $fileName;
            if(file_exists(Auth::User()->avater)){
                unlink(Auth::User()->avater);
            }

            $avater = Admin::find(Auth::id());
	    	$avater->avater = $fileUrl;
	    	$avater->save();

            Session::flash('success','Avater Uploded Successfully');
            return redirect()->back();
        }else{
            //If Fails return empty $fileUrl
            Session::flash('unsuccess','Avater Not Uploded Successfully');
            return redirect()->back();
        }
    }

    public function admin_phoneNo($value)
    {
    	$admin = Admin::find(Auth::id());
    	$admin->phoneNo = $value;
    	$admin->save();

    	return $admin;
    	
    }

    public function change_email(Request $request)
    {	
    	$credentials = [
            'email'=>Auth::User()->email,
            'password'=>$request->password,
        ];
    	if(Auth::guard('admin')->once($credentials)){
    		$admin = Admin::find(Auth::id());
	    	$admin->email = $request->email;
	    	$admin->save();

	    	return $admin;
    	}else{

    		return '0';
    	}
    }

    public function bio_status(Request $request)
    {
    	$admin = Admin::find(Auth::id());
    	$admin->bio = $request->bio;
    	$admin->save();

    	return $admin;
    }

    public function adminPasswordChange(Request $request)
    {
    	$credentials = [
            'email'=>Auth::User()->email,
            'password'=>$request->old_password,
        ];
    	if(Auth::guard('admin')->once($credentials)){
    		$admin = Admin::find(Auth::id());
	    	$admin->password = bcrypt($request->password);
	    	$admin->save();

	    	return $admin;
    	}else{

    		return '0';
    	}
    }


// user Account Setting function
    public function userAccountSetting()
    {
        return view('user.account.setting');
    }

    public function user_fullName($value)
    {
        $name = User::find(Auth::id());
        $name->name = $value;
        $name->save();

        return $name;
        
    }

    public function user_avater(Request $request)
    {   
        $fileInfo = $request->file('avater');
        //Get Image name
        $fileName =$fileInfo->getClientOriginalName();
        $move_file = explode('.',$fileName);
        $fileName = $move_file[0].str_random(8).".".$move_file[1];
        
        //Define Uplode path 
        $uploadPath ='public/images/avater/';

        //move to Define folder and Check its pass to move
        if($fileInfo->move($uploadPath, $fileName)){
            //If pass return totel url to join uplodepath and fileName
            $fileUrl = $uploadPath . $fileName;
            if(file_exists(Auth::User()->avater)){
                unlink(Auth::User()->avater);
            }

            $avater = User::find(Auth::id());
            $avater->avater = $fileUrl;
            $avater->save();

            Session::flash('success','Avater Uploded Successfully');
            return redirect()->back();
        }else{
            //If Fails return empty $fileUrl
            Session::flash('unsuccess','Avater Not Uploded Successfully');
            return redirect()->back();
        }
    }

    public function user_phoneNo($value)
    {
        $user = User::find(Auth::id());
        $user->phoneNo = $value;
        $user->save();

        return $user;
        
    }

    public function user_change_email(Request $request)
    {   
        $credentials = [
            'email'=>Auth::User()->email,
            'password'=>$request->password,
        ];
        if(Auth::guard('web')->once($credentials)){
            $user = User::find(Auth::id());
            $user->email = $request->email;
            $user->save();

            return $user;
        }else{

            return '0';
        }
    }

    public function user_bio_status(Request $request)
    {
        $user = User::find(Auth::id());
        $user->bio = $request->bio;
        $user->save();

        return $user;
    }

    public function user_password_change(Request $request)
    {
        $credentials = [
            'email'=>Auth::User()->email,
            'password'=>$request->old_password,
        ];
        if(Auth::guard('web')->once($credentials)){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();

            return $user;
        }else{

            return '0';
        }
    }
}
