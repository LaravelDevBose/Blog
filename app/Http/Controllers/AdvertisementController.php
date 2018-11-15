<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Session;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.advertisement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $old_top_ads = $request->old_top_ads;
        $fileInfo = $request->file('top_ads');
        if($fileInfo){
            $setting_key = 'top_ads';
            $status =  $this->image_upload($fileInfo,$setting_key);

            if($status){
                if(file_exists($old_top_ads)){
                    unlink($old_top_ads);
                }
            }

        }
        $old_right_ads = $request->old_right_ads;
        $fileInfo = $request->file('right_ads');
        if($fileInfo){
            $setting_key = 'right_ads';
            $status =  $this->image_upload($fileInfo,$setting_key);

            if($status){
                if(file_exists($old_right_ads)){
                    unlink($old_right_ads);
                }
            }

        }

        Session::flash('success','Advertisement Image Uploaded Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function image_upload($fileInfo,$setting_key)
    {
        //Get Image name
        $fileName =$fileInfo->getClientOriginalName();
        $move_file = explode('.',$fileName);
        $fileName = $setting_key.'_'.$move_file[0].str_random(8).".".$move_file[1];

        //Define Uplode path
        $uploadPath ='public/images/';

        if($fileInfo->move($uploadPath, $fileName)) {
            //If pass return totel url to join uplodepath and fileName
            $fileUrl = $uploadPath . $fileName;
            $store = Setting::updateOrCreate(['setting_key'=> $setting_key], ['setting_value'=>$fileUrl]);

            if($store){
                return TRUE;
            }
        }

        return FALSE;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($setting_key)
    {
        $image = Setting::where('setting_key', $setting_key)->first();
        if(file_exists($image->setting_value)){
            unlink($image->setting_value);
        }
        $update = Setting::find($image->id);
        $update->setting_value = '';
        $update->save();

        Session::flash('success','Advertisement Image Delete Successfully');
        return redirect()->back();
    }
}
