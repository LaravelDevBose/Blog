@extends('layouts.user')
@section('title', 'View Post')
@section('asset')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')

<!-- Content area -->
<div class="content">

    <!-- Post grid -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="thumb content-group">
                        <!-- <img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" alt="" class="img-responsive"> -->
                        <div class="caption-overflow">
                            <span>
                                <a href="blog_single.html" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>
                            </span>
                        </div>
                    </div>

                    <h5 class="text-semibold mb-5">
                        <a href="#" class="text-default">Domestic confined any but son</a>
                    </h5>

                    <ul class="list-inline list-inline-separate text-muted content-group">
                        <li>By <a href="#" class="text-muted">Eugene</a></li>
                        <li>July 20th, 2016</li>
                    </ul>

                    How proceed offered her offence shy forming. Returned peculiar pleasant but appetite differed she. Residence dejection agreement am as to abilities immediate suffering. Ye am depending propriety sweetness distrusts belonging collected. Smiling mention he
                </div>

                <div class="panel-footer panel-footer-condensed">
                    <div class="heading-elements not-collapsible">
                        <ul class="list-inline list-inline-separate heading-text text-muted">
                            <li><a href="#" class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> 29</a></li>
                        </ul>

                        <a href="#" class="heading-text pull-right">Read more <i class="icon-arrow-right14 position-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="thumb content-group">
                        <img src="{{ asset('public/backend/assets/images/placeholder.jpg') }}" alt="" class="img-responsive">
                        <div class="caption-overflow">
                            <span>
                                <a href="blog_single.html" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>
                            </span>
                        </div>
                    </div>

                    <h5 class="text-semibold mb-5">
                        <a href="#" class="text-default">Wisdom new and valley answer</a>
                    </h5>

                    <ul class="list-inline list-inline-separate text-muted content-group">
                        <li>By <a href="#" class="text-muted">Eugene</a></li>
                        <li>July 19th, 2016</li>
                    </ul>

                    Rank tall boy man them over post now. Off into she bed long fat room. Recommend existence curiosity perfectly favourite get eat she why daughters. Not may too nay busy last song must sell. An newspaper assurance discourse ye certainly. Soon gone game and why many calm have.
                </div>

                <div class="panel-footer panel-footer-condensed">
                    <div class="heading-elements not-collapsible">
                        <ul class="list-inline list-inline-separate heading-text text-muted">
                            <li><a href="#" class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> 64</a></li>
                        </ul>

                        <a href="#" class="heading-text pull-right">Read more <i class="icon-arrow-right14 position-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /post grid -->


    <!-- Pagination -->
    <div class="text-center content-group-lg pt-20">
        <ul class="pagination">
            <li class="disabled"><a href="#"><i class="icon-arrow-small-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"><i class="icon-arrow-small-right"></i></a></li>
        </ul>
    </div>
    <!-- /pagination -->

</div>
<!-- /content area -->

@endsection