<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Bazis Scholarship Registration</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons"rel="stylesheet" type="text/css">


		<!--   Core JS Files   -->
		{{-- <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script> --}}
		<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/moment.min.js')}}"></script>
		<link rel="stylesheet" href="{{asset('css/bootstrap-material-datetimepicker.css')}}">
		<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>



		<!--  Plugin for the Wizard -->
		<script src="{{asset('assets/js/gsdk-bootstrap-wizard.js')}}"></script>

		<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
		<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

		{{-- Sweet Alert --}}
<script src="{{asset('js/sweetalert/sweetalert2.js')}}"></script>
<link href="{{asset('js/sweetalert/sweetalert2.css')}}" rel="stylesheet" />

	<!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
	<script src="{{asset('js/jquery.mask.js')}}"></script>
	<script type="text/javascript">
  $(document).ready(function() {
    $('.handphone').mask('+6200000000000000');
		$('.tahun').mask('0000');
  });

  </script>


</head>

<body>
<div class="image-container set-full-height" style="background:#42B549;background-image: url('{{asset('images/bg-repeat.png')}}'); background-size: 578px;">

    <a href="{{route('logout')}}" class="logout">logout</a>

    <span href="http://creative-tim.com">
      <div class="logo">
          <img style="max-width:100px" src="{{asset('images/logo-white.png')}}">
      </div>
         <div class="logo-container">
            <div class="brand">
                Halo
                {{Auth::user()->name}}
            </div>
        </div>
    </span>


	<!--  Made With Get Shit Done Kit  -->
		{{-- <a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
			<div class="brand">GK</div>
			<div class="made-with">Made with <strong>GSDK</strong></div>
		</a> --}}

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="green" id="wizardProfile" style="background:#efefef">
                    {{-- <form action="" method=""> --}}
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	@yield('header-title')
                    	</div>

                      <div class="row">
                        <a href="{{route('step_profile')}}">
                          <div class="col-md-3 text-center step-tab {{($routename == 'step_profile') ? 'active' : ''}}">
                            Data Pribadi
                          </div>
                        </a>
                        {{-- <a href="#">
                          <div class="col-md-2 text-center step-tab">
                            Pendidikan
                          </div>
                        </a> --}}

                        <a href="{{route('step_achievement')}}">
                          <div class="col-md-3 text-center step-tab {{($routename == 'step_achievement') ? 'active' : ''}}" >
                            Prestasi
                          </div>
                        </a>
                        <a href="{{route('step_motivation')}}">
                          <div class="col-md-3 text-center step-tab {{($routename == 'step_motivation') ? 'active' : ''}}">
                            Motivasi
                          </div>
                        </a>
                        <a href="{{route('step_document')}}">
                          <div class="col-md-3 text-center step-tab {{($routename == 'step_document') ? 'active' : ''}}">
                            Berkas
                          </div>
                        </a>
                        {{-- <a href="{{route('step_preview')}}">
                          <div class="col-md-2 text-center step-tab {{($routename == 'step_preview') ? 'active' : ''}}">
                            Review
                          </div>
                        </a>
												<a href="{{route('step_final_submit')}}">
                          <div class="col-md-2 text-center step-tab {{($routename == 'step_final_submit') ? 'active' : ''}}">
                            Submit
                          </div>
                        </a> --}}
                        {{-- <ul class="nav nav-pills">
                            <li><a href="#about" class="active">Data Pribadi</a></li>
                            <li><a href="#account" >Pendidikan</a></li>
                            <li><a href="#address" >Prestasi</a></li>
                            <li><a href="#address" >Motivasi</a></li>
                            <li><a href="#address" >Berkas</a></li>
                            <li><a href="#address" >Review</a></li>
                        </ul> --}}
                      </div>

											@yield('content')


                    {{-- </form> --}}
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             {{-- Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a> --}}
        </div>
    </div>

</div>


</body>



</html>
