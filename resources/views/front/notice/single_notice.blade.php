@extends('layouts.front')

@section('title',$notice->notice_title)

@section('content')
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <div class="add-mid-body">

                </div>
            </div>
        </div>

        @if(isset($notice) && $notice)
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 home-blog">

                        <div class="card-body">
                            <span style="  background-color: #f7b217; padding: 0px 15px; color: #fff;">Notice</span>
                            <a href="#"><h5 class="card-title" style="color: #f58904;">{{ $notice->notice_title }}</h5>

                            </a>
                            <p class="card-text" style="text-align: justify;">{!! $notice->notice_content !!}</p>
                        </div>
                        <div class="blog-footer">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 publish-time">

                                <small>Notice Created {{ \Carbon\Carbon::createFromTimeStamp(strtotime($notice->created_at))->diffForHumans() }}</small>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 user-activity">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @else
            <?php return redirect()->route('index'); ?>
        @endif
    </div>

    @include('front.includes.rightSidebar')
@endsection