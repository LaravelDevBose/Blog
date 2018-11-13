@extends('layouts.front')

@section('title',$header)

@section('content')
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <div class="add-mid-body">

                </div>
            </div>

            <div class="col-md-12">
                <div class="page-title">
                    <h5>{{ $header}} </h5>
                </div>
            </div>
        </div>

        @if(isset($notices) && $notices)
        <div class="row">
            <div class="col-md-12">
                @foreach($notices as $notice)
                    <div class="card mb-3 home-blog">

                        <div class="card-body">
                            <span style="  background-color: #f7b217; padding: 0px 15px; color: #fff;">Notice</span>
                            <a href="{{ route('notice.read', $notice->id) }}"><h5 class="card-title" style="color: #f58904;">{{ $notice->notice_title }}</h5>

                            </a>
                            <p class="card-text">{!! substr($notice->notice_content, 0 ,200) !!} ....</p>
                            <a href="{{ route('notice.read', $notice->id) }}" class="text-info pull-right blog-link">বাকিটুকু পড়ুন...</a>
                        </div>
                        <div class="blog-footer">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 publish-time">

                                <small>Notice Created {{ \Carbon\Carbon::createFromTimeStamp(strtotime($notice->created_at))->diffForHumans() }}</small>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 user-activity">

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        @endif
    </div>

    @include('front.includes.rightSidebar')
@endsection