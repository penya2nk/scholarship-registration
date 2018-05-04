<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CERDAS BAZIS DKI Jakarta</title>
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
  <style media="screen">
    .buttongssi {
      height: 46px;
      border-radius: 2px;
      font-size: 17px;
      border: none;
      vertical-align: middle;
      padding:11px;
    }

    .form-input{
      height: 48px;
      font-size: 14pt;
      border-radius: 22px;
      -webkit-appearance: none;
    }
  </style>

  {{-- <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script> --}}
  {{-- <script src="{{asset('js/bootstrap-filestyle.js')}}"></script> --}}
  {{-- <script src="{{asset('js/bootstrap-filestyle.min.js')}}"></script> --}}
  <script src="{{asset('js/jquery.mask.js')}}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  {{-- <!-- Google Font --> --}}

  <script type="text/javascript">
  $(document).ready(function() {
    $('.handphone').mask('+6200000000000000')
  });

  </script>

  @php
    $list = array('backgrounlogin2','backgrounlogin3','backgrounlogin4','backgrounlogin5');
    $bglogin = array_rand($list);
    $imglogin = $list[$bglogin];
  @endphp
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page backgroundnya"
{{-- style="background-image: url({{asset('images/'.$imglogin.'.jpg')}});" --}}
style="background:#42B549"
>

@if (Session::has('registerstatus'))
  <div class="alert alert-info" style="font-size: 17pt; margin-bottom:0px;">
    <center>
      {{-- Registrasi Berhasil, silahkan cek email untuk mengaktifkan --}}
    {{session::get('registerstatus')}}
    </center>
  </div>
@endif


@if (Session::has('warningverify'))
  <div class="alert alert-danger" style="font-size: 17pt; margin-bottom:0px;">
    <center>
    {{session::get('warningverify')}}
    </center>
  </div>
@endif

