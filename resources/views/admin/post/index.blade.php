@extends('layouts.admin')
@section('title', 'View Post')
@section('asset')
     <!-- Theme JS files -->
    
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_extension_colvis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
 <!-- /Theme JS files -->
@endsection

@section('content')

<!-- Content area -->
<div class="content">
<!-- Orders history (datatable) -->
<form action="{{ route('post.selected.action') }}" method="POST">{{ csrf_field()}}
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">User List</h6>
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <div class="form-group">
                    
                    <select name="action"  data-placeholder="Select Post Status"  class="select">
                        <option value="0">Unpublish</option>
                        <option value="1">publish</option>
                        <option value="2">Selected Post</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-sm btn-info" type="submit">Submit</button>
            <a href="{{ route('post.create') }}" class="btn btn-sm btn-info pull-right"><i class=" icon-add"></i> New Post</a>

        </div>

        <table class="table datatable-colvis-state text-nowrap">
            <thead>
                <tr>
                    <th></th>
                    <th>Post Title</th>
                    <th>Categoty</th>
                    <th>Like</th>
                    <th>Comment</th>
                    <th>Reading</th>
                    <th>Status</th>
                    <th class="text-center"><i class="icon-arrow-down12"></i> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                   <td><label class="checkbox-inline">
                            <input type="checkbox" class="styled" name="selected[]" value="{{ $post->id }}">
                            
                        </label>
                    </td>
                    <td>
                        <div class="media">
                            <a href="#" class="media-left">
                                <?php $image = $post->image; if(!file_exists($image)){$image ='public/backend/assets/images/placeholder.jpg'; }?>
                                <img src="{{ asset($image) }}" height="60" width="60" class="" alt="{{ $post->title }}">
                            </a>

                            <div class="media-body media-middle">
                                <a href="{{ route('post.view', $post->id) }}" class="text-semibold">{{ $post->title }}</a>
                                <div class="text-muted text-size-small">
                                    <i class="icon-user-plus text-info position-left"></i>
                                    {{ ($post->author_type == 0)?'Admin': $post->author->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $post->category->cat_title }}</td>
                    
                    <td>{{ $post->like->like }}</td>
                    <td>{{ count($post->comments) }}</td>
                    <td>{{$post->reading->reading_count}}</td>
                    <td>
                        @if($post->status == 1)
                            <label class="label label-success">Publish</label>
                        @else
                            <label class="label label-danger">UnPublish</label>
                        @endif
                    </td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li ><a href="{{ route('post.view', $post->id) }}" title="View Post" ><i class="icon-eye"></i> View Post</a></li>
                                    <li><a href="{{ route('post.edit', $post->id) }}" title="Edit Post" ><i class="icon-pencil7"></i> Edit Post</a></li>
                                    <li ><a href="{{ route('post.destroy', $post->id) }}" title="Delete Post" ><i class="icon-trash"></i> Delete Post</a></li>
                                      
                                </ul>
                            </li>
                        </ul>
                        <ul >
                          
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /orders history (datatable) -->
</form>

</div>
<!-- /content area -->

@endsection