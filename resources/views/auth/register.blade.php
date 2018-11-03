@extends('layouts.front')
@section('title', 'Register')
@section('content')
    <style>
        .form-group {
            margin-bottom: .3rem;
        }
    </style>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card ">
        <div class="card-header">Register</div>

        <div class="card-body">
            <form  method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="row">
                    
                
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Name: <span class="text-bold text-danger">*</span></label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class=" control-label">User Name: <span class="text-bold text-danger">*</span></label>
        
                            <div class="">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
        
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class=" control-label">E-Mail Address: <span class="text-bold text-danger">*</span></label>
    
                        <div class="">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                        <label for="phoneNo" class=" control-label">Phone Number: <span class="text-bold text-danger">*</span></label>
    
                        <div class="">
                            <input id="phoneNo" type="text" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}" required autofocus>
    
                            @if ($errors->has('phoneNo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phoneNo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password: <span class="text-bold text-danger">*</span></label>
    
                        <div class="">
                            <input id="password" type="password" class="form-control" name="password" required>
    
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="password-confirm" class=" control-label">Confirm Password: <span class="text-bold text-danger">*</span></label>
    
                        <div class="">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block pull-right">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
