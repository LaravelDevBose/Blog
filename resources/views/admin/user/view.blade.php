@extends('layouts.admin')
@section('title', 'Category')
@section('asset')
    <!-- Theme JS files -->
    
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/user_profile_tabbed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
<!-- Content area -->
<div class="content">

	<!-- Detached sidebar -->
	<div class="sidebar-detached">
		<div class="sidebar sidebar-default sidebar-separate">
			<div class="sidebar-content">

				<!-- User details -->
				<div class="content-group">
					<div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
						<div class="content-group-sm">
							<h6 class="text-semibold no-margin-bottom">
								Victoria Davidson
							</h6>

							<span class="display-block">Head of UX</span>
						</div>

						<a href="#" class="display-inline-block content-group-sm">
							<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
						</a>

						<ul class="list-inline list-inline-condensed no-margin-bottom">
							<li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
							<li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
							<li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
						</ul>
					</div>

					<div class="panel no-border-top no-border-radius-top">
						<ul class="navigation">
							<li class="navigation-header">Navigation</li>
							<li class="active"><a href="#profile" data-toggle="tab"><i class="icon-files-empty"></i> Profile</a></li>							
							<li><a href="#orders" data-toggle="tab"><i class="icon-files-empty"></i> Orders</a></li>
						</ul>
					</div>
				</div>
				<!-- /user details -->


				<!-- Online users -->
				<div class="sidebar-category">
					<div class="category-title">
						<span>Online users</span>
						<ul class="icons-list">
							<li><a href="#" data-action="collapse"></a></li>
						</ul>
					</div>

					<div class="category-content">
						<ul class="media-list">
							<li class="media">
								<a href="#" class="media-left"><img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-sm img-circle" alt=""></a>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">James Alexander</a>
									<span class="text-size-mini text-muted display-block">Santa Ana, CA.</span>
								</div>
								<div class="media-right media-middle">
									<span class="status-mark border-success"></span>
								</div>
							</li>

							<li class="media">
								<a href="#" class="media-left"><img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-sm img-circle" alt=""></a>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Jeremy Victorino</a>
									<span class="text-size-mini text-muted display-block">Dowagiac, MI.</span>
								</div>
								<div class="media-right media-middle">
									<span class="status-mark border-danger"></span>
								</div>
							</li>

							<li class="media">
								<a href="#" class="media-left"><img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-sm img-circle" alt=""></a>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Margo Baker</a>
									<span class="text-size-mini text-muted display-block">Kasaan, AK.</span>
								</div>
								<div class="media-right media-middle">
									<span class="status-mark border-success"></span>
								</div>
							</li>

							<li class="media">
								<a href="#" class="media-left"><img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-sm img-circle" alt=""></a>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Beatrix Diaz</a>
									<span class="text-size-mini text-muted display-block">Neenah, WI.</span>
								</div>
								<div class="media-right media-middle">
									<span class="status-mark border-warning"></span>
								</div>
							</li>

							<li class="media">
								<a href="#" class="media-left"><img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" class="img-sm img-circle" alt=""></a>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Richard Vango</a>
									<span class="text-size-mini text-muted display-block">Grapevine, TX.</span>
								</div>
								<div class="media-right media-middle">
									<span class="status-mark border-grey-400"></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- /online-users -->
			</div>
		</div>
	</div>
    <!-- /detached sidebar -->


	<!-- Detached content -->
	<div class="container-detached">
		<div class="content-detached">

			<!-- Tab content -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="profile">

					<!-- Profile info -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title">Profile information</h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							
						</div>
					</div>
					<!-- /profile info -->
				</div>

				<div class="tab-pane fade" id="orders">

					<!-- Orders history -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title">Orders history</h6>
							<div class="heading-elements">
		                	</div>
						</div>

						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">Product name</th>
										<th>Size</th>
										<th>Colour</th>
										<th>Article number</th>
										<th>Units</th>
										<th>Price</th>
										<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
									</tr>
								</thead>
								<tbody>
									

									<tr>
										<td class="no-padding-right" style="width: 45px;">
											<a href="#">
												<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Fathom Backpack</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-grey position-left"></span>
												Processing
											</div>
										</td>
										<td>34cm x 29cm</td>
										<td>Orange</td>
										<td>
											<a href="#">1237749</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 79.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>

									<tr>
										<td class="no-padding-right">
											<a href="#">
											<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Mystery Air Long Sleeve T Shirt</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-grey position-left"></span>
												Processing
											</div>
										</td>
										<td>L</td>
										<td>Process Red</td>
										<td>
											<a href="#">345634</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 38.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>

									<tr>
										<td class="no-padding-right">
											<a href="#">
												<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Women’s Prospect Backpack</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-grey position-left"></span>
												Processing
											</div>
										</td>
										<td>46cm x 28cm</td>
										<td>Neu Nordic Print</td>
										<td>
											<a href="#">5739584</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 60.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>

									<tr>
										<td class="no-padding-right">
											<a href="#">
												<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Overlook Short Sleeve T Shirt</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-grey position-left"></span>
												Processing
											</div>
										</td>
										<td>M</td>
										<td>Gray Heather</td>
										<td>
											<a href="#">434450</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 35.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>	

									<tr>
										<td class="no-padding-right">
											<a href="#">
												<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Infinite Ride Liner</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-success position-left"></span>
												Shipped
											</div>
										</td>
										<td>43</td>
										<td>Black</td>
										<td>
											<a href="#">34739</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 210.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>

									<tr>
										<td class="no-padding-right">
											<a href="#">
												<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Custom Snowboard</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-success position-left"></span>
												Shipped
											</div>
										</td>
										<td>151</td>
										<td>Black/Blue</td>
										<td>
											<a href="#">5574832</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 600.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>

									<tr>
										<td class="no-padding-right">
											<a href="#">
												<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
											</a>
										</td>
										<td>
											<a href="#" class="text-semibold">Kids' Day Hiker 20L Backpack</a>
											<div class="text-muted text-size-small">
												<span class="status-mark bg-success position-left"></span>
												Shipped
											</div>
										</td>
										<td>24cm x 29cm</td>
										<td>Figaro Stripe</td>
										<td>
											<a href="#">6684902</a>
										</td>
										<td>1</td>
										<td>
											<h6 class="no-margin text-semibold">&euro; 55.00</h6>
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#"><i class="icon-truck"></i> Track parcel</a></li>
														<li><a href="#"><i class="icon-file-download"></i> Download invoice</a></li>
														<li><a href="#"><i class="icon-wallet"></i> Payment details</a></li>
														<li class="divider"></li>
														<li><a href="#"><i class="icon-warning2"></i> Report problem</a></li>
													</ul>
												</li>
											</ul>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					<!-- /orders history -->

				</div>
			</div>
			<!-- /tab content -->

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