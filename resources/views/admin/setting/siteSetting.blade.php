@extends('layouts.admin')
@section('title', 'Site Setting')
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
						<h5 class="panel-title">Site Setting</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Site Name:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label sName">{{ $siteName }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('siteName')" > <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="siteName" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-7 ">
										<input type="text" name="siteName" class="form-control" placeholder="Site Name...">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary siteName_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Logo:</label>
								</div>	
								<div class="col-lg-7">
									<?php if(!file_exists($logo)){$logo ='public/backend/assets/images/placeholder.jpg'; }?>
									<img src="{{ asset($logo) }}" height="80" class="" alt="">
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('siteLogo')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="siteLogo" style="display: none;">
								<div class="col-lg-offset-3" >
									<form  action="{{ route('siteLogo') }}" method="post" enctype="multipart/form-data">
										{{ csrf_field()}}

										<div class="col-lg-7 ">
											<input type="file" class="file-styled" name="logo">
											<span class="help-block">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
										</div>

										<div class="col-lg-2 col-lg-offset-2">
											<button type="submit" class="btn btn-primary logo_submit">Submit</button>
										</div>
									</form>
								</div>
							</div>
							<hr>
						</div>


						

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">About Us:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label aboutUs">{{ $aboutUs }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('aboutUs')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="aboutUs" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-9 ">
										<textarea rows="5" cols="5" name="aboutUs" class="form-control" placeholder="Enter About Us..."></textarea>
									</div>

									<div class="col-lg-2 ">
										<button type="submit" class="btn btn-primary about_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Address:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label address">{{ $address }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('address')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="address" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-9 ">
										<textarea rows="5" cols="5" name="address" class="form-control" placeholder="Enter your Site Address"></textarea>
									</div>

									<div class="col-lg-2 ">
										<button type="submit" class="btn btn-primary address_submit">Submit</button>
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
									<label class="control-label phone">{{$phoneNo}}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('phnNo')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="phnNo" style="display: none;">
								<div class="col-lg-offset-3" >
									<div class="col-lg-7 ">
										<input type="number" name="phone" class="form-control" placeholder="Site Phone Number">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary phone_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Site Email:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label email">{{ $email }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('email')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="email" style="display: none;">
								<div class="col-lg-offset-3">
									<div class="col-lg-7 ">
										<input type="email" name="email" class="form-control" placeholder="Site Email Address...">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary email_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Facebook Page Url:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label fbUrl">{{ $facebookLink }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('fbUrl')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="fbUrl" style="display: none;">
								<div class="col-lg-offset-3">
									<div class="col-lg-7 ">
										<input type="text" name="fbUrl" class="form-control" placeholder="Facebook Page Url">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary fbUrl_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Twitter Page Url:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label tUrl">{{ $twitterLink }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('tUrl')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="tUrl" style="display: none;">
								<div class="col-lg-offset-3">
									<div class="col-lg-7 ">
										<input type="text" name="tUrl" class="form-control" placeholder="Twitter Page Url...">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary tUrl_submit">Submit</button>
									</div>
								</div>
							</div>
							<hr>
						</div>

						<div class="form-group">
							<div class="row" style="margin-bottom:  10px;">
								<div class="col-lg-3">
									<label class=" control-label text-bold">Instagram Page Url:</label>
								</div>	
								<div class="col-lg-7">
									<label class="control-label insUrl">{{ $instagramLink }}</label>
								</div>

								<div class="col-lg-2">
									<label class="text-info" title="Edit" onclick="viewToggle('insUrl')"> <i class="icon-pencil5"></i></label>
								</div>
								
							</div>
							
							<div class="row" id="insUrl" style="display: none;">
								<div class="col-lg-offset-3">
									<div class="col-lg-7 ">
										<input type="text" name="insUrl" class="form-control" placeholder="Instagram Page Url...">
									</div>

									<div class="col-lg-2 col-lg-offset-2">
										<button type="submit" class="btn btn-primary insUrl_submit">Submit</button>
									</div>
								</div>
							</div>
							
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
    <script type="text/javascript" src="{{ asset('public/backend/ajax/siteSetting.js') }}"></script>

@endsection