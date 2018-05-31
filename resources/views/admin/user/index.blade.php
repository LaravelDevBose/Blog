@extends('layouts.admin')
@section('title', 'User List')
@section('asset')
    <!-- Theme JS files -->
    
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/ecommerce_orders_history.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
<!-- Content area -->
<div class="content">

	<!-- Orders history (datatable) -->
	<div class="panel panel-white">
		<div class="panel-heading">
			<h6 class="panel-title">User List</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		
            	</ul>
        	</div>
		</div>

		<table class="table table-orders-history text-nowrap">
			<thead>
				<tr>
					<th>Status</th>
					<th>Product name</th>
					<th>Size</th>
					<th>Colour</th>
					<th>Article number</th>
					<th>Units</th>
					<th>Price</th>
					<th class="text-center"><i class="icon-arrow-down12"></i></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>
						<div class="media">
							<a href="#" class="media-left">
								<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
							</a>

							<div class="media-body media-middle">
								<a href="#" class="text-semibold">Fathom Backpack</a>
								<div class="text-muted text-size-small">
									<span class="status-mark bg-grey position-left"></span>
									Processing
								</div>
							</div>
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
					<td></td>
					<td>
						<div class="media">
							<a href="#" class="media-left">
								<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
							</a>

							<div class="media-body media-middle">
								<a href="#" class="text-semibold">Mystery Air Long Sleeve T Shirt</a>
								<div class="text-muted text-size-small">
									<span class="status-mark bg-grey position-left"></span>
									Processing
								</div>
							</div>
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
					<td></td>
					<td>
						<div class="media">
							<a href="#" class="media-left">
								<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
							</a>
							
							<div class="media-body media-middle">
								<a href="#" class="text-semibold">Women’s Prospect Backpack</a>
								<div class="text-muted text-size-small">
									<span class="status-mark bg-grey position-left"></span>
									Processing
								</div>
							</div>
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
					<td></td>
					<td>
						<div class="media">
							<a href="#" class="media-left">
								<img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" height="60" class="" alt="">
							</a>

							<div class="media-body media-middle">
								<a href="#" class="text-semibold">Overlook Short Sleeve T Shirt</a>
								<div class="text-muted text-size-small">
									<span class="status-mark bg-grey position-left"></span>
									Processing
								</div>
							</div>
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

	


			</tbody>
		</table>
	</div>
	<!-- /orders history (datatable) -->


	<!-- Footer -->
	<div class="footer text-muted">
		&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
	</div>
	<!-- /footer -->

</div>
<!-- /content area -->


@endsection