<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Basiz Scholarship Registration</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
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
                Bagus Dwi Utama
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

                <div class="card wizard-card" data-color="green" id="wizardProfile">
                    <form action="" method="">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	{{-- <h3>
                        	   <b>BUILD</b> YOUR PROFILE <br>
                        	   <small>This information will let us know more about you.</small>
                        	</h3> --}}
                    	</div>

                      <div class="row">
                        <a href="#">
                          <div class="col-md-2 text-center step-tab {{($routename == 'step_profile') ? 'active' : ''}}">
                            Data Pribadi
                          </div>
                        </a>
                        <a href="#">
                          <div class="col-md-2 text-center step-tab">
                            Riwayat Pendidikan
                          </div>
                        </a>
                        <a href="#">
                          <div class="col-md-2 text-center step-tab">
                            Prestasi
                          </div>
                        </a>
                        <a href="#">
                          <div class="col-md-2 text-center step-tab">
                            Motivasi
                          </div>
                        </a>
                        <a href="#">
                          <div class="col-md-2 text-center step-tab">
                            Berkas
                          </div>
                        </a>
                        <a href="#">
                          <div class="col-md-2 text-center step-tab">
                            Review
                          </div>
                        </a>
                        {{-- <ul class="nav nav-pills">
                            <li><a href="#about" class="active">Data Pribadi</a></li>
                            <li><a href="#account" >Pendidikan</a></li>
                            <li><a href="#address" >Prestasi</a></li>
                            <li><a href="#address" >Motivasi</a></li>
                            <li><a href="#address" >Berkas</a></li>
                            <li><a href="#address" >Review</a></li>
                        </ul> --}}
                      </div>


                        <div class="tab-content">
                          @yield('content')
                          {{-- @extends('layouts.materialayout') --}}

                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
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

	<!--   Core JS Files   -->
	<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{asset('assets/js/gsdk-bootstrap-wizard.js')}}"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

</html>
