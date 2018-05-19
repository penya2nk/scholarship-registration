@extends('layouts.adminpage')

@section('title')
Admin Members
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Add Admin</div>
        <div class="card-body card-block">
            <div class="form-group">
              <div class="input-group">
                <input type="email" id="email-admin" name="email3" placeholder="email" class="form-control">
              </div>
            </div>

            <div class="form-actions form-group">
              <button type="button" id="add-admin" class="btn btn-success btn-sm">Add</button>
             </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Remove Admin</div>
        <div class="card-body card-block">
            <div class="form-group">
              <div class="input-group">
                <input type="email" id="email-admin-remove" name="email3" placeholder="email" class="form-control">
              </div>
            </div>

            <div class="form-actions form-group">
              <button type="button" id="remove-admin" class="btn btn-danger btn-sm">Remove</button>
             </div>
        </div>
      </div>
    </div>




  </div>
  <div class="row">



  </div>

  @section('script')
    {{-- <script src="{{asset('admin-ui/assets/js/vendor/jquery-2.1.4.min.js')}}"></script> --}}
    <script type="text/javascript">
      jQuery('#add-admin').on('click', function() {
        var email = jQuery('#email-admin').val();

        if (email !== "") {
          jQuery.ajax({
            url: '{{route('add.remove.admin')}}',
            type: 'POST',
            dataType: 'json',
            data: { "_token": "{{ csrf_token() }}",
                   "email": email,
                   "status": 1
                        },
          })
          .done(function(data) {
            if (data.status == 'success') {

              if (data.mode == 'add') {
                swal({
                    title:'Berhasil Menambahkan '+data.name+' Sebagai Admin!',
                    type:'success'
                  },
                );
              }else if (data.mode == 'remove') {
                swal({
                    title:'Berhasil Menghapus '+data.name+' Sebagai Admin!',
                    type:'success'
                  },
                );
              }
            }else {
              swal({
                  title:'Gagal Menambahkan Admin!',
                  text:'Pastikan email sudah terdaftar sebagai member',
                  type:'error'
                },
              );
            }
          });
        }else {
          alert('Silahkan isi kolom email');
        }
      });
    </script>

    <script type="text/javascript">
      $('#remove-admin').on('click', function() {
        var email = jQuery('#email-admin-remove').val();

        if (email !== "") {
          jQuery.ajax({
            url: '{{route('add.remove.admin')}}',
            type: 'POST',
            dataType: 'json',
            data: { "_token": "{{ csrf_token() }}",
                   "email": email,
                   "status": 0
                        },
          })
          .done(function(data) {
            if (data.status == 'success') {

              if (data.mode == 'add') {
                swal({
                    title:'Berhasil Menambahkan '+data.name+' Sebagai Admin!',
                    type:'success'
                  },
                );
              }else if (data.mode == 'remove') {
                swal({
                    title:'Berhasil Menghapus '+data.name+' Sebagai Admin!',
                    type:'success'
                  },
                );
              }
            }else {
              swal({
                  title:'Gagal Menambahkan Admin!',
                  text:'Pastikan email sudah terdaftar sebagai member',
                  type:'error'
                },
              );
            }
          });
        }else {
          alert('Silahkan isi kolom email');
        }
      });
    </script>






  @endsection

@endsection
