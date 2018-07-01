@extends('layouts.front')

@section('title',$header)

@section('content')
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-md-12">
            <div class="add-mid-body">

            </div>
        </div>

        <div class="col-md-12">
            <div class="page-title">
                <h5>{{ $header}} </h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @foreach($posts as $post)
            <div class="card mb-3 home-blog">
                @if(!is_null($post->image))
                <img class="card-img-top" src="{{ asset($post->image) }}" alt="{{ $post->title }}" height="200">
                @endif
                <div class="card-body">
                    <a href="{{ route('blog', $post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                    <a href="{{ route('profile',['author_id'=> $post->author_id, 'author_type'=>$post->author_type]) }}" class="blog-writer">লেখকঃ- <span><?php echo ($post->author_type==1)? $post->author->name: $post->admin_author->name; ?></span></a>
                    <p class="card-text">{!! $post->details !!}</p>
                    <a href="{{ route('blog', $post->id) }}" class="text-info pull-right blog-link">বাকিটুকু পড়ুন...</a>
                </div>
                <div class="blog-footer">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 publish-time">
                                    
                        <small>Post Created {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 user-activity">
                        <a href="#"  style="text-decoration: none;" title="{{ count($post->comments) }} টি মন্তব্য">{{ count($post->comments) }} <i class="fas fa-comments"></i></a>
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
            @endforeach
        </div>

    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar-left-border">
    <div class="row">
        <div class="col-md-12 ">
            <div class="add-right-sidebar">

            </div>
        </div>

    </div>
    <div class="row">
        <div class="right-sidebar">
            <div class="col-md-12">
                <div class="popular-post">
                    <div class="popular-post-heading">
                        <h5>জনপ্রিয় কবিতা গুলো</h5>
                    </div>
                    <ul>
                        @foreach($most_like_posts as $like_post)
                        <?php $post = $like_post->post; ?>
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
                    <div class="popular-post-footer">
                        <a href="">সবগুলো পড়ুন ..</a>
                    </div>
                </div>
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
                    <div class="this-week-pos-footer">
                        <a href="">সবগুলো পড়ুন ..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12"></div>
        </div>

    </div>
</div>

@endsection