@if ($errors->has('email'))
    <div class="alert alert-danger" style="font-size: 17pt; margin-bottom:0px;">
      <center>
        {{ $errors->first('email') }}
      </center>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
      <div class="welcome-area-gssi">
        <h1 class="title-welcome-gssi">Pendaftaran</h1>
        <p>Program Mahasiswa CERDAS BAZIS DKI Jakarta</p>
        <div class="button-desktop-helper" id="dekstop-button" >
          <div class="row">

            {{-- <div class="col-md-6">
              <a href="#" onclick="view('signup')" id="buat-akun-baru" class="btn btn-default btn-block btn-flat buttongssi">Registrasi</a>
            </div>
            <div class="col-md-6">
              <a href="#" onclick="view('login')" class="btn btn-info btn-block btn-flat buttongssi">Login</a>
            </div> --}}
          </div>


          {{-- <div class="row" >
            <div class="col-md-12">
              <div class="helper-image register-image" id="#register-image" style="display:none">
                <img style="margin-top:30px" class="img img-responsive" src="{{asset('images/flow-pendaftaran.jpg')}}" alt="">
              </div>
            </div>
          </div> --}}
        </div>

      </div>
    </div>
    <div class="col-md-6">


      <div class="login-box" id="login-box" @if (Session::has('errorregistration')) style="display:none" @endif >
        <div class="login-logo">
          <br>
          <img src="{{asset('images/logo-white.png')}}" style="width: 232px" alt="">
        </div>
        <div class="row" style="width:390px; margin:auto">

          <div class="col-xs-6">
            <a href="#" onclick="view('login')" class="btn btn-info btn-block btn-flat buttongssi">Login</a>
          </div>
          <div class="col-xs-6">
            <a href="#" onclick="view('signup')" id="buat-akun-baru" class="btn btn-warning btn-block btn-flat buttongssi">Registrasi</a>
          </div>
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
          <form role="form" data-toggle="validator" action="{{route('login')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
              <input type="email" class="form-control form-input" name="email" placeholder="Email" value="{{ old('email') }}" >
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <div class="help-block with-errors"></div>
              {{-- @if ($errors->has('email'))
              <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif --}}
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control form-input" placeholder="Password" >
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <div class="help-block with-errors"></div>
          {{-- @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif --}}
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-default btn-block btn-flat buttongssi">Log In / Masuk</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                {{-- <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me --}}
              </label>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12" style="text-align:center">
            <a href="#" onclick="view('forgot')">Lupa password</a><br>
          </div>
        </div>
      </form>
      <!-- /.social-auth-links -->
      <div class="text-center helper-registrasi">
        <p>atau</p>
        <hr>
        <a href="#" onclick="view('signup')" class="btn btn-default btn-block btn-flat buttongssi">Registrasi</a>
        <span>
          <i></i>
        </span>

      </div>

    </div>
    <!-- /.login-box-body -->
  </div>
    <!-- /.login-box -->

    {{-- Rigester Box --}}
    <div class="login-box" id="register-box" @if (Session::has('errorregistration')) @else style="display:none" @endif >
      <div class="register-logo" style="color:white">
        <b class="helper-registrasi">Registrasi</b><br>
          <img src="{{asset('images/logo-white.png')}}" style="width: 232px" alt="">
      </div>
      <div class="row" style="width:390px; margin:auto">

        <div class="col-xs-6">
          <a href="#" onclick="view('login')" class="btn btn-info btn-block btn-flat buttongssi">Login</a>
        </div>
        <div class="col-xs-6">
          <a href="#" onclick="view('signup')" id="buat-akun-baru" class="btn btn-warning btn-block btn-flat buttongssi">Registrasi</a>
        </div>
      </div>

      <div class="register-box-body">
        {{-- <p class="login-box-msg">Register a new membership</p> --}}

        <form role="form" data-toggle="validator" action="{{ route('register') }}" method="post">
          {{ csrf_field() }}
          {{-- <div class="form-group form-input has-feedback">
            <select class="form-control form-input" name="title" required>
              <option value="">Jenis Kelamin</option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>

            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div> --}}
          <div class="form-group has-feedback">
            <input type="text" class="form-control form-input" name="name" placeholder="Nama Lengkap" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group has-feedback
          {{-- {{ $errors->has('email') ? ' has-error' : '' }} --}}
          ">
            <input type="email" class="form-control form-input" name="email" id="email" placeholder="Alamat E-mail" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div class="help-block with-errors" id="emailerror"></div>
            {{-- @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif --}}
          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $('#email').on('change', function() {
                var email = $(this).val();
                $.ajax({
                  url: '/check-email-address',
                  type: 'GET',
                  context: this,
                  dataType: 'json',
                  data: {email: email}
                })
                .done(function(date) {
                  if (date == true) {
                    $('#emailerror').text('Sorry this email is already registered').css('color', '#b8364b');;
                  }else {
                    $('#emailerror').text('');
                  }
                })
                .fail(function() {
                  console.log("error");
                })
                .always(function() {
                  console.log("complete");
                });

              });
            });
          </script>


          <div class="form-group has-feedback">
            <input type="text" class="form-control handphone form-input" name="handphone" placeholder="Phone Number" value="+62" required>
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" id="inputPassword" name="password"  class="form-control form-input" placeholder="Password Baru" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group has-feedback">
            <input type="password" id="inputPasswordConfirm"  name="password_confirmation"  data-match="#inputPassword" data-match-error="Whops! These don't match" class="form-control form-input" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" required> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-default btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>

        </form>

        {{-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
            Google+</a>
        </div> --}}
        <hr>
        <div class="row">
          {{-- <a href="#" onclick="view('resendemail')" class="btn btn-danger btn-block btn-flat">Saya tidak menerima email aktivasi</a> --}}
        </div>
        <div class="helper-registrasi">
          <a href="#" onclick="view('login')" class="btn btn-default btn-block btn-flat">Saya sudah pernah daftar sebelumnya</a>
          <a href="#" onclick="view('resendemail')" class="btn btn-danger btn-block btn-flat">Saya tidak menerima email aktivasi</a>
        </div>

      </div>
      <!-- /.form-box -->
    </div>

    {{-- Not Sending Verification Email --}}
    <div class="login-box" id="no-verf-box" @if (Session::has('errorregistration')) @else style="display:none" @endif>
      <div class="register-logo" style="color:white">
        <b>Resend Verification</b><br>
          <img src="{{asset('images/logo-white.png')}}" style="width: 232px" alt="">
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Resend Email Verification</p>

        <form role="form" data-toggle="validator" action="{{ route('resendverificationemail') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div class="help-block with-errors"></div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-default btn-block btn-flat">Send</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <hr>
        <a href="#" onclick="view('login')" class="btn btn-default btn-block btn-flat">Back</a>
      </div>
      <!-- /.form-box -->
    </div>

    <div class="login-box" id="forgot-box" @if (Session::has('errorregistration')) @else style="display:none" @endif>
      <div class="register-logo" style="color:white">
        <b>Reset</b><br>
          <img src="{{asset('images/logo-white.png')}}" style="width: 232px" alt="">
      </div>
      <div class="register-box-body">
        <p class="login-box-msg">Reset Password</p>
        <form role="form" data-toggle="validator" action="{{ route('password.email') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div class="help-block with-errors"></div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-default btn-block btn-flat">Send Password Reset Link</button>
            </div>
          </div>
        </form>
        <hr>
        <a href="#" onclick="view('login')" class="btn btn-default btn-block btn-flat">Back</a>
      </div>
    </div>
    {{-- End Col sm 6 --}}
    </div>
</div>




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
      var animate_fade = 200;

      /*$(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });*/

      function view(vars){
          $(".login-box").fadeOut(animate_fade);
          $(".helper-image").fadeOut(animate_fade);

          if(vars=="signup"){
              $("#register-box").delay(animate_fade).fadeIn(animate_fade);
              $(".register-image").delay(animate_fade).fadeIn(animate_fade);

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
