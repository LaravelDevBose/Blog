@extends('layouts.admin')
@section('title', 'Create Post')
@section('asset')

	<script type="text/javascript" src="{{ asset('public/backend/assets/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/uploader_bootstrap.js') }}"></script>

	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/editor_ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_controls_extended.js') }}"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Content area -->
<div class="content">
	
		<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
		<div class="row">
			<div class=" col-lg-12">
				<!-- Form validation -->
				
					<div class="panel panel-success panel-bordered">
						<div class="panel-heading">
							<h5 class="panel-title">Post Insert Form</h5>
							<div class="heading-elements">
								<a href="{{ route('post.index')}}" class="btn btn-info btn-sm text-white"><i class="icon-move-left position-left"></i> Back</a>

		                	</div>
						</div>

						<div class="panel-body">
						
							<div class="row">
								<div class="col-md-9">
									<div class="content-group">
										<label>Post Title:<span class="text-bold text-danger">*</span></label>
										<input type="text" name="title" value="{{ old('title') }}" required class="form-control maxlength-options" maxlength="70" placeholder="Enter Your Post TItle...">
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Category: <span class="text-bold text-danger">*</span></label>
										<select name="cat_id" id="cat_id"  required  class="select">
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
										<textarea name="details" id="editor-full" rows="4" cols="4" minlength="20" maxlength="2500" placeholder="Enter Your Post Details.....">{{ old('details') }}</textarea>
										<span class="help-block">Product Details (Max 2500 characters)</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Tags:</label>
										<textarea name="tags"  class="form-control" maxlength="250" placeholder="Enter Your Post Details.....">{{ old('tags') }}</textarea>
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
										<label>Image: </label>
										<input type="file" name="image" accept="image/*"  value="{{ old('image') }}"  class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
										<span class="help-block">Upload Images (Max 1 Image)</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>PDF: </label>
										<input type="file" name="pdf" accept="application/pdf"  value="{{ old('pdf') }}" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
										<span class="help-block">Upload Pdf File only</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-12 col-lg-12">
								<div class="text-right">
									<button type="submit"  class="btn btn-success btn-block data-check" data-toggle="modal" data-target="#confirm_modal">Submit form<i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					</div>
				<!-- /form validation -->
			</div>

		</div>
	</form>
</div>

@endsection