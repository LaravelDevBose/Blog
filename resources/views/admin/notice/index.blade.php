@extends('layouts.admin')
@section('title', 'View Post')
@section('asset')
    <!-- Theme JS files -->

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_basic.js') }}"></script>
    <!-- /Theme JS files -->
@endsection

@section('content')
<div class="content">
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">User List</h6>
            <ul class="icons-list">
                <a href="{{ route('notice.create') }}" class="btn btn-sm btn-info pull-right" style="margin-top: -30px;"><i class=" icon-add"></i> New Notice</a>
            </ul>

        </div>
        <div class="table-responsive">
            <table class="table datatable-basic table-bordered">
            <thead>
            <tr>
                <th>Notice Title</th>
                <th>Notice Content</th>
                <th>Priority</th>
                <th>Status</th>
                <th class="text-center"><i class="icon-arrow-down12"></i> Action</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($notices) && $notices)
                @foreach($notices as $notice)
                    <tr>

                        <td>{{ $notice->notice_title }}</td>
                        <td>{!!  substr($notice->notice_content, 0,50) !!}</td>
                        <td>
                            @if($notice->priority == 1)
                                <label class="label label-danger">Show Top In Home Page</label>
                            @elseif($notice->priority == 2)
                                <label class="label label-warning">Most Important</label>
                            @else
                                <label class="label label-orange-700">Most Important</label>
                            @endif
                        </td>
                        <td>
                            @if($notice->status == 1)
                                <label class="label label-success">Publish</label>
                            @else
                                <label class="label label-danger">UnPublish</label>
                            @endif
                        </td>
                        <td class="text-center">

                            <ul class="icons-list">
                                <li class="text-teal-600" ><a href="{{ route('notice.view', $notice->id) }}" title="View Notice" ><i class="icon-eye"></i></a></li>
                                <li class="text-primary-600" ><a href="{{ route('notice.edit', $notice->id) }}" title="Edit Notice" ><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600" ><a href="{{ route('notice.destroy', $notice->id) }}" title="Delete Notice" ><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection