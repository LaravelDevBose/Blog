@extends('layouts.front')

@section('title','Singel Blog')

@section('content')
 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

    <div class="row">
        <div class="col-md-12">
            <div class="single-post">

                <div class="post-name">
                    <h5 class="post-title">{{ $post->title }}</h5>
                    <h6 class="post-author">-<?php echo ($post->author_type==1)? $post->author->name: $post->admin_author->name; ?></h6>
                    <p class="post-time"><?php $created_at = new dateTime($post->created_at); $date = date_format($created_at, 'd F Y h:i A '); echo $date;?></p>
                </div>
                <div class="clearfix"></div>
                <div class="post-share">
                    <p class="share-info">এই পোস্টটি শেয়ার করতে চাইলে :</p>
                    <!--<div class="clearfix"></div>-->
                    <div class="share-group">
                        <ul>
                            <li><a href=""> <i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""> <i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""> <i class="fab fa-twitter"></i></a></li>
                            <li><a href=""> <i class="fab fa-instagram"></i></a></li>
                            <li><a href=""> <i class="fab fa-pinterest-p"></i></a></li>

                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>
                @if(!is_null($post->image))
                <div class="post-image">
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                </div>
                @endif
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="add-mid-body">

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="post-content">
                    {!! $post->details !!}
                </div>
                <div class="clearfix"></div>
                <div class="row post-footer">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-activity">
                        <a href="#" style="text-decoration: none;" title="{{ count($post->comments) }} টি মন্তব্য">{{ count($post->comments) }} <i class="fas fa-comments"></i></a>
                        <a href="#" style="text-decoration: none;" title="{{ $post->reading->reading_count}} বার পঠিত">{{ $post->reading->reading_count}} <i class="fas fa-book"></i></a>
                        @if (Auth::guest())
                        <a href="#" onclick="$('#modal_comment_login').modal('show');" title="{{ $post->like->like }} জনের ভাল লেগেছে">{{ $post->like->like }} <i class="fas fa-thumbs-up"></i></a>
                        @else
                            <?php $user_id = explode(',', $post->like->user_id); ?>
                            @if (!in_array(Auth::User()->id, $user_id)|| empty($user_id))
                            <a href="{{ route('like',['post_id'=>$post->id,'action'=>'0']) }}" title="{{ $post->like->like }} জনের ভাল লেগেছে">{{ $post->like->like }} <i class="fas fa-thumbs-up"></i></a>
                            @else
                            <a href="{{ route('like',['post_id'=>$post->id,'action'=>'1']) }}" title="{{ $post->like->like }} জনের ভাল লেগেছে" style="color: #e813ba">{{ $post->like->like }} <i class="fas fa-thumbs-up"></i></a>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class=" post-comment">
                    <h5 class="post-comment-title">এই লেখার মন্তব্য সমূহ </h5>
                    <section class="comment-list">
                        <!-- Comment -->
                        @foreach($comments as $comment)
                        <article class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <figure class="thumbnail">
                                <?php $user = $comment->user;  $avater = $user->avater;  if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; }?>

                                    <img class="img-responsive" src="{{ asset($avater) }}" alt="{{ $user->name }}" />

                                </figure>
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div class="panel panel-default arrow left">
                                    <div class="panel-body comment-body">
                                        <header class="text-left">
                                            <div class="comment-user"><i class="fa fa-user"></i> {{ $user->name }}</div>
                                            <time class="comment-date" datetime="{{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}</time>
                                        </header>
                                        <div class="comment-post">
                                            <p> {!! $comment->comment !!}</p>
                                        </div>
                                        <p class="text-right"><a href="#" id="{{$comment->id}}" class="btn btn-default btn-sm reply_commnet"><i class="fa fa-reply"></i> reply</a></p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Reply -->
                        <?php $replys = App\Comment::where('prent_id', $comment->id)->get();?>
                            @foreach($replys as $reply)
                                <?php $reply_user = $reply->user;  $avater = $user->avater;  if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; }?>
                                <article class="row">
                                    <div class="col-md-10 col-sm-10">
                                        <div class="panel panel-default arrow right">
                                            <div class="panel-heading">Reply</div>
                                            <div class="panel-body comment-body">
                                                <header class="text-right">

                                                    <div class="comment-user"><i class="fa fa-user"></i>{{ $reply_user->name }}</div>
                                                    <time class="comment-date" datetime="{{ \Carbon\Carbon::createFromTimeStamp(strtotime($reply->created_at))->diffForHumans() }}"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($reply->created_at))->diffForHumans() }}</time>
                                                </header>
                                                <div class="comment-post">
                                                    <p>{!! $reply->comment !!}</p>
                                                </div>
                                                <!-- <a href="#" class="btn btn-sm "><i class="fa fa-reply"></i> reply</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 hidden-xs">
                                        <figure class="thumbnail reply">
                                            <img class="img-responsive" src="{{ asset($avater) }}" />
                                        </figure>
                                    </div>
                                </article>
                            @endforeach
                        <!-- /Reply -->

                        @endforeach
                        <!-- /Comment -->
                        
                    </section>
                </div>
                <div class="clearfix"></div>
                <div class="comment-area">
                    <h5 class="comment-area-title">আপনার মন্তব্য লিখুন</h5>
                    <div class="row">
                        <form action="{{ route('comment')  }}" id="commnet_form" method="POST" class="col-md-12">{{ csrf_field() }}


                        @if(Auth::check())
                        
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        @endif
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <textarea name="comment"  class="form-control" id="txtArea"  placeholder="আপনার মন্তব্য লিখুন  "></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <button type="button"  id="comment_submit" class="btn btn-success btn-block ">মন্তব্য প্রকাশ করুন </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


                <div class="clearfix"></div>
                <div class="post-share">
                    <p class="share-info">এই পোস্টটি শেয়ার করতে চাইলে :</p>
                    <!--<div class="clearfix"></div>-->
                    <div class="share-group">
                        <ul>
                            <li><a href=""> <i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""> <i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""> <i class="fab fa-twitter"></i></a></li>
                            <li><a href=""> <i class="fab fa-instagram"></i></a></li>
                            <li><a href=""> <i class="fab fa-pinterest-p"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar-left-border">
    <div class="row">
        <div class="col-md-12 ">
            <div class="add-right-sidebar">

            </div>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="right-sidebar">
            <div class="col-md-12">
                <div class="author-block">
                    <div class="author-heading">
                        <h5>পোস্টটি যিনি লিখেছেন</h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="author-content">
                        <div class="author-image pull-left">
                            <img src="{{ asset($author_info->avater) }}" alt="">
                        </div>
                        <div class="author-name pull-right">
                            <h5>{{ $author_info->name }}</h5>
                            <!-- <a href="" class="author-follow">অনুসরণ করুন</a> -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="author-info">
                        <p>
                            {!! $author_info->bio !!}
                        </p>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12">
                <div class="this-week-post">
                    <div class="this-week-post-heading">
                        <h5>লেখকের অন্যান্য কবিতা গুলো</h5>
                    </div>
                    <ul>
                        @forelse($author_posts as $author_post)
                        <li >
                            <a href="{{route('blog',$author_post->id) }}" >
                                @if(!is_null($author_post->image))
                                <img src="{{ asset($author_post->image) }}" alt="{{ $author_post->title }}">
                                @endif
                                <p>{{ $author_post->title }}
                                    <label>লেখকঃ- <span><?php echo ($author_post->author_type==1)? $author_post->author->name: $author_post->admin_author->name; ?></span></label>
                                </p>

                            </a>
                        </li>

                        @empty
                        <li >
                            <p>লেখকের অন্যান্য কোন  কবিতা নেই  </p>
                        </li>

                        @endforelse
                    </ul>
                    <div class="clearfix"></div>
                    <div class="this-week-pos-footer">
                        <a href="">সবগুলো পড়ুন ..</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12"></div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>


