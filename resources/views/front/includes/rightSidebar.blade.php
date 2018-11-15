<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar-left-border">
    @if(isset($right_ads) && $right_ads && !is_null($right_ads))
    <div class="row">
        <div class="col-md-12 ">
            <div class="add-right-sidebar">
                <img src="{{ asset($right_ads) }}" alt="Right Advertisement Image" class="img-fluid">
            </div>
        </div>
    </div>
    @endif
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
                        <a href="{{ route('like.blogs') }}">সবগুলো পড়ুন ..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="this-week-post">
                    <div class="this-week-post-heading">
                        <h5>সর্বোচ পঠিত পোস্ট গুলো </h5>
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
                        <a href="{{ route('read.blogs') }}">সবগুলো পড়ুন ..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12"></div>
        </div>
    
    </div>
</div>
