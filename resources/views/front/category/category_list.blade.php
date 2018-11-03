@extends('layouts.front')

@section('title','বিষয় ভিত্তিক ব্লগ')

@section('content')
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-md-12">
				<div class="add-mid-body">
				
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="page-title">
					<h5>বিষয় ভিত্তিক ব্লগ</h5>
				</div>
			</div>
		</div>
		<ul class="list-group">
			@if(isset($categories) && $categories)
				@foreach($categories as $category)
					<a href="{{ route('blog.category', $category->id) }}" class="list-group-item ">
						{{ ucwords($category->cat_title) }}
					</a>
				@endforeach
			@endif
		</ul>
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
							<a href="">সবগুলো পড়ুন ..</a>
						</div>
					</div>
				</div>
				<div class="col-md-12"></div>
			</div>
		
		</div>
	</div>


@endsection