<div id="modal_comment_input" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <h6 class="text-semibold">মন্তব্য খালি!!! অনুগ্রহ করে কিছু লিখুন.</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Ok</button>
                
            </div>
        </div>
    </div>
</div>

<div id="modal_reply" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <form action="{{ route('reply')  }}" id="reply_form" method="POST" class="col-md-12">{{ csrf_field() }}
                    <input type="hidden" name="prent_id" >
                    @if(Auth::check())
                    
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    @endif
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <textarea name="comment"  class="form-control" id="replyArea"  placeholder="আপনার মন্তব্য লিখুন  "></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button type="button"  id="reply_submit" class="btn btn-success btn-block ">মন্তব্য প্রকাশ করুন </button>
                        </div>
                    </div>
                    </form>
            </div>

        </div>
    </div>
</div>




@endsection

@section('extra_script')
<script>
    $('#comment_submit').click(function(){
        var txtArea = $('#txtArea').val();

        if("{{ Auth::guest() }}"){
            // $('#modal_comment_input').modal('show');
            $('#modal_comment_login').modal('show');
        }else if(txtArea.length === 0){
            $('#modal_comment_input').modal('show');
        }else{
            $("#commnet_form").submit();
        }
        
    });
    $('#reply_submit').click(function(){
        var replyArea = $('#replyArea').val();
        
        if("{{ Auth::guest() }}"){
            $('#modal_reply').modal('hide');
            $('#modal_comment_login').modal('show');
        }else if(replyArea.length === 0){
            $('#modal_reply').modal('hide');
            $('#modal_comment_input').modal('show');
        }else if(replyArea.length  > 0){
            $("#reply_form").submit();
        }
        
    });

    $('.reply_commnet').click(function(e){
        var prent_id = $(this).attr('id');

        $('input[name="prent_id"]').val(prent_id);
        $('#modal_reply').modal('show');
        $('#replyArea').val('');
    });
</script>
@endsection