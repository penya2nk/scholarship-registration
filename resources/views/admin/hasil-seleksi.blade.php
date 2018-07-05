@extends('layouts.adminpage')

@section('title')
Hasil Penilaian
@endsection

@section('css-section')

  <link rel="stylesheet" href="{{asset('datatables/css/jquery.dataTables.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables-colvis/1.1.2/css/dataTables.colVis.css">

@endsection

@section('content')

  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body card-block">
            <table class="table">
              <tbody>
                <tr>
                  <td style="background:#bdbdbd">Tampilkan nilai pada tombol Show / Hide Column</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  {{-- <div class="row">
    <div class="col-md-3">
      <div class="card">
          <a class="toggle-vis btn btn-sm btn-warning" data-column="0">Nama</a>
          <a class="toggle-vis btn btn-sm btn-warning" data-column="1">Email</a>
          <a class="toggle-vis btn btn-sm btn-warning" data-column="2">Universitas</a>

      </div>
    </div>
    <div class="col-md-3">
      <div class="card">

          <a class="toggle-vis btn btn-sm btn-warning" data-column="3">Semester</a>
          <a class="toggle-vis btn btn-sm btn-warning" data-column="5">Kelengkapan Data</a>
          <a class="toggle-vis btn btn-sm btn-warning" data-column="6">Status</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">

          <a class="toggle-vis btn btn-sm btn-warning" data-column="7">Gender</a>
          <a class="toggle-vis btn btn-sm btn-warning" data-column="8">Register Date</a>

      </div>
    </div>
  </div> --}}

  <div class="row">
    <div class="col-md-12">


      <div class="card">

        {{-- <div class="card-header">Member</div> --}}
        <div class="card-body card-block">
            <table class="datatable mdl-data-table dataTable compact hover table-striped" cellspacing="0"
            width="100%" role="grid" style="width: 100%;">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Univ</th>
                <th rowspan="2">Email</th>
                <th rowspan="2">Phone</th>
                @if (App\models\stage::all()->count() !== 0)
                  @foreach (App\models\stage::all() as $stage)

                    <th colspan="{{$stage->parameters()->count()}}" style="background:orange; color:black">
                      {{$stage->stage_name}}
                      <br>
                      ({{$stage->percentage}} %)

                    </th>
                  @endforeach
                @endif


                @if (App\models\stage::all()->count() !== 0)
                  @foreach (App\models\stage::all() as $stage)
                    {{-- Menghitung Skor Maksimum Pada Header--}}
                    @php
                      $skor_maks_stage = [];
                      $theparam = $stage->parameters()->get();
                      foreach ($theparam as $key => $param) {
                        $skor_maks_stage[] = $param->skala * $param->percentage/100;
                      }
                    @endphp
                    <th rowspan="2" style="background:orange; color:black;text-align:center">{{$stage->stage_name}} ({{array_sum($skor_maks_stage)}})</th>
                  @endforeach
                @endif
                {{-- <th>Country</th>
                <th>Salary</th> --}}
                  <th rowspan="2">Masuk Tahap</th>
              </tr>

              {{-- Untuk Kolom Bawah --}}
              <tr>
                @if (App\models\parameter::all()->count() !== 0)
                  @foreach (App\models\parameter::all() as $parameter)
                    <th style="font-size:9pt">
                      {{$parameter->parameter_name}}
                      <br>
                      ({{$parameter->percentage}} %)

                    </th>
                  @endforeach
                @endif
              </tr>


            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($users as $user)
                @php

                $institution = $user->institution['institution_name'];
                if ($institution !== NULL) {
                  $institution = explode('(',$institution);
                  $institution = "-".str_replace(')', '',$institution[1])."-";
                }else {
                  $institution = '';
                }

                @endphp
                <tr>
                  <td>{{$i++}}</td>
                  <td>
                    <a href="/admin/profile/view/{{$user->id}}?seleksi=true" target="_blank">
                      {{$user->name}}</td>
                    </a>
                  <td>{{$institution}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <a href="http://api.whatsapp.com/send?phone={{str_replace("+","",$user->phone)}}" target="_blank" class="btn btn-sm btn-success">
                      {{$user->phone}}
                    </a>
                  </td>

                  {{-- TAHAP PARAMETER --}}
                  @if (App\models\parameter::all()->count() !== 0)
                    @foreach (App\models\parameter::all() as $parameter)
                      @php
                        $check = $user->parameters()->where('parameter_id',$parameter->id)->first();
                        if ($check == NULL) {
                          $score = '-';
                          $stamp = '';
                        }else{
                          $score = $check->pivot->score;
                          $stamp = $check->pivot->user_submit.' - '.$check->pivot->updated_at;
                        }
                      @endphp
                      {{-- {{$check[]= $parameter->pivot->score}} --}}
                      <td>{{$score}}<br>
                        <span style="
                        background: #dcdcdc;
                        display: inline-block;
                        font-size: 5pt;
                        color: white;
                        ">{{$stamp}}</span>
                      </td>
                    @endforeach
                  @endif
                  {{-- TAHAP STAGES --}}
                  @if (App\models\stage::all()->count() !== 0)
                    @foreach (App\models\stage::all() as $stage)
                      @php
                        $par_score =[];
                      @endphp
                      {{-- Perhitungan Persentase per Parameter --}}
                      @foreach ($stage->parameters()->get() as $parameter)

                        @php
                          $check = $user->parameters()->where('parameter_id',$parameter->id)->first();
                          if ($check == NULL) {
                            $par_score[] = 0;
                          }else{
                            $par_score[] = $check->pivot->score * $parameter->percentage/100;
                          }
                        @endphp

                      @endforeach
                      @php
                          $skor_parameter = array_sum($par_score);
                      @endphp

                      <td style="background:orange;text-align:center">{{$skor_parameter}}</td>
                    @endforeach
                  @endif

                  <td>
                    @if (App\models\stage::all()->count() !== 0)
                      <input type="hidden" class="user_id" name="" value="{{$user->id}}">
                      {{-- <small style="display:inline-block;text-align:center;width:100%" class="tahap_name">{{$user->stage_id !== NULL ? $user->stage->stage_name : 'Seleksi Berkas'}}</small> --}}
                      <select class="seleksi-tahap" name="seleksi_tahap" data-search="Done">                      
                        @foreach (App\models\stage::all() as $stage)
                          <option @if($user->stage_id !== NULL) @if($user->stage_id == $stage->id) selected @endif @endif value="{{$stage->id}}">{{$stage->stage_name}}</option>
                          @endforeach
                      </select>
                    @endif
                  </td>

                </tr>
              @endforeach


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-colvis/1.1.2/js/dataTables.colVis.js"></script>

    @php
      $s = 5;
    @endphp

  <script>
    $(document).ready(function() {
        var tablenya = $('.datatable').DataTable({
          "sDom": 'BC<"clear">lfrtip',
          // dom: 'Bfrtip',
          buttons: [
              // 'copy',
              // 'csv',
              'excel',
              // 'pdf',
              // 'print'
            ],

      // membuat beberapa data tidak muncul dulu
      'columnDefs': [
        @if (App\models\parameter::all()->count() !== 0)
          @foreach (App\models\parameter::all() as $count)
            { targets: {{$s++}}, visible:false },
          @endforeach
        @endif
       // { targets: 2, visible:false },
       // { targets: 5, visible:false },
       // { targets: 8, visible:false },
       // { targets: 9, visible:false },
     ],
     "fnDrawCallback": function( oSettings ) {

     },
        });

        @if(App\models\stage::all()->count() !== 0)
        // Ajax untuk perubahan status seleksi
        $('.seleksi-tahap').on('change', function() {
          var user_id = $(this).parent().find('.user_id').val();
          var stage_id = $(this).parent().find('.seleksi-tahap').val();

          $.ajax({
            url: '{{route('stage.status.save')}}',
            type: 'POST',
            context:this,
            dataType: 'json',
            data: { "_token": "{{ csrf_token() }}",
                   "user_id": user_id,
                   "stage_id": stage_id
                        },
          })
          .done(function(data) {

            if (data.status == "success") {
              swal({
                  title:'Berhasil Mengubah Status '+data.name+' ke tahap '+data.stage+'',
                  type:'success'
                },
              );
            }
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });


        });
        @endif


    });

  </script>

  <script type="text/javascript">


    if (typeof(buildFilterRegex) !== "function") {
      function buildFilterRegex(filterValue) {

          if (filterValue.indexOf('&') === -1) {
              return '[~>]\\s*' + jQuery.fn.dataTable.util.escapeRegex(filterValue) + '\\s*[<~]';
          } else {
              var tempDiv = document.createElement('div');
              tempDiv.innerHTML = filterValue;

              return '\\s*' + jQuery.fn.dataTable.util.escapeRegex(tempDiv.innerText) + '\\s*';
          }
      }
    }

    $(".view-filter-btns a").click(function(e) {
      var filterValue = $(this).find("span").not('.badge').html().trim();
      var dataTable = $('#tableServicesList').DataTable();
      var filterValueRegex;
      if ($(this).hasClass('active')) {
                      $(this).removeClass('active');
              $(this).find("i.fa.fa-dot-circle-o").removeClass('fa-dot-circle-o').addClass('fa-circle-o');
                  dataTable.column(3).search('').draw();
      } else {
              $('.view-filter-btns .list-group-item').removeClass('active');
              $('i.fa.fa-dot-circle-o').removeClass('fa-dot-circle-o').addClass('fa-circle-o');
              $(this).addClass('active');
              $(this).find(jQuery("i.fa.fa-circle-o")).removeClass('fa-circle-o').addClass('fa-dot-circle-o');
                  filterValueRegex = buildFilterRegex(filterValue);
          dataTable.column(3)
              .search(filterValueRegex, true, false, false)
              .draw();
      }

      // Prevent jumping to the top of the page
      // when no matching tag is found.
      e.preventDefault();
    });
  </script>



    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>



  @endsection

@endsection
