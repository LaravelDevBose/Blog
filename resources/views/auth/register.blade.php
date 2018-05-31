@extends('layouts.front')
@section('title', 'Register')
@section('content')

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card ">
        <div class="card-header">Register</div>

        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-6 control-label">Name: <span class="text-bold text-danger">*</span></label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-6 control-label">User Name: <span class="text-bold text-danger">*</span></label>

                    <div class="col-md-12">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-6 control-label">E-Mail Address: <span class="text-bold text-danger">*</span></label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                    <label for="phoneNo" class="col-md-6 control-label">Phone Number: <span class="text-bold text-danger">*</span></label>

                    <div class="col-md-12">
                        <input id="phoneNo" type="text" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}" required autofocus>

                        @if ($errors->has('phoneNo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phoneNo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-6 control-label">Password: <span class="text-bold text-danger">*</span></label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-6 control-label">Confirm Password: <span class="text-bold text-danger">*</span></label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar-left-border">
    <div class="row">
        <div class="col-md-12 ">
            <div class="add-right-sidebar">

            </div>
        </div>

    </div>
    <div class="row">
        <div class="right-sidebar">
            <div class="col-md-12">
                <div class="popular-post">
                    <div class="popular-post-heading">
                        <h5>জনপ্রিয় কবিতা গুলো</h5>
                    </div>
                    <ul>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                    </ul>
                    <div class="popular-post-footer">
                        <a href="" >সবগুলো পড়ুন ..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="this-week-post">
                    <div class="this-week-post-heading">
                        <h5>জনপ্রিয় কবিতা গুলো</h5>
                    </div>
                    <ul>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                        <li >
                            <a href="#" >
                                <img src="img/post-sample-image.jpg" alt="">
                                <p>this is a demo blog title only for design porpose
                                    <label>লেখকঃ- <span>তন্ময় সাহা</span></label>
                                </p>

                            </a>
                        </li>
                    </ul>
                    <div class="this-week-pos-footer">
                        <a href="" >সবগুলো পড়ুন ..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12"></div>
        </div>

    </div>
</div>

@endsection
