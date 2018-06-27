@extends('layouts.adminpage')

@section('title')
Parameters Selection
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">Add Parameters</div>
        <div class="card-body card-block">

          <form class="" action="{{route('parameter.post')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="input-group">
                <input type="parameter" id="email-admin" name="parameter" placeholder="ex: Organisasi" class="form-control">
              </div>
            </div>

            <div class="form-actions form-group">
              <button type="submit" id="add-admin" class="btn btn-success btn-sm">Add</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Parameter
        </div>
        <div class="card-body card-block">
          <table class="table table-hover">
            <thead>
              <th>No</th>
              <th>Parameter</th>
              <th>Action</th>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($parameters as $parameter)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$parameter->parameter_name}}</td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="#edit-{{$parameter->id}}" class="btn btn-warning">
                      Edit
                    </button>
                    <form class="" style="display:inline" action="{{route('parameter.delete')}}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="parameter_id_delete" value="{{$parameter->id}}">
                      <button type="button" id="delete-button" class="btn btn-danger">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach

              <script type="text/javascript">
                $('#delete-button').on('click', function() {
                  event.preventDefault();
                  /* Act on the event */

                  swal({
                    title: "Apakah Anda yakin?",
                    text: "Penghapusan parameter berakibat terhapusnya data penilaian ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f44336",
                    confirmButtonText: "Ya, Saya Yakin !",
                    cancelButtonText: "Cancel",

                  }).then((result) => {
                if (result.value) {
                  $(this).parent().submit();



                }
              });


                });
              </script>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">



  </div>



  @section('script')

    @foreach ($parameters as $parameter)
      <div class="modal fade" id="edit-{{$parameter->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form class="" action="{{route('parameter.edit')}}" method="post">
              {{ csrf_field() }}
            <div class="modal-header">
              <h4 class="modal-title" id="">Edit Parameter</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="parameter_edit_id"  id="" value="{{$parameter->id}}" placeholder="">
                      <input type="text" class="form-control" name="parameter_name" id="" value="{{$parameter->parameter_name}}" placeholder="">
                    </div>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>

          </form>
          </div>
        </div>
      </div>
    @endforeach
    {{-- <script src="{{asset('admin-ui/assets/js/vendor/jquery-2.1.4.min.js')}}"></script> --}}

    @if (session()->has('alert'))
      <script type="text/javascript">
        swal({
            title:'Berhasil {{session()->get('alert')}} Parameter!',
            type:'success'
          },
        );
      </script>
    @endif

    @if (session()->has('alert_delete'))
      <script type="text/javascript">
        swal({
            title:'Berhasil Menghapus Parameter!',
            type:'success'
          },
        );
      </script>
    @endif

  @endsection

@endsection
