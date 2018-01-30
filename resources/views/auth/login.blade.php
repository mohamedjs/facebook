@extends('layouts.app')

@section('content')
<div class="login-signup">
  <div class=" col-lg-12" style="width:103%">
    <div class="col-lg-6 col-md-6 col-sm-6 active" id="log">
      <h1>Login</h1>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6  activee" id="sign">
      <h1>Sign Up</h1>
    </div>
  </div>
</div>
<div class="login">
  <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
    <div class="form-group row">
      <label  class="col-sm-2 lab"><i class="fa fa-user"></i></label>
      <div class="col-sm-10">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab"><i class="fa fa-lock"></i></label>
      <div class="col-sm-10">
        <input id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <div class="checkbox">
                <label style="color:#fff;">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-primary button">
                Login
            </button>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </div>
  </form>
</div>
<div class="sign_up display">
  <form class="form-horizontal" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
    <div class="form-group row">
      <label  class="col-sm-2 lab"><i class="fa fa-user"></i></label>
      <div class="col-sm-10">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab"><i class="fa fa-envelope"></i></label>
      <div class="col-sm-10">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab"><i class="fa fa-key"></i></label>
      <div class="col-sm-10">
        <input id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab" ><i class="fa fa-key"></i></label>
      <div class="col-sm-10">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab" ><i class="fa fa-calendar"></i></label>
      <div class="col-sm-10">
        <input id="birth" type="date" class="form-control" name="birth" required>
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab" ><i class="fa fa-phone"></i></label>
      <div class="col-sm-10">
        <input id="phone" type="text" class="form-control" name="phone" required>
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab" ><i class="fa fa-job"></i></label>
      <div class="col-sm-10">
        <input id="job" type="text" class="form-control" name="job" required>
      </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-2 lab" ><i class="fa fa-address"></i></label>
      <div class="col-sm-10">
        <input id="address" type="text" class="form-control" name="address" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 lab"><i class="fa fa-venus-mars"></i></label>
        <div class="col-sm-10">
          <select class="form-control" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary button">Register</button>
  </form>
</div>
@endsection
