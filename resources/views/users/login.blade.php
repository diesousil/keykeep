@extends('layouts.auth')

@section('title', 'Authentication')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/">
	<img src="/img/logo.png"
	   alt="<?php echo config("app.name"); ?> Logo"
	   class="brand-image auth"
	   style="opacity: .8">
	   <br/>
	<b><?php echo config("app.name"); ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      {!! Form::open(['action' => 'UserController@login','method'=>'post']) !!}
        <div class="input-group mb-3">
          {!! Form::text('email', '', ["class"=>"form-control","placeholder"=>"Email"]) !!}
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        {!! Form::password('password', ["class"=>"form-control","placeholder"=>"Password"]) !!}          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              {!! Form::checkbox('remember') !!}          
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            {!! Form::submit('Sign In',["class"=>"btn btn-primary btn-block"]) !!}
          </div>
          <!-- /.col -->
        </div>
      {!! Form::close() !!}

      @if(Session::has('error-message'))
      <p class="mb-1 error-message">
        {!! Session::get('error-message') !!}
      </p>
      @endif
      
      <p class="mb-1">
        <a href="{{url('forgot')}}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{url('register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@stop