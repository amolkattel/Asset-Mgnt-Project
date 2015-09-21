@extends('layout')

@section('content')

<div class="login-box">
    @include('errors/validation')
    <div class="login-logo">Login</div>
        <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <form action="/auth/login" method="POST" role="form">
            {!! csrf_field() !!}
                
            <div class="form-group has-feedback">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
                <span class="fa fa-envelope form-control-feedback"></span>
              </div>
            <div class="form-group has-feedback">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember"> Remember me
                    </label>
                  </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
              </div>
              
        </form>
    </div>
 </div>   

@stop