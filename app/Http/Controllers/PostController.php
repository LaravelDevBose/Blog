<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Like;
use Session;
use Auth;
use App\ReadPost;
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
        $posts = Post::where('author_id',Auth::id())->get();
        return view('user.post.index',['posts'=>$posts]);
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
            $post->author_type= (Auth::guard('web')->check())? '1' : '0';
            $post->author_id= Auth::id();
            $post->cat_id= $request->cat_id;
            $post->details= $request->details;
            $post->tags= $request->tags;
            $post->image= $imageUrl;
            $post->pdf= $pdfUrl;
            $post->status= $request->status;
            $post->selected= $request->selected;
            $post->save();

            $readpost = new ReadPost;
            $readpost->post_id = $post->id;
            $readpost->reading_count = 0;
            $readpost->save();

            $like = New Like;
            $like->post_id = $post->id;
            $like->like = '0';
            $like->save();

            if(Auth::guard('web')->check()){
                Session::flash('success', 'Your Post Store Successfully. Wait For Admin Approval');
            }else{
                Session::flash('success', 'Your Post Store Successfully.');
            }
            
            return redirect()->back();
        }

        return redirect()->back()->withInputs($request->all())->withErrors($report);
    }
    

    public function view($id)
    {   
        $post = Post::findOrFail($id);
    	return view('admin.post.view');
    }

    public function userView($id)
    {
        $post = Post::findOrFail($id);
        if($post->author_id != Auth::id()){
            return redirect()->route('blog.index')->with('warning','You Are Not Author This post');
        }
        return view('user.post.view',['post'=>$post]);
    }

    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        $categories = Category::all();
    	return view('admin.post.edit',['categories'=>$categories,'post'=>$post]);
    }

    public function userEdit($id)
    {   
        $post = Post::findOrFail($id);
        if($post->author_id != Auth::id()){
            return redirect()->route('blog.index')->with('warning','You Are Not Author This post');
        }
        $categories = Category::all();
        return view('user.post.edit',['categories'=>$categories,'post'=>$post]);
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
            $post->selected= $request->selected;
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

    public function destroy( $id)
    {   
        $post = Post::findOrFail($id);
        
        if(Auth::guard('web')->check() && $post->author_id != Auth::id()){
            return redirect()->route('blog.index')->with('warning','You Are Not Author This post');
        }
        $post->delete();
        Session::flash('success', 'Your Post delete Successfully.');
        return redirect()->back();
    }

    public function selected_action(Request $request)
    {
        dd($request->all());
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
