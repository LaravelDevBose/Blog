@extends('layouts.admin')
@section('title', 'Advertisement')
@section('asset')
    <!-- Theme JS files -->

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/gallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Both borders -->

        <div class="panel panel-primary panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Advertisement information</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>

                    </ul>
                </div>
            </div>

            <form action="{{ route('ads.store') }}" method="POST" style="border: 1px solid #2196f3;" enctype="multipart/form-data">{{ csrf_field()}}
                <div class="panel-body">

                    <div class="form-group  col-lg-4 " >
                        <label>Top Advertisement Image: <span class="text-bold text-danger">*</span></label>
                        <input type="file" class="file-styled" name="top_ads" accept="image/*">
                        <input type="hidden" name="old_top_ads" value="{{ $top_ads }}">
                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
                    </div>
                    <div class="form-group  col-lg-4 " >
                        <label>Right Side Advertisement Image: <span class="text-bold text-danger">*</span></label>
                        <input type="file" class="file-styled" name="right_ads" accept="image/*">
                        <input type="hidden" name="old_right_ads" value="{{ $right_ads }}">
                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
                    </div>
                    <div class="form-group  col-lg-2" >

                        <button type="submit" style="margin-top: 27px" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </form>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="thumbnail">
                            <div class="thumb">
                                <?php if(!file_exists($top_ads)){$top_ads ='public/backend/assets/images/no_available_image.gif'; }?>
                                <img src="{{ asset($top_ads) }}" alt="Top Advertisement Image" style="min-height: 180px;" >
                                <div class="caption-overflow">
                                <span>
                                    <a href="{{ asset($top_ads) }}" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                </span>
                                </div>
                            </div>

                            <div class="caption">
                                <h6 class="no-margin">
                                    <a href="#" class="text-default">Top Advertisement Image</a>
                                    <a href="{{ route('ads.delete', 'top_ads') }}" class="text-danger" title="Delete Image"><i class="icon-trash pull-right"></i></a>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="thumbnail">
                            <div class="thumb">
                                <?php if(!file_exists($right_ads)){$right_ads ='public/backend/assets/images/no_available_image.gif'; }?>
                                <img src="{{ asset($right_ads) }}" alt="Top Advertisement Image" style="height: 180px;" >
                                <div class="caption-overflow">
                                <span>
                                    <a href="{{ asset($right_ads) }}" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                </span>
                                </div>
                            </div>

                            <div class="caption">
                                <h6 class="no-margin">
                                    <a href="#" class="text-default">Right Advertisement Image</a>
                                    <a href="{{ route('ads.delete', 'right_ads') }}" class="text-danger" title="Delete Image"><i class="icon-trash pull-right"></i></a>
                                </h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection