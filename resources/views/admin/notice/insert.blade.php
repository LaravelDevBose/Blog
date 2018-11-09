@extends('layouts.admin')
@section('title', 'Create Post')
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

        <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
            <div class="row">
                <div class=" col-lg-12">
                    <!-- Form validation -->

                    <div class="panel panel-success panel-bordered">
                        <div class="panel-heading">
                            <h5 class="panel-title">Notice Insert Form</h5>
                            <div class="heading-elements">
                                <a href="{{ route('notice.index')}}" class="btn btn-info btn-sm text-white"><i class="icon-move-left position-left"></i> Back</a>

                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content-group">
                                        <label>Notice Title:<span class="text-bold text-danger">*</span></label>
                                        <input type="text" name="notice_title" value="{{ old('notice_title') }}" required class="form-control maxlength-options" maxlength="70" placeholder="Enter Your Notice Title...">

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Notice Content: <span class="text-bold text-danger">*</span></label>
                                        <textarea name="notice_content"  class="summernote-height" maxlength="2500" placeholder="Enter Your Notice Details.....">{{ old('notice_content') }}</textarea>
                                        <span class="help-block text-info">Notice Details (Max 2500 characters)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Priority: <span class="text-bold text-danger">*</span></label>
                                        <select name="priority"  data-placeholder="Select A Priority"  class="select">
                                            <option value="1">Show Top In Home Page</option>
                                            <option value="2">Most Important</option>
                                            <option value="3">Important</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status: <span class="text-bold text-danger">*</span></label>
                                        <select name="status"  data-placeholder="Select Post Status"  class="select">
                                            <option value="0">Un-publish</option>
                                            <option value="1">publish</option>
                                        </select>
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