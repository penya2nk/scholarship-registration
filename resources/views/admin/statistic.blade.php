@extends('layouts.adminpage')

@section('title')
Statistik
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                  <div class="stat-content dib">
                      <div class="stat-text">Peserta Terdaftar (Registered)</div>
                      <div class="stat-digit">{{$user_registered}}</div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                  <div class="stat-content dib">
                      <div class="stat-text">Peserta Submit (Final Submit)</div>
                      <div class="stat-digit">{{$user_submitted}}</div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row">

          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">User Register </h4>
                      <canvas id="user-register"></canvas>
                  </div>
              </div>
          </div><!-- /# column -->

          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Univeristy </h4>
                      <canvas id="user-university"></canvas>
                  </div>
              </div>
          </div><!-- /# column -->

          {{-- <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Team Commits </h4>
                      <canvas id="team-chart"></canvas>
                  </div>
              </div>
          </div><!-- /# column -->

          <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Rader chart </h4>
                      <canvas id="radarChart"></canvas>
                  </div>
              </div>
          </div><!-- /# column --> --}}

          {{-- <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Line Chart </h4>
                      <canvas id="lineChart"></canvas>
                  </div>
              </div>

              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mb-3">Doughut Chart </h4>
                          <canvas id="doughutChart"></canvas>
                      </div>
                  </div>
              </div><!-- /# column -->

          </div><!-- /# column --> --}}

          {{-- <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Pie Chart </h4>
                      <canvas id="pieChart"></canvas>
                  </div>
              </div>
          </div><!-- /# column --> --}}


          {{-- <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Polar Chart </h4>
                      <canvas id="polarChart"></canvas>
                  </div>
              </div>
          </div><!-- /# column -->

          <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h4 class="mb-3">Single Bar Chart </h4>
                      <canvas id="singelBarChart"></canvas>
                  </div>
              </div>
          </div><!-- /# column --> --}}
  </div>

  @section('script')
    <script src="{{asset('admin-ui/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('admin-ui/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    {{-- <script src="{{asset('admin-ui/assets/js/lib/chart-js/chartjs-init.js')}}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
          $.ajax({
            url: '/admin/statistic/registered',
            type: 'GET',
            dataType: 'json',
            // data: {tahun: 2017}
          })
          .done(function(datane) {
            console.log(datane)
            // $('#loading-bar').modal('hide');
            var ctx = $("#user-register");
            var periodArray = new Array();

            @foreach ($labels as $key => $label)
              periodArray.push("{{$label}}")
            @endforeach

            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels:periodArray ,
                  datasets: datane
              },
              options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,

                        }
                    }]
                },

                // Container for pan options
                pan: {
                    // Boolean to enable panning
                    enabled: false,
                    // Panning directions. Remove the appropriate direction to disable
                    // Eg. 'y' would only allow panning in the y direction
                    mode: 'y'
                },
                // Container for zoom options
                zoom: {
                    // Boolean to enable zooming
                    enabled: false,
                    // Zooming directions. Remove the appropriate direction to disable
                    // Eg. 'y' would only allow zooming in the y direction
                    mode: 'y',
                }
              }
            });
          });
        });
  </script>

  <script type="text/javascript">
      $(document).ready(function() {
        $.ajax({
          url: '/admin/statistic/university',
          type: 'GET',
          dataType: 'json',
          // data: {tahun: 2017}
        })
        .done(function(datane) {
          console.log(datane)
          // $('#loading-bar').modal('hide');
          var ctx = $("#user-university");

          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Univeristy"] ,
                datasets: datane
            },
            options: {
              legend:{
                position:'right'
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,

                      }
                  }]
              },

              // Container for pan options
              pan: {
                  // Boolean to enable panning
                  enabled: false,
                  // Panning directions. Remove the appropriate direction to disable
                  // Eg. 'y' would only allow panning in the y direction
                  mode: 'y'
              },
              // Container for zoom options
              zoom: {
                  // Boolean to enable zooming
                  enabled: false,
                  // Zooming directions. Remove the appropriate direction to disable
                  // Eg. 'y' would only allow zooming in the y direction
                  mode: 'y',
              }
            }
          });
        });
      });
</script>



  @endsection

@endsection
