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
					<th>User Name</th>
					<th>Total Post</th>
					<th>Comments</th>
					<th>Followers</th>
					<th>Following</th>
					<th>Price</th>
					<th class="text-center"><i class="icon-arrow-down12"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td></td>
					<td>
						<div class="media">
							<a href="#" class="media-left">
                    			<?php $avater = $user->avater;  if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; }?>

								<img src="{{ asset($avater) }}" height="60" class="" alt="{{ $user->name }}">
							</a>

							<div class="media-body media-middle">
								<a href="#" class="text-semibold">{{ $user->name }}</a>
								<div class="text-muted text-size-small">
									<span class="status-mark bg-{{ ($user->status == 1) ? 'success' :($user->status == 0) ? 'danger' : 'primary' }} position-left"></span>
									{{ ($user->status == 1) ? 'Active' :($user->status == 0) ? 'Block' : 'Procecing' }}
								</div>
							</div>
						</div>
					</td>
					<td>{{ count($user->posts) }}</td>
					<td>{{ count($user->comments) }}</td>
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
				@endforeach
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