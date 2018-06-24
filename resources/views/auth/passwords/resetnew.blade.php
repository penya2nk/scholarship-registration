<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IPB TRAINING | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/AdminLTE.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/square/blue.css')}}">

  <!-- jQuery 3 -->
  <script src="{{asset('js/jquery.min.js')}}"></script>

  {{-- Validator --}}
  <script src="{{asset('js/validator.js')}}"></script>

  {{-- <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script> --}}
  {{-- <script src="{{asset('js/bootstrap-filestyle.js')}}"></script> --}}
  {{-- <script src="{{asset('js/bootstrap-filestyle.min.js')}}"></script> --}}
  {{-- <script src="{{asset('js/jquery.mask.js')}}"></script> --}}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image: url({{asset('images/backgrounlogin.jpg')}});
    background-repeat: no-repeat;
    background-size: cover;">

@if (Session::has('registerstatus'))
  <div class="alert alert-info" style="font-size: 17pt;">
    <center>
      {{-- Registrasi Berhasil, silahkan cek email untuk mengaktifkan --}}
    {{session::get('registerstatus')}}
    </center>
  </div>
@endif

@if (Session::has('warningverify'))
  <div class="alert alert-danger" style="font-size: 17pt;">
    <center>
    {{session::get('warningverify')}}
    </center>
  </div>
@endif

@if ($errors->has('email'))
    <div class="alert alert-danger" style="font-size: 17pt;">
      <center>
        <strong>{{ $errors->first('email') }}</strong>
      </center>
    </div>
@endif

<!-- /.login-box -->

{{-- Rigester Box --}}

<div class="login-box" id="register-box">
  <div class="register-logo">
    <b>Reset Password</b><br>
      <a href="/"><img src="{{asset('images/logo.png')}}" style="width: 232px" alt=""></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Reset Password</p>

    <form role="form" data-toggle="validator" action="{{ route('password.request') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" value="{{ $email or old('email') }}" name="email" placeholder="Email" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div class="help-block with-errors"></div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" id="inputPassword" name="password"  class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback">
        <input type="password" id="inputPasswordConfirm"  name="password_confirmation"  data-match="#inputPassword" data-match-error="Whops! These don't match" class="form-control" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <div class="help-block with-errors"></div>
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
      </div>
    <hr>
    <button type="submit" href="#"  class="btn btn-success btn-block btn-flat">Reset Password</button>
    </form>
  </div>
  <!-- /.form-box -->
</div>

{{-- Not Sending Verification Email --}}


</body>




<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bootstrap.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script>
      var animate_fade = 400;

      /*$(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });*/

      function view(vars){
          $(".login-box").fadeOut(animate_fade);
          if(vars=="signup"){
              $("#register-box").delay(animate_fade).fadeIn(animate_fade);
          }
          if(vars=="login"){
              $("#login-box").delay(animate_fade).fadeIn(animate_fade);
          }
          if(vars=="forgot"){
              $("#forgot-box").delay(animate_fade).fadeIn(animate_fade);
          }
          if(vars=="resendemail"){
              $("#no-verf-box").delay(animate_fade).fadeIn(animate_fade);
          }
      }


    </script>
    <script>
        $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    </script>


</body>
</html>
