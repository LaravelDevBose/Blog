@extends('layouts.front')

@section('title','Profile')

@section('content')
 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-md-12">
            <span style="display:none ">Contain the add</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="blogger-profile">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-left">
                        <div class="profile-image">
                        <?php $avater = $author_info->avater;  if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; }?>
                            <!--<img src="img/post-sample-image.jpg" alt="">-->
                            <img src="{{ asset($avater) }}" alt="{{ $author_info->name }}">
                        </div>
                    </div> 
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6 pull-right">
                        <div class="profile-info">
                            <div class="blogger-name">
                                <h5 >{{ $author_info->name }}</h5>
                                <a href="{{ route('follow',$author_info->id, $type)  }}" class="author-follow pull-right">অনুসরণ করুন</a>
                            </div>


                            <h6 class="blogger-moto"><i class="fas fa-quote-left"></i>{{ $author_info->bio }}<i class="fas fa-quote-right"></i></h6>
                            <p class="join-date"><?php $created_at = new dateTime($author_info->created_at); $date = date_format($created_at, 'd F Y h:i A'); echo $date;?></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="post-share profile-share">
                            <p class="share-info">এই পোস্টটি শেয়ার করতে চাইলে :</p>

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
                    <div class="clearfix"></div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="add-mid-body">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="page-title">
                            <h5> আমার সকল পোস্ট (ক্রমানুসারে)</h5>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        @foreach($author_posts as $post)
                        <div class="card mb-3 home-blog">
                            @if(!is_null($post->image))
                            <img class="card-img-top" src="{{ asset($post->image) }}" alt="{{ $post->title }}" height="200">
                            @endif
                            <div class="card-body">
                                <a href="{{ route('blog', $post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                                <a href="{{ route('profile',['id'=> $post->author_id, 'type'=>$type]) }}" class="blog-writer">লেখকঃ- <span>{{ $author_info->name }}</span></a>
                                <p class="card-text">{!! substr($post->details, 0 ,200) !!} ....</p>
                                <a href="{{ route('blog', $post->id) }}" class="text-info pull-right blog-link">বাকিটুকু পড়ুন...</a>
                            </div>
                            <div class="blog-footer">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 publish-time">
                                    <small>Post Created {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 user-activity">
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
                        </div>
                        <div class="clearfix"></div>
                        @endforeach
                    </div>

                    <div class="clearfix"></div>
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
                <div class="author-block blogger-summary">
                    <div class="author-heading">
                        <h5>আমার পরিসংখ্যান</h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="summary-group">
                        <ul>
                            <li>পোস্ট করেছি: <span>{{ count($author_posts) }} টি</span></li>
                            <li>মন্তব্য করেছি: <span>{{ count($author_info->comments) }} টি</span></li>
                            <li>মন্তব্য পেয়েছি: <span>{{ $total_comment_take }} টি</span></li>
                            <li>ব্লগ লিখেছি: <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($author_info->created_at))->diffForHumans() }}</span></li>
                            <li>অনুসরণ করছি: <span>১ জন</span></li>
                            <li>অনুসরণ করছে: <span>৬ জন</span></li>
                        </ul>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12">
                <div class="this-week-post">
                    <div class="this-week-post-heading">
                        <h5>জনপ্রিয় কবিতা গুলো</h5>
                    </div>
                    <ul>
                        @foreach($most_read_posts as $read_post)
                        <?php $post = $read_post->post; ?>
                        @if($post->status == 1)
                        <li >
                            <a href="{{route('blog',$post->id) }}" >
                                @if(!is_null($post->image))
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                @endif
                                <p>{{ $post->title }}
                                    <label>লেখকঃ- <span><?php echo ($post->author_type==1)? $post->author->name: $post->admin_author->name; ?></span></label>
                                </p>

                            </a>
                        </li>
                        @endif
                        @endforeach
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


@endsection