@extends('layouts.user')
@section('title', 'singel Post')
@section('asset')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
<!-- Content area -->
<div class="content">

	<!-- Detached content -->
	<div class="container-detached">
		<div class="content-detached">

			<!-- Post -->
			<div class="panel">
				<div class="panel-body">
					<div class="content-group-lg">
						<div class="content-group text-center">
							@if(file_exists($post->image))
							<a href="#" class="display-inline-block">
								<img src="{{ asset($post->image) }}" style="width: 100%; height: 200px;" class="img-responsive" alt="{{ $post->title }}">
							</a>
							@endif
						</div>

						<h3 class="text-semibold mb-5">
							<span class="text-default">{{ $post->title }}</span>
						</h3>

						<ul class="list-inline list-inline-separate text-muted content-group">
							
							<li>Created At:- <?php $created_at = new dateTime($post->created_at); $date = date_format($created_at, 'd F Y'); echo $date;?></li>
							<li><span class="text-muted">12 comments</span></li>
							<li><span class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> 281</span></li>
						</ul>

						{!! $post->details !!}
					</div>

					<div class="content-group-lg">
						
					</div>


				</div>
			</div>
			<!-- /post -->

			<!-- Comments -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title text-semiold">Discussion</h6>
					<div class="heading-elements">
						<ul class="list-inline list-inline-separate heading-text text-muted">
							<li>42 comments</li>
							<li>75 pending review</li>
						</ul>
                	</div>
				</div>

				<div class="panel-body">
					<ul class="media-list stack-media-on-mobile">
						<li class="media">
							<div class="media-left">
								<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-heading">
									<a href="#" class="text-semibold">William Jennings</a>
									<span class="media-annotation dotted">Just now</span>
								</div>

								<p>He moonlight difficult engrossed an it sportsmen. Interested has all devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>

								
							</div>
						</li>
					</ul>
				</div>

				<hr class="no-margin">

				<div class="panel-body">
					<h6 class="no-margin-top content-group">Add Your's comment</h6>
					<form action="" method="POST">
						<div class="content-group">
							<div id="add-comment">
								<input type="hidden" name="post_id" value="{{ $post->id }}">
								<textarea class="form-control"></textarea>
							</div>
						</div>
						
						<div class="text-right">
							<button type="submit" class="btn bg-blue"><i class="icon-plus22"></i> Your comment</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /comments -->

		</div>
	</div>
	<!-- /detached content -->
	<!-- Footer -->
	<div class="footer text-muted">
		&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
	</div>
	<!-- /footer -->

</div>
<!-- /content area -->


@endsection