@extends('layouts.admin')
@section('title', 'Advertisement')
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
                        <label>Advertisement Image: <span class="text-bold text-danger">*</span></label>
                        <input type="file" class="file-styled" name="banner" accept="image/*">
                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Position: <span class="text-bold text-danger">*</span></label>
                        <select class="select" required name="cat_status">
                            <option value="0">Unpublished</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Publication Status: <span class="text-bold text-danger">*</span></label>
                        <select class="select" required name="cat_status">
                            <option value="0">Unpublished</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>

                    <div class="form-group  col-lg-2" >

                        <button type="submit" style="margin-top: 27px" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Advertisement Image</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($categories) && $categories)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td id="{{$category->cat_title}}">{{ $category->cat_title }}</td>
                                <td id="{{$category->cat_status == 1}}">
                                    @if($category->cat_status == 1)
                                        <label class="label label-success">Publish</label>
                                    @else
                                        <label class="label label-warning">Un-Publish</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" id="{{ $category->id }}" class="btn btn-sm btn-info cat_edit" data-toggle="modal" data-target="#cat_edit_model"> <i class="icon-pencil7"></i></a>
                                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-sm btn-danger" > <i class="icon-trash"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /both borders -->

    </div>

@endsection