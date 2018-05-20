@extends('layouts.adminpage')

@section('title')
Members Registered
@endsection

@section('yieldsection')

@endsection

@section('content')

  <div class="row">


  </div>
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
    <link rel="stylesheet" href="{{asset('datatables/css/jquery.dataTables.css')}}">
  <script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{{route('member.registered.data')}}',
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

                  console.log(classnya)

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

          ]

        });
    });
  </script>

  @endsection

@endsection
