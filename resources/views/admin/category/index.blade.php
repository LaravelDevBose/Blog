@extends('layouts.admin')
@section('title', 'Category')
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
            <h5 class="panel-title">View All Category</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    
                </ul>
            </div>
        </div>

        <form action="{{ route('category.store') }}" method="POST" style="border: 1px solid #2196f3;">{{ csrf_field()}}
            <div class="panel-body">
                
                <div class="form-group  col-lg-4 col-lg-offset-1" >
                    <label>Category Title: <span class="text-bold text-danger">*</span></label>
                    <input type="text" name="cat_title" required class="form-control" placeholder="Category Title">
                </div>

                <div class="form-group col-lg-4">
                    <label>Publication Status: <span class="text-bold text-danger">*</span></label>
                    <select class="select" required name="cat_status">
                        <option value="0">Unpublish</option>
                        <option value="1">Publish</option>
                    </select>
                </div>

                <div class="form-group  col-lg-2" >
                    <p>.</p>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Title</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- /both borders -->

</div>

<!-- Small modal -->
<div id="cat_edit_model" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Category Edit Model</h5>
            </div>
        <form action="{{ route('category.update') }}" method="POST" >{{ csrf_field()}}
            <div class="modal-body">
                <input type="hidden" name="cat_id">
                <div class="form-group  col-lg-12" >
                    <label>Category Title: <span class="text-bold text-danger">*</span></label>
                    <input type="text" name="cat_title" required class="form-control" placeholder="Category Title">
                </div>
                <div class="form-group  col-lg-12" >
                    <label>Publication Status: <span class="text-bold text-danger">*</span></label>
                    <select class="select" required name="cat_status">
                        
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- /small modal -->

<script>
    $('.cat_edit').click(function(){
        var cat_id = $(this).attr('id');
        var cat_title = $(this).parent("td").prev("td").prev("td").attr('id');
        var cat_status = $(this).parent("td").prev("td").attr('id');
        
        $('#cat_edit_model').find('input[name="cat_id"]').val(cat_id);
        $('#cat_edit_model').find('input[name="cat_title"]').val(cat_title);
        $('#cat_edit_model').find('select[name="cat_status"]').empty();
        if(cat_status == 1){
            $('#cat_edit_model').find('select[name="cat_status"]').append('<option selected value="1">Publish</option><option value="0">Un-Publish</option>');

        }else{
            $('#cat_edit_model').find('select[name="cat_status"]').append('<option value="1">Publish</option><option selected value="0">Un-Publish</option>');
        }
    });
</script>
@endsection