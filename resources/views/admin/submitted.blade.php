@extends('layouts.adminpage')

@section('title')
Members Submitted <br> (Yang Sudah Submit)
@endsection

@section('css-section')

  <link rel="stylesheet" href="{{asset('datatables/css/jquery.dataTables.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <script src="{{asset('admin-ui/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>

@endsection

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Peserta Submit</div>
                        <div class="stat-digit">{{$user_submitted}}</div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Potensi Submit (>50%)</div>
                        <div class="stat-digit">{{$potensi}}</div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-default border-default"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Laki-Laki</div>
                        <div class="stat-digit">{{$laki}}</div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Perempuan</div>
                        <div class="stat-digit">{{$perempuan}}</div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  {{-- <h4 class="mb-3"> </h4> --}}
                  <canvas id="pieChart"></canvas>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
//pie chart
  var ctx = document.getElementById( "pieChart" );
  ctx.height = 210;
  var myChart = new Chart( ctx, {
      type: 'pie',
      data: {
          datasets: [ {
              data: [ {{$pres_laki}}, {{$pres_perem}}],
              backgroundColor: [
                                  "#717171",
                                  "#fe3f9d",

                                  "rgba(0,0,0,0.07)"
                              ],
              hoverBackgroundColor: [
                                  "#717171",
                                  "#fe3f9d",

                                  "rgba(0,0,0,0.07)"
                              ]

                          } ],
          labels: [
                          "Laki-Laki (%)",
                          "Perempuan (%)",

                      ]
      },
      options: {
          responsive: true
      }
  } );
</script>


  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Univeristy </h4>
                <canvas id="user-university"></canvas>
            </div>
        </div>
    </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
        $.ajax({
          url: '/admin/statistic/university/submitted',
          type: 'GET',
          dataType: 'json',
          // data: {tahun: 2017}
        })
        .done(function(datane) {
          // console.log(datane)
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

@foreach ($university_labels as $univ)

  @php
    $laki_count= $univ->users()->where([['gender', 'L'],['final_submit' , 0]])->count();
    $perempuan_count= $univ->users()->where([['gender', 'P'],['final_submit', 0]])->count();

    // Potensi Submitted

    $users_count = $univ->users()->where('final_submit', 0)->get();


    $potensinya = 0;

    foreach ($users_count as $key => $usernya) {

      $validation = app('App\Http\Controllers\admin\ValidationController')->count_null($usernya->email);


      if ($validation['fill_percent'] > 50) {
           $potensinya++;
         }
      }

  @endphp

  <div class="row">
    <div class="col-md-12">
      <h4>{{$univ->institution_name}}</h4>
      <h6 style="color:grey">{{$univ->users()->where('final_submit', 1)->count()}}/{{$univ->users->count()}} ({{round(($univ->users()->where('final_submit', 1)->count())/$univ->users->count() * 100)}} %) </h6>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="ti-user text-default border-default"></i></div>
                  <div class="stat-content dib">
                      <div class="stat-text">Laki-Laki</div>
                      <div class="stat-digit">{{$laki_count}}</div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                  <div class="stat-content dib">
                      <div class="stat-text">Perempuan</div>
                      <div class="stat-digit">{{$perempuan_count}}</div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-one">
                  <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                  <div class="stat-content dib">
                      <div class="stat-text">Potensi Submit (>50%)</div>
                      <div class="stat-digit">{{$potensinya}} Peserta</div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endforeach



  <div class="row">
    <div class="col-md-12">
      <div class="card">
        {{-- <div class="card-header">Member</div> --}}
        <div class="card-body card-block">
            <table class="datatable mdl-data-table dataTable compact hover" cellspacing="0"
            width="100%" role="grid" style="width: 100%;">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Univ.</th>
                <th>Phone</th>
                <th>Kelengkapan Data</th>
                <th>Gender</th>
                <th>Jumlah Total Gaji</th>
                {{-- <th>Country</th>
                <th>Salary</th> --}}
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @section('script')
    {{-- <script src="{{asset('admin-ui/assets/js/vendor/jquery-2.1.4.min.js')}}"></script> --}}
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


  <script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy',
                // 'csv',
                'excel',
                // 'pdf',
                // 'print'
              ],
            processing: true,
            serverSide: false,
            ajax: '{{route('member.submitted.data')}}',
            columnDefs: [{
                targets: [4],
                mRender : function(data, type, full) {

                  if (full.progress == 100) {
                    var classnya = 'progress-bar-success';
                  }else if (full.progress >80) {
                    var classnya = 'progress-bar-info';
                  }else if (full.progress >40) {
                    var classnya = 'progress-bar-warning';
                  }else {
                    var classnya = 'progress-bar-danger';
                  }


                  return '<div class="progress">'
                  +'<div class="progress-bar '+classnya+' progress-bar-striped active" role="progressbar" aria-valuenow="'+full.progress+'" aria-valuemin="0" aria-valuemax="100" style="width:'+full.progress+'%">'
                  +full.progress+'%'
                  +'</div>'
                  +'</div>'
                }

            }],
            columns: [

            { data: 'name'},
            { data: 'email'},
            { data: 'univ'},
            { data: 'phone'},
            { data: "progress"},
            { data: 'gender'},
            { data: 'sum_sallary'},

          ]

        });
    });
  </script>

  @endsection

@endsection
