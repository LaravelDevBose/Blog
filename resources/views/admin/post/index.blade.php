@extends('layouts.admin')
@section('title', 'View Post')
@section('asset')
     <!-- Theme JS files -->
    
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_extension_colvis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/ripple.min.js') }}"></script>
 <!-- /Theme JS files -->
@endsection

@section('content')

<!-- Content area -->
<div class="content">
<!-- Orders history (datatable) -->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">User List</h6>
            <div class="heading-elements">
                
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-info"><i class=" icon-add"></i> New Post</a>
            </div>
        </div>

        <table class="table datatable-colvis-state text-nowrap">
            <thead>
                <tr>
                    
                    <th>Post Title</th>
                    <th>Categoty</th>
                    <th>Like</th>
                    <th>Comment</th>
                    <th>Ratting</th>
                    <th>Status</th>
                    <th class="text-center"><i class="icon-arrow-down12"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                   
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
                                    {{ ($post->author_id == 0)?'Admin': $post->author->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $post->category->cat_title }}</td>
                    
                    <td> 50</td>
                    <td>10</td>
                    <td>4.8</td>
                    <td>
                        @if($post->status == 1)
                            <label class="label label-success">Publish</label>
                        @else
                            <label class="label label-danger">UnPublish</label>
                        @endif
                    </td>
                    <td class="text-center">
                        <ul class="list-inline">
                          <li class="list-inline-item"><a href="{{ route('post.view', $post->id) }}" title="View Post" class="label label-info"><i class="icon-eye"></i></a></li>
                          <li class="list-inline-item"><a href="{{ route('post.edit', $post->id) }}" title="Edit Post" class="label label-primary"><i class="icon-pencil7"></i></a></li>
                          <li class="list-inline-item"><a href="{{ route('post.destroy', $post->id) }}" title="Delete Post" class="label label-danger"><i class="icon-trash"></i></a></li>
                          
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /orders history (datatable) -->


</div>
<!-- /content area -->

@endsection