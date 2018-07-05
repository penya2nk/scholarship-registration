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
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                @if (App\models\parameter::all()->count() !== 0)
                  @foreach (App\models\parameter::all() as $parameter)
                    <th>{{$parameter->parameter_name}}</th>
                  @endforeach
                @endif
                {{-- <th>Country</th>
                <th>Salary</th> --}}
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($users as $user)
                @php

                  $parameter = App\models\parameter::all();

                @endphp
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
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
      $s = 3;
    @endphp

  <script>
    $(document).ready(function() {
        var tablenya = $('.datatable').DataTable({
          "sDom": 'C<"clear">lfrtip',

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

    });

  </script>

    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>



  @endsection

@endsection
