@extends('wizard.formwizardlayout')

@section('header-title')
  <h3>
     <b>DATA</b> BERKAS <br><br>
     {{-- <small>This information will let us know more about you.</small> --}}
  </h3>
@endsection


@section('content')
  {{-- Cropper = Croppie Plugin --}}
  <link  href="{{asset('cropper_new/croppie.css')}}" rel="stylesheet">
  <script src="{{asset('cropper_new/croppie.js')}}"></script>
  <script src="{{asset('js/jquery.add-input-area.js')}}"></script>

  <script type="text/javascript">
  $(function() {
    $('#pengalaman-organisasi').addInputArea({
        area_var: '.organization_area',
        btn_add: '.organization_add',
        btn_del: '.organization_del',
        maximum : 10,
        after_add: function() {
          // $('.chosen-select').chosen({})
          // $('.tagtrainercategory').materialtags('items');
          $('.hingga').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
          $('.dari').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
          {
          $('.hingga').bootstrapMaterialDatePicker('setMinDate', date);
          });
        }
      });
    });

    $(function() {
      $('#pengalaman-kepanitiaan').addInputArea({
          area_var: '.committee_area',
          btn_add: '.committee_add',
          btn_del: '.committee_del',
          maximum : 10,
          after_add: function() {
            // $('.chosen-select').chosen({})
            // $('.tagtrainercategory').materialtags('items');
            $('.hingga').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
            $('.dari').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
            {
            $('.hingga').bootstrapMaterialDatePicker('setMinDate', date);
            });
          }
        });
      });

      $(function() {
        $('#pengalaman-kompetisi').addInputArea({
            area_var: '.competition_area',
            btn_add: '.competition_add',
            btn_del: '.competition_del',
            maximum : 10,
            after_add: function() {
              // $('.chosen-select').chosen({})
              // $('.tagtrainercategory').materialtags('items');
              $('.hingga').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
              $('.dari').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
              {
              $('.hingga').bootstrapMaterialDatePicker('setMinDate', date);
              });
            }
          });
        });

        $(function() {
          $('#pengalaman-kerelawanan').addInputArea({
              area_var: '.charity_area',
              btn_add: '.charity_add',
              btn_del: '.charity_del',
              maximum : 10,
              after_add: function() {
                // $('.chosen-select').chosen({})
                // $('.tagtrainercategory').materialtags('items');
                $('.hingga').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
                $('.dari').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
                {
                $('.hingga').bootstrapMaterialDatePicker('setMinDate', date);
                });
              }
            });
          });

          $(function() {
            $('#pengalaman-publikasi').addInputArea({
                area_var: '.publication_area',
                btn_add: '.publication_add',
                btn_del: '.publication_del',
                maximum : 10,
                after_add: function() {
                  // $('.chosen-select').chosen({})
                  // $('.tagtrainercategory').materialtags('items');
                  $('.hingga').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
                  $('.dari').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
                  {
                  $('.hingga').bootstrapMaterialDatePicker('setMinDate', date);
                  });
                }
              });
            });
  </script>

  <div class="row">
    <div class="col-sm-12">
      <form class="" id="form-data-input" action="{{route('step_motivation_save')}}" method="post">
        {{ csrf_field() }}
        <div class="tab-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">

                <label for="">Foto KTP</label>
                <img @if ($user->photo_ktp == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_ktp}}"  @endif id="profileimage-ktp" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-ktp" @if ($user->photo_ktp == NULL) value="" @else value="{{$user->photo_ktp}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-ktp">Upload Image</a>
              </div>

              <div class="col-sm-6">
                <label for="">Foto Kartu Keluarga (KK)</label>
                <img @if ($user->photo_kk == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_kk}}"  @endif id="profileimage-kk" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-kk" @if ($user->photo_kk == NULL) value="" @else value="{{$user->photo_kk}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-kk">Upload Image</a>
              </div>

            </div>


          </div>
        </div>
        <div class="wizard-footer height-wizard">
          <div class="pull-right">
            <input type='submit' class='btn btn-next btn-fill btn-default btn-wd btn-sm' id="save-draft" name='save' value='Save Draft' />
            <input type='submit' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='save' value='Next' />

          </div>

          <div class="pull-left">
            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
          </div>
          <div class="clearfix"></div>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="uploadfoto-ktp" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto KTP</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-ktp"></div>
            <input type="file" id="upload-ktp" name="gambarktp" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-ktp">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="uploadfoto-kk" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto KTP</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-kk"></div>
            <input type="file" id="upload-kk" name="gambarkk" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-kk">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>


  <script type="text/javascript">
  $(document).ready(function() {
    $('.hingga').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $('.dari').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
    {
    $('.hingga').bootstrapMaterialDatePicker('setMinDate', date);
    });
  });
