@extends('layouts.user')
@section('title', 'Account Setting')
@section('asset')
    <!-- Theme JS files -->
    
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
<div class="content">

	<!-- Horizontal form options -->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- Basic layout-->
			<div class="form-horizontal">
				<div class="panel panel-info panel-bordered">
					<div class="panel-heading">
						<h5 class="panel-title">Account Setting</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Full Name:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label user_fullName">{{ Auth::User()->name }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('user_fullName')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="user_fullName" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-7 ">
										<input type="text" name="user_fullName" class="form-control" placeholder="Full Name...">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit"  class="btn btn-primary user_fullName_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Avater:</label>
								</div>	
								<div class="col-lg-7">
									<?php $avater = Auth::User()->avater;  if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; }?>
									<img src="{{ asset($avater) }}" height="80" class="" alt="">
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('avater')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="avater" style="display: none;">
								<div class="col-lg-offset-3" >
									<form  action="{{ route('user.avater') }}" method="post" enctype="multipart/form-data">
										{{ csrf_field()}}
										<div class="col-lg-7 ">
											<input type="file" name="avater" required class="file-styled">
											<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
										</div>

										<div class="col-lg-2 col-lg-offset-2">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
							<hr>
						</div>
						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Bio Status:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label bio">{{ Auth::user()->bio }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('bio')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="bio" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-9 ">
										<textarea rows="5" cols="5" name="bio" class="form-control" placeholder="Enter Your Bio ..."></textarea>
									</div>

									<div class="col-lg-2 ">
										<button type="submit" class="btn btn-primary user_bio_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Phone Number:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label phoneNo">{{ Auth::user()->phoneNo }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('phoneNo')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="phoneNo" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-7 ">
										<input type="number" name="phoneNo" class="form-control" required placeholder=" Phone Number">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary user_phoneNo_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Email Address:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label email">{{ Auth::User()->email }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('email')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="email" style="display: none;">
								<div class="col-lg-offset-3">
									<div class="col-lg-7 ">
										<input type="email"  name="email" class="form-control" required placeholder=" Email Address">
										<input type="password" name="email_password" class="form-control" required placeholder="Current Password">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary user_email_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Password:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label">********</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('password')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="password" style="display: none;">
								<div class="col-lg-offset-3">
									<div class="col-lg-7 ">
										<input type="password" name="old_password" class="form-control" required placeholder="Old Password">
										<input type="password" name="password" class="form-control" required placeholder="New Password">
										<input type="password" name="con_password" class="form-control" required placeholder="Confirm Password">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary user_password_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

					</div>
				</div>
			</div>
			<!-- /basic layout -->

		</div>
	</div>
</div>

@endsection

@section('customAsset')
    <script type="text/javascript" src="{{ asset('public/backend/ajax/accountSetting.js') }}"></script>
@endsection