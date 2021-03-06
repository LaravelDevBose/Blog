<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')

    <title>{{ $siteName }} | @yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href="{{ asset('public/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/front/font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('public/front/css/default.css') }}">

</head>

<body>

<!-- Page Header -->
@include('front.includes.header')

<!-- Main Content -->
<section id="content">
    <div class="container content-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner">
                    <?php if(!file_exists($banner)){$banner ='public/front/img/blog-banner.jpg'; }?>
                    <img src="{{ asset($banner) }}" class="img-fluid" alt="" style="max-height: 200px; width: 100%;">
                </div>
                @include('admin.includes.message')
            </div>
            @include('front.includes.leftSidebar')

            @yield('content')

            
        </div>
    </div>
</section>


<div id="modal_comment_login" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>

            <div class="modal-body">
                <h6 class="text-semibold">আপনাকে প্রথমে লগইন করতে হবে...</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">OK</button>
                
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
@include('front.includes.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('public/front/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('public/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/front/js/bootstrap.min.js') }}"></script>

@yield('extra_script')
</body>

</html>