</script>

@if (session()->has('saved'))
  <script type="text/javascript">
    swal({
        title:'Draft Berhasil Disimpan!',
        type:'success'
      },
    );
  </script>
@endif

  {{-- <script type="text/javascript">
  $('#save-draft').on('click',function() {

    var value = $('#form-data-input').serializeArray();

    $.ajax({
      url: '{{route('step_achievement_draft')}}',
      type: 'POST',
      dataType: 'json',
      data: {data: value,
        "_token": "{{ csrf_token() }}"
      }
    })
    .done(function(data) {
        swal({
            title:'Draft Berhasil Disimpan!',
            type:'success'
          },
        );
    })
    .fail(function() {
      swal({
          title:'Error!',
          type:'error'
        },
      );
    })

  });
  </script> --}}

  <script type="text/javascript">
    $(document).ready(function() {

    });
  </script>

  {{-- Croppie ktp --}}
    <script type="text/javascript">
      $(document).ready(function() {
        var basic = $('#main-cropper-ktp').croppie({
          viewport: { width: 350, height: 210 },
          boundary: { width: 400, height: 241 },
          showZoomer: true,
        });
        // $('#upload').on('change',function() {
        // });

          function readFile(input) {


            if (input.files && input.files[0] && input.files[0].size < 2000000) {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#main-cropper-ktp').croppie('bind', {
                  url: e.target.result
                });
                $('.actionDone').toggle();
                $('.actionUpload').toggle();
              }

              reader.readAsDataURL(input.files[0]);
            }else {
              alert('gambar harus berformat jpg berukuran < 2 MB');
            }
          }

            $('#upload-ktp').on('change', function () { readFile(this); });
            $('.upload-result-ktp').on('click', function (ev) {
              $('.loading-upload').show();

              $('#main-cropper-ktp').croppie('result', {
                type: 'base64',
                size: 'original'
              }).then(function (resp) {
                // console.log(resp);
                // Resp = Result in 64encode

                var imageData = resp;
                // Uploading via Ajax

                $.ajax({
                  url: '/upload-crop-photo-ktp',
                  type: 'POST',
                  dataType: 'json',
                  data: {"_token": "{{ csrf_token() }}",
                          "imageData": imageData,

                        },
                })
                .done(function(data) {
                  $("#uploadfoto-ktp").modal("hide");
                  $("#profileimage-ktp").attr('src',data.url);
                  $('#img-profile-ktp').val(data.url);
                  $('.loading-upload').hide();

                  swal({
                      title:'Gambar Berhasil Diupload!',
                      type:'success'
                    });

                })
                .fail(function() {
                  console.log("error");
                })
                .always(function() {
                  console.log("complete");
                });
              });
            });


      });
    </script>

    {{-- Croppie kk --}}
      <script type="text/javascript">
        $(document).ready(function() {
          var basic = $('#main-cropper-kk').croppie({
            viewport: { width: 350, height: 210 },
            boundary: { width: 400, height: 241 },
            showZoomer: true,
          });
          // $('#upload').on('change',function() {
          // });

            function readFile(input) {


              if (input.files && input.files[0] && input.files[0].size < 2000000) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  $('#main-cropper-kk').croppie('bind', {
                    url: e.target.result
                  });
                  $('.actionDone').toggle();
                  $('.actionUpload').toggle();
                }

                reader.readAsDataURL(input.files[0]);
              }else {
                alert('gambar harus berformat jpg berukuran < 2 MB');
              }
            }

              $('#upload-kk').on('change', function () { readFile(this); });
              $('.upload-result-kk').on('click', function (ev) {
                $('.loading-upload').show();

                $('#main-cropper-kk').croppie('result', {
                  type: 'base64',
                  size: 'original'
                }).then(function (resp) {
                  // console.log(resp);
                  // Resp = Result in 64encode

                  var imageData = resp;
                  // Uploading via Ajax

                  $.ajax({
                    url: '/upload-crop-photo-kk',
                    type: 'POST',
                    dataType: 'json',
                    data: {"_token": "{{ csrf_token() }}",
                            "imageData": imageData,

                          },
                  })
                  .done(function(data) {
                    $("#uploadfoto-kk").modal("hide");
                    $("#profileimage-kk").attr('src',data.url);
                    $('#img-profile-kk').val(data.url);
                    $('.loading-upload').hide();

                    swal({
                        title:'Gambar Berhasil Diupload!',
                        type:'success'
                      });

                  })
                  .fail(function() {
                    console.log("error");
                  })
                  .always(function() {
                    console.log("complete");
                  });
                });
              });


        });
      </script>



@endsection
