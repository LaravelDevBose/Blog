<?php

namespace App\Http\Controllers;

use App\Notice;
use DB;
use Auth;
use Session;
use App\Post;
use App\Admin;
use App\User;
use App\Like;
use App\Comment;
use App\ReadPost;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {   
        $posts = Post::where('status', 1)->orderBy('id','desc')->paginate('15');
        $imprt_notice = Notice::where('priority','1')->where('status','1')->orderBy('created_at', 'desc')->limit(5)->get();
    	return view('front.home.index',['posts'=>$posts,'imprt_notice'=>$imprt_notice]);
    }

    public function blogs()
    {   
        $header = ' সকল পোস্ট';
        $posts = Post::where('status', 1)->orderBy('id','desc')->paginate('40');
    	return view('front.blog.blogs',['header'=>$header,'posts'=>$posts]);
    }
    public function selected_posts()
    {   
        $header = 'ির্বাচিত পোস্ট সমূহ';
        $posts = Post::where('status', 1)->where('selected',1)->orderBy('id','desc')->paginate('15');
        return view('front.blog.blogs',['header'=>$header,'posts'=>$posts]);
    }

    public function bolgCategoryView(){
        $categories = Category::where('cat_status',1)->orderBy('id', 'desc')->get();
        return view('front.category.category_list', compact('categories'));
    }

    public function category_wise_blog($cat_id){
        $cat_title = Category::where('id', $cat_id)->where('cat_status',1)->first()->value('cat_title');
        $header = ucwords($cat_title).' - এর সকল পোস্ট';
        $posts = Post::where('cat_id', $cat_id)->where('status', 1)->orderBy('id','desc')->paginate('40');
        return view('front.blog.blogs',['header'=>$header,'posts'=>$posts]);
    }
    public function singelBlog($id)
    {   
        $post = Post::findOrFail($id);
        $comments = Comment::whereNull('prent_id')->where('post_id', $id)->get();
        $reading_count = $post->reading->reading_count + 1;
        ReadPost::where('post_id',$id)->update(['reading_count'=>$reading_count]);

        $author_info = ($post->author_type==1)? $post->author : $post->admin_author;
        $author_post = Post::where('status', 1)->where('author_type',$post->author_type)->where('author_id', $post->author_id)->take('5')->get();
        $author_posts = collect($author_post)->reject(function($value) use($post){
            return $post->id == $value->id;
        });
 
    	return view('front.blog.singelBlog',['post'=>$post, 'comments'=>$comments,'author_info'=>$author_info,'author_posts'=>$author_posts]);
    }

    public function profile($id,$type)
    {   
        //if type 0 than admin if type 1 than user 
        if($type == 0){

            $author_info = Admin::findOrFail($id);    
        }else if($type == 1){
            $author_info = User::findOrFail($id);
        }
        $author_posts = Post::where('status', 1)->where('author_type', $type)->where('author_id', $id)->paginate('15');

        $total_comment_take = DB::table('posts')
                        ->join('comments', 'posts.id', '=', 'comments.post_id')
                        ->select('post.*', 'comments.*')
                        ->where('posts.author_id', $id)
                        ->where('posts.author_type', $type)
                        ->where('comments.user_id', '!=', $id)
                        ->count();
        $most_read_posts = ReadPost::orderBy('reading_count', 'desc')->take('5')->get();

    	return view('front.profile.profile',['type'=>$type,'author_info'=>$author_info, 'author_posts'=>$author_posts,
                      'total_comment_take'=>$total_comment_take ,'most_read_posts'=>$most_read_posts ]);
    }

    public function all_notice(){
        $header =' সকল বিজ্ঞপ্তি গুলো';
        $notices = Notice::where('status', 1)->orderBy('priority', 'asc')->orderBy('created_at', 'desc')->get();
        return view('front.notice.all_notice',compact('header','notices'));
    }

    public function read_notice($id= Null){
        $notice = Notice::findOrFail($id);
        return view('front.notice.single_notice',compact('notice') );
    }

    public function mostlikeAllBlogs(){
        $header =' সকল জনপ্রিয় পোস্ট গুলো';
        $populer_blogs = Like::orderBy('like', 'desc')->get();
        return view('front.blog.populer_blogs',['header'=>$header,'populer_blogs'=>$populer_blogs]);
    }

    public function mostReadAllBlogs(){
        $header ='সর্বোচ পঠিত পোস্ট গুলো';
        $populer_blogs = ReadPost::orderBy('reading_count', 'desc')->get();
        return view('front.blog.populer_blogs',['header'=>$header,'populer_blogs'=>$populer_blogs]);
    }

    public function like_dislike($post_id, $action)
    {
        if($action==0){

            $cheackFvrt = Like:: where('post_id', $post_id)->first();

            if (is_null($cheackFvrt)) {

                //not Exits than save new 
                $like = New Like;
                $like->user_id = Auth::User()->id.',';
                $like->post_id = $post_id;
                $like->like = '1';
                $like->save();

            }elseif (empty($cheackFvrt->user_id)) {
                $userId = Auth::user()->id.",";
                $saveFvrt = Like::find($cheackFvrt->id);
                $saveFvrt->user_id = $userId;
                $saveFvrt->like = 1;
                $saveFvrt->save();
            }else{
                //take all user id
                $userIds = $cheackFvrt->user_id;
                //concrite with new user id
                $userId = $userIds. ','.Auth::User()->id;

                //now save 
                $saveFvrt = Like::find($cheackFvrt->id);
                $saveFvrt->user_id = $userId;
                $saveFvrt->like = $cheackFvrt->like + 1;
                $saveFvrt->save();
            }
            Session::flash('success', 'Than You For your Like');
        }
        else{

            $current_user = Auth::User()->id;

            //find where fvrt id is match take all user Id
            $likeInfo = Like::where('post_id', $post_id)->select('id','user_id','like')->first(); 
            //make userId string to array
            $userIdArray = explode(',', $likeInfo->user_id);
            $dlt_fvrt = array_diff($userIdArray, array($current_user)); //delete user id where match with id
            $current_fvrt_list = implode(',', $dlt_fvrt); // again convert arry to string

            //now save update data 
            $disLike = Like::find($likeInfo->id);
            $disLike->user_id = $current_fvrt_list;
            $disLike->like = $likeInfo->like-1;
            $disLike->save();
            
            Session::flash('success', 'You Success Fully Unlike This Post');
        }


        return redirect()->back();
    }
}
