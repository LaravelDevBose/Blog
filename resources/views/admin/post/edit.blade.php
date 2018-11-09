@extends('layouts.admin')
@section('title', 'Edit Post')
@section('asset')
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/uploader_bootstrap.js') }}"></script>

	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/editor_summernote.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_controls_extended.js') }}"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Content area -->
<div class="content">
	
		<form action="{{ route('post.update') }}" method="POST" name="postEditForm" enctype="multipart/form-data"> {{csrf_field()}}
		<div class="row">
			<div class=" col-lg-12">
				<!-- Form validation -->
				
					<div class="panel panel-info panel-bordered">
						<div class="panel-heading">
							<h5 class="panel-title">Post Edit Form</h5>
							<div class="heading-elements">
								<!-- <ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		{{-- <li><a data-action="close"></a></li> --}}
			                	</ul> -->
		                	</div>
						</div>

						<div class="panel-body">
							<input type="hidden" name="post_id" value="{{ $post->id }}">
							<div class="row">
								<div class="col-md-9">
									<div class="content-group">
										<label>Post Title:<span class="text-bold text-danger">*</span></label>
										<input type="text" name="title" value="{{ $post->title }}" required class="form-control maxlength-options" maxlength="70" placeholder="Enter Your Post TItle...">
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Category: <span class="text-bold text-danger">*</span></label>
										<select name="cat_id" id=" cat_id"  required  class="select">
											<option value="">Select A Category</option>
											@foreach($categories as $category)
											<option  value="{{ $category->id }}">{{ ucfirst($category->cat_title) }}</option>
											@endforeach
											
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description: <span class="text-bold text-danger">*</span></label>
										<textarea name="details" class="summernote-height" maxlength="2500" placeholder="Enter Your Post Details.....">{{ $post->details }}</textarea>
										<span class="help-block">Product Details (Max 2500 characters)</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Tags: <span class="text-bold text-danger">*</span></label>
										<textarea name="tags" class="form-control" placeholder="Enter Your Post Details.....">{{ $post->tags }}</textarea>
										<span class="help-block text-info">Insert Key word That Help to Search your Post also For SEO(Use Comma "," after Every Key word)</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
		
			                            <label class="checkbox-inline">
											<input type="checkbox" class="styled" name="selected">
											নির্বাচিত পোস্ট
										</label>
										
										<span class="help-block text-info">if this Post show as (নির্বাচিত পোস্ট) Select one</span>
		                            </div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
			                            <label>Status: <span class="text-bold text-danger">*</span></label>
			                            <select name="status"  data-placeholder="Select Post Status"  class="select">
			                            	<option value="0">Unpublish</option>
			                            	<option value="1">publish</option>
			                            </select>
		                            </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Privious Image:</label>
										<?php $image = $post->image; if(!file_exists($image)){$image ='public/backend/assets/images/placeholder.jpg'; }?>

										<img src="{{ asset($image) }}" height="200">
										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Privious PDF: </label>
										<?php $pdf = $post->pdf; if(!file_exists($pdf)){ ?>
											<img src="{{ asset('public/backend/assets/images/no_pdf.jpg') }}" height="200">
										<?php } else{?>

										<embed src="{{ asset($pdf) }}"  height="200" />
										<?php }?>
										
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label>Image: </label>
										<input type="file" name="image" accept="image/*"  value="{{ old('image') }}"  class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
										<span class="help-block">Upload Images (Max 4 Images)</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>PDF: </label>
										<input type="file" name="pdf"  accept="application/pdf"  value="{{ old('pdf') }}" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
										<span class="help-block">Upload pdf file only</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-12 col-lg-12">
								<div class="text-right">
									<button type="submit"  class="btn btn-success btn-block data-check" data-toggle="modal" data-target="#confirm_modal">Update Post<i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					</div>
				<!-- /form validation -->
			</div>

		</div>
	</form>
</div>
<script>
        document.forms['postEditForm'].elements['cat_id'].value={{ $post->cat_id }}
        document.forms['postEditForm'].elements['status'].value={{ $post->status }}
    </script>
@endsection