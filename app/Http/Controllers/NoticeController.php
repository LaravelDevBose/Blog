<?php

namespace App\Http\Controllers;

use App\Notice;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('id', 'desc')->get();
        return view('admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = Validator::make($request->all(),[
            'notice_title'=>'required|string|max:250',
            'notice_content'=>'required',
            'priority'=>'required',
            'status'=>'required',

        ]);

        if($report->passes()){

            $notice = new Notice;
            $notice->notice_title = $request->notice_title;
            $notice->notice_content = $request->notice_content;
            $notice->priority = $request->priority;
            $notice->status = $request->status;
            $notice->save();

            Session::flash('success','Your Notice Store SuccessFully');
            return redirect()->back();

        }else{
            return redirect()->back()->withInputs($request->all())->withErrors($report);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notice.view', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        if(!$notice){
            Session::flash('warning', 'No Notice Found....! Invalid Notice..');
            return redirect()->back();
        }
        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $report = Validator::make($request->all(),[
            'notice_title'=>'required|string|max:250',
            'notice_content'=>'required',
            'priority'=>'required',
            'status'=>'required',

        ]);

        if($report->passes()){
            $id = $request->notice_id;

            $notice = Notice::find($id);
            $notice->notice_title = $request->notice_title;
            $notice->notice_content = $request->notice_content;
            $notice->priority = $request->priority;
            $notice->status = $request->status;
            $notice->save();

            Session::flash('success','Your Notice Update SuccessFully');
            return redirect()->route('notice.index');

        }else{
            return redirect()->back()->withInputs($request->all())->withErrors($report);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
