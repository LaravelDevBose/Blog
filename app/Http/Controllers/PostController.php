<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   
        $posts = Post::all();
    	return view('admin.post.index',['posts'=>$posts]);
    }

    public function userIndex()
    {
        return view('user.post.index');
    }

    public function create()
    {   
        $categories = Category::all();
    	return view('admin.post.create',['categories'=>$categories]);
    }

    public function userCreate()
    {
        $categories = Category::all();
        return view('user.post.create',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
    	$report = Validator::make($request->all(),[
            'title'=>'required|string|max:250',
            'cat_id'=>'required',
            'details'=>'required|string',
            'tags'=>'required|string|max:250',
            
        ]);

        if($report->passes()){

            $imageUrl = NULL;

            $imageInfo = $request->file('image');
            if($imageInfo != ''){
                $imageUrl = $this->moveFileInFolder($imageInfo,1);
            }

            $pdfUrl = NULL;
            $pdfInfo = $request->file('pdf');
            if($pdfInfo != ''){
                $pdfUrl = $this->moveFileInFolder($pdfInfo,0);
            }

            $post = new Post;
            $post->title= $request->title;
            $post->author_id= (Auth::guard('web')->check())? Auth::id() : '0';
            $post->cat_id= $request->cat_id;
            $post->details= $request->details;
            $post->tags= $request->tags;
            $post->image= $imageUrl;
            $post->pdf= $pdfUrl;
            $post->status= $request->status;
            $post->save();

            if(Auth::guard('web')->check()){
                Session::flash('success', 'Your Post Store Successfully. Wait For Admin Aproval');
            }else{
                Session::flash('success', 'Your Post Store Successfully.');
            }
            
            return redirect()->back();
        }

        return redirect()->back()->withInputs($request->all())->withErrors($report);
    }
    

    public function view()
    {
    	return view('admin.post.view');
    }

    public function userView()
    {
        return view('admin.post.view');
    }

    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        $categories = Category::all();
    	return view('admin.post.edit',['categories'=>$categories,'post'=>$post]);
    }

    public function userEdit($id)
    {
        return view('admin.post.edit');
    }

    public function update(Request $request)
    {
    	$report = Validator::make($request->all(),[
            'title'=>'required|string|max:250',
            'cat_id'=>'required',
            'details'=>'required|string',
            'tags'=>'required|string|max:250',
            
        ]);

        if($report->passes()){

            $post = Post::find($request->post_id);
            $imageInfo = $request->file('image');
            // dd($post);
            if($imageInfo != ''){
                $imageUrl = $this->moveFileInFolder($imageInfo,1);
                if(file_exists($post->image)){
                    unlink($post->image);
                }
                $post->image= $imageUrl;
            }

            $pdfInfo = $request->file('pdf');
            if($pdfInfo != ''){
                $pdfUrl = $this->moveFileInFolder($pdfInfo,0);
                if(file_exists($post->pdf)){
                    unlink($post->pdf);
                }
                $post->pdf= $pdfUrl;
            }
            
            $post->title= $request->title;
            $post->cat_id= $request->cat_id;
            $post->details= $request->details;
            $post->tags= $request->tags;
            $post->status= $request->status;
            $post->save();

            if(Auth::guard('web')->check()){
                Session::flash('success', 'Your Post Updated Successfully');
            }else{
                Session::flash('success', 'Your Post Updated Successfully.');
            }
            
            return redirect()->back();
        }

        return redirect()->back()->withInputs($request->all())->withErrors($report);
    }

    public function destroy(Request $request)
    {
        
    }

    // file uplode in folder function
    private function moveFileInFolder($fileInfo, $type){


        //Get Image name
        $fileName =$fileInfo->getClientOriginalName();
        $move_file = explode('.',$fileName);
        $fileName = $move_file[0].str_random(8).".".$move_file[1];
        
        //Define Uplode path 
        $uploadPath = ($type == 1)? 'public/images/' : 'public/pdf/';

        //move to Define folder and Check its pass to move
        if($fileInfo->move($uploadPath, $fileName)){
            //If pass return totel url to join uplodepath and fileName
            return $fileUrl = $uploadPath . $fileName;
        }else{
            //If Fails return empty $fileUrl
            return $fileUrl=' ';
        }
    }
}
