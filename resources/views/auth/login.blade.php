<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TransportOS | Log in</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @push('stylesheets')
    {{-- iCheck  --}}
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/iCheck/square/blue.css') }}">
  @endpush
  @include('layouts.partials._css')
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
      @csrf

      <div class="form-group has-feedback @error('email') has-error @enderror">
        @error('email')
        <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> Input with
            error</label>
        @enderror
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
          <span class="help-block">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="form-group has-feedback @error('password') has-error @enderror">
        @error('password')
        <label class="control-label" for="password"><i class="fa fa-times-circle-o"></i> Input with
            error</label>
        @enderror
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
          <span class="help-block">{{ $message }}</span>
        @enderror
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">I forgot my password</a><br>
    @endif

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@push('scripts')
{{-- iCheck --}}
<script src="{{ asset('bower_components/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endpush
@include('layouts.partials._javascript')

</body>
</html>