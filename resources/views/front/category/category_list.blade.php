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
	@include('front.includes.rightSidebar')

@endsection