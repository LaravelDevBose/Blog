@extends('layouts.admin')
@section('title', 'Followers & Follows List')
@section('asset')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/user_pages_list.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <!-- Content area -->
    <div class="content" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary panel-bordered">
                    <div class="panel-heading">
                        <h5 class="panel-title">Followers List</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <ul class="media-list media-list-linked">
                        @if(isset($followers) && $followers)
                            @foreach($followers as $follower )
                                <li class="media">
                                    <a href="#" class="media-link">
                                        <div class="media-left">

                                            <?php $avater = $follower->avatar ; if(strpos($avater, 'https') === false): if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; } endif; ?>
                                            <img src="{{ (strpos($follower->avatar, 'https') === true)? $avater : asset($avater) }}" class="img-circle img-lg" alt="{{ ucwords($follower->name) }}">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading text-semibold">{{ ucwords($follower->name) }}</div>
                                            <span class="text-muted">{{ ucwords($follower->phoneNo) }}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span class="label label-primary">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($follower->created_at))->diffForHumans() }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @endif

                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary panel-bordered">
                    <div class="panel-heading">
                        <h5 class="panel-title">Following List</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <ul class="media-list media-list-linked">
                        @if(isset($follows) && $follows)
                            @foreach($follows as $follow )
                                <li class="media">
                                    <a href="#" class="media-link">
                                        <div class="media-left">

                                            <?php $avater = $follow->avatar ; if(strpos($avater, 'https') === false): if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; } endif; ?>
                                            <img src="{{ (strpos($follow->avatar, 'https') === true)? $avater : asset($avater) }}" class="img-circle img-lg" alt="{{ ucwords($follow->name) }}">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading text-semibold">{{ ucwords($follow->name) }}</div>
                                            <span class="text-muted">{{ ucwords($follow->phoneNo) }}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span class="label label-primary">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($follow->created_at))->diffForHumans() }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection