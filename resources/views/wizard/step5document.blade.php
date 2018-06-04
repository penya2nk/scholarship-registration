@extends('wizard.formwizardlayout')

@section('header-title')
  <h3>
     <b>DATA</b> BERKAS <br><br>
     {{-- <small>This information will let us know more about you.</small> --}}
  </h3>
@endsection


@section('content')
  @php
    // dd($errors);
  @endphp
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
              <div class="col-sm-4">

                <label for="">Foto KTP</label>
                <img @if ($user->photo_ktp == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_ktp}}"  @endif id="profileimage-ktp" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-ktp" @if ($user->photo_ktp == NULL) value="" @else value="{{$user->photo_ktp}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-ktp">Upload Image</a>
              </div>

              <div class="col-sm-4 margin-top-mobile">
                <label for="">Foto Kartu Keluarga (KK)</label>
                <img @if ($user->photo_kk == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_kk}}"  @endif id="profileimage-kk" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-kk" @if ($user->photo_kk == NULL) value="" @else value="{{$user->photo_kk}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-kk">Upload Image</a>
              </div>

              <div class="col-sm-4 margin-top-mobile">

                <label for="">Foto Kartu Tanda Mahasiswa/Pelajar (KTM/KTP)</label>
                <img @if ($user->photo_ktm == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_ktm}}"  @endif id="profileimage-ktm" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-ktm" @if ($user->photo_ktm == NULL) value="" @else value="{{$user->photo_ktm}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-ktm">Upload Image</a>
              </div>

            </div>
            <div class="row">
              <hr>
            </div>

            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                  <label for="">Upload Surat Keterangan Tidak Mampu</label>
                  <div class="input-group">
                    @if ($user->photo_sktm == NULL)
                      <span class="input-group-addon btn-fill btn-danger"><i class="fa fa-window-close"></i> Belum Diunggah</span>
                        @php
                          $link_photo_sktm = "";
                        @endphp
                      @else
                        <span class="input-group-addon btn-fill btn-success"><i class="fa fa-check-square"></i> Sudah Diunggah</span>
                        @php
                         $link_photo_sktm = explode('/',$user->photo_sktm);
                         $link_photo_sktm = $link_photo_sktm[9];
                        @endphp
                    @endif

                    <input type="text" readonly value="{{$link_photo_sktm}}" class="form-control input-lg" id="" placeholder="">
                    <span class="input-group-addon"><input type="button" data-toggle="modal" data-target="#uploadfoto-sktm" class="btn btn-fill btn-sm btn-success" name="" value="Upload">     </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                  <label for="">Upload slip gaji orang tua atau surat keterangan penghasilan orang tua</label>
                  <div class="input-group">
                    @if ($user->photo_parent_sallary == NULL)
                      <span class="input-group-addon btn-fill btn-danger"><i class="fa fa-window-close"></i> Belum Diunggah</span>
                        @php
                          $link_photo_parent_sallary = "";
                        @endphp
                      @else
                        <span class="input-group-addon btn-fill btn-success"><i class="fa fa-check-square"></i> Sudah Diunggah</span>
                        @php
                         $link_photo_parent_sallary = explode('/',$user->photo_parent_sallary);
                         $link_photo_parent_sallary = $link_photo_parent_sallary[9];
                        @endphp
                    @endif
                    <input type="text" readonly value="{{$link_photo_parent_sallary}}" class="form-control input-lg" id="" placeholder="">
                    <span class="input-group-addon"><input type="button" data-toggle="modal" data-target="#uploadfoto-parent-sallary" class="btn btn-fill btn-sm btn-success" name="" value="Upload">     </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                  <label for="">Upload transkrip nilai terakhir, atau raport kelas 11-12 untuk pendaftar dari Poltek</label>
                  <div class="input-group">
                    @if ($user->photo_transcript_score == NULL)
                        @php
                          $link_photo_transcript_score = "";
                        @endphp
                      <span class="input-group-addon btn-fill btn-danger"><i class="fa fa-window-close"></i> Belum Diunggah</span>
                      @else
                        <span class="input-group-addon btn-fill btn-success"><i class="fa fa-check-square"></i> Sudah Diunggah</span>
                        @php
                         $link_photo_transcript_score = explode('/',$user->photo_transcript_score);
                         $link_photo_transcript_score = $link_photo_transcript_score[9];
                        @endphp
                    @endif
                    <input type="text" readonly value="{{$link_photo_transcript_score}}" class="form-control input-lg" id="" placeholder="">
                    <span class="input-group-addon"><input type="button" data-toggle="modal" data-target="#uploadfoto-transcript-score" class="btn btn-fill btn-sm btn-success" name="" value="Upload">     </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                  <label for="">Upload surat keterangan mahasiswa aktif dari fakultas atau departemen atau surat pengantar dari sekolah</label>
                  <div class="input-group">
                    @if ($user->photo_active_student == NULL)
                      <span class="input-group-addon btn-fill btn-danger"><i class="fa fa-window-close"></i> Belum Diunggah</span>
                        @php
                          $link_photo_active_student = "";
                        @endphp
                      @else
                        <span class="input-group-addon btn-fill btn-success"><i class="fa fa-check-square"></i> Sudah Diunggah</span>
                        @php
                         $link_photo_active_student = explode('/',$user->photo_active_student);
                         $link_photo_active_student = $link_photo_active_student[9];
                        @endphp
                    @endif
                    <input type="text" readonly value="{{$link_photo_active_student}}" class="form-control input-lg" id="" placeholder="">
                    <span class="input-group-addon"><input type="button" data-toggle="modal" data-target="#uploadfoto-active-student" class="btn btn-fill btn-sm btn-success" name="" value="Upload">     </span>
                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <hr>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <label for="">Foto Rumah dari Depan</label>
                <img @if ($user->photo_home_front == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_front}}"  @endif id="profileimage-home-front" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-home-front" @if ($user->photo_home_front == NULL) value="" @else value="{{$user->photo_home_front}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-home-front">Upload Image</a>
              </div>

              <div class="col-sm-6 margin-top-mobile">
                <label for="">Foto Rumah dari Belakang</label>
                <img @if ($user->photo_home_out == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_out}}"  @endif id="profileimage-home-out" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-home-out" @if ($user->photo_home_out == NULL) value="" @else value="{{$user->photo_home_out}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-home-out">Upload Image</a>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 margin-top-mobile">
                <label for="">Foto Rumah dari Samping</label>
                <img @if ($user->photo_home_side == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_side}}"  @endif id="profileimage-home-side" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-home-side" @if ($user->photo_home_side == NULL) value="" @else value="{{$user->photo_home_side}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-home-side">Upload Image</a>
              </div>

              <div class="col-sm-6 margin-top-mobile">
                <label for="">Foto Rumah bagian Dalam</label>
                <img @if ($user->photo_home_in == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_in}}"  @endif id="profileimage-home-in" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile-home-in" @if ($user->photo_home_in == NULL) value="" @else value="{{$user->photo_home_in}}" @endif >
                <a class="btn btn-default btn-fill pull-right" data-toggle="modal" data-target="#uploadfoto-home-in">Upload Image</a>
              </div>
            </div>

          </div>
        </div>
        <div class="wizard-footer height-wizard">
          <div class="pull-right">
            <a href="{{route('step_submit_review')}}" class='btn btn-previous btn-fill btn-success btn-wd btn-sm'> Next</a>

            {{-- <input type='submit' class='btn btn-next btn-fill btn-default btn-wd btn-sm' id="save-draft" name='save' value='Save Draft' /> --}}
            {{-- <input type='submit' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='save' value='Next' /> --}}

          </div>

          <div class="pull-left">
            {{-- <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' /> --}}
            <a href="{{route('step_motivation')}}" class='btn btn-previous btn-fill btn-default btn-wd btn-sm'> Previous</a>
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
            <h4 class="modal-title" id="">Foto KK</h4>
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

  <div class="modal fade" id="uploadfoto-ktm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto KTM</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-ktm"></div>
            <input type="file" id="upload-ktm" name="gambarktm" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-ktm">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="uploadfoto-home-front" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto Rumah Bagian Depan</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-home-front"></div>
            <input type="file" id="upload-home-front" name="gambarhome-front" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-home-front">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="uploadfoto-home-out" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto Rumah Bagian Belakang</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-home-out"></div>
            <input type="file" id="upload-home-out" name="gambarhome-out" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-home-out">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="uploadfoto-home-side" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto Rumah Bagian Samping</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-home-side"></div>
            <input type="file" id="upload-home-side" name="gambarhome-side" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-home-side">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="uploadfoto-home-in" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Foto Rumah Bagian Dalam</h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper-home-in"></div>
            <input type="file" id="upload-home-in" name="gambarhome-in" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result-home-in">Save</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="uploadfoto-sktm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <form class="" enctype="multipart/form-data" action="/upload-crop-photo-sktm" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Upload Surat Keterangan Tidak Mampu (pdf)</h4>
          </div>
          <div class="modal-body">
            <input type="file" id="upload-sktm" name="file_sktm" value="Choose Image" accept=".pdf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary upload-result-sktm upload">Upload</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="uploadfoto-parent-sallary" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <form class="" enctype="multipart/form-data" action="/upload-crop-photo-parent-sallary" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Upload Slip Gaji Orang Tua atau Surat Keterangan Penghasilan Orang Tua (pdf)</h4>
          </div>
          <div class="modal-body">
            <input type="file" id="upload-parent-sallary" name="file_parent_sallary" value="Choose Image" accept=".pdf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary upload-result-parent-sallary upload">Upload</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="uploadfoto-transcript-score" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <form class="" enctype="multipart/form-data" action="/upload-crop-photo-transcript-score" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Upload Transkrip Nilai Terakhir, atau raport kelas 11-12 untuk pendaftar dari Poltek (pdf)</h4>
          </div>
          <div class="modal-body">
            <input type="file" id="upload-transcript-score" name="file_transcript_score" value="Choose Image" accept=".pdf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary upload-result-transcript-score upload">Upload</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="uploadfoto-active-student" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <form class="" enctype="multipart/form-data" action="/upload-crop-photo-active-student" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Upload Surat Keterangan Mahasiswa Aktif dari Fakultas atau Departemen, atau dari Sekolah asal (pdf)</h4>
          </div>
          <div class="modal-body">
            <input type="file" id="upload-active-student" name="file_active_student" value="Choose Image" accept=".pdf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary upload-result-active-student upload">Upload</button>
            <img style="width:30px; display:none" id="" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
          </div>
        </div>
      </div>
    </form>
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

@if (session()->has('document_saved'))
  <script type="text/javascript">
    swal({
        title:'Dokumen berhasil disimpan!',
        type:'success'
      },
    );
  </script>
@endif


@if ($errors->any())
  @php
    foreach ($errors->all() as $error) {
      $errornya[] = $error;
    }

    $daftar_error = join($errornya);
  @endphp


  <script type="text/javascript">
    swal({
        title:'Error',
        text: "{{$daftar_error}} file size must not exceed 2 mb and using right filetype ",
        type:'error'
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
      $('.upload').on('click', function() {
        $('.loading-upload').show();
        $(this).hide();
        $(this).hide();
      });
    });
  </script>

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
              $(this).hide();

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

                  location.reload(true);
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


              if (input.files && input.files[0] && input.files[0].size < 2000000 && input.files[0].type == 'image/jpeg') {
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
                $(this).hide();

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
                      location.reload(true);
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

      {{-- Croppie ktm --}}
        <script type="text/javascript">
          $(document).ready(function() {
            var basic = $('#main-cropper-ktm').croppie({
              viewport: { width: 350, height: 210 },
              boundary: { width: 400, height: 241 },
              showZoomer: true,
            });
            // $('#upload').on('change',function() {
            // });

              function readFile(input) {

                if (input.files && input.files[0] && input.files[0].size < 2000000 && input.files[0].type == 'image/jpeg') {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                    $('#main-cropper-ktm').croppie('bind', {
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

                $('#upload-ktm').on('change', function () { readFile(this); });
                $('.upload-result-ktm').on('click', function (ev) {
                  $('.loading-upload').show();
                  $(this).hide();

                  $('#main-cropper-ktm').croppie('result', {
                    type: 'base64',
                    size: 'original'
                  }).then(function (resp) {
                    // console.log(resp);
                    // Resp = Result in 64encode

                    var imageData = resp;
                    // Uploading via Ajax

                    $.ajax({
                      url: '/upload-crop-photo-ktm',
                      type: 'POST',
                      dataType: 'json',
                      data: {"_token": "{{ csrf_token() }}",
                              "imageData": imageData,

                            },
                    })
                    .done(function(data) {
                      $("#uploadfoto-ktm").modal("hide");
                      $("#profileimage-ktm").attr('src',data.url);
                      $('#img-profile-ktm').val(data.url);
                      $('.loading-upload').hide();

                      swal({
                          title:'Gambar Berhasil Diupload!',
                          type:'success'
                        });
                        location.reload(true);
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

        {{-- Croppie Home Front --}}
          <script type="text/javascript">
            $(document).ready(function() {
              var basic = $('#main-cropper-home-front').croppie({
                viewport: { width: 350, height: 210 },
                boundary: { width: 400, height: 241 },
                showZoomer: true,
              });
              // $('#upload').on('change',function() {
              // });

                function readFile(input) {


                  if (input.files && input.files[0] && input.files[0].size < 2000000 && input.files[0].type == 'image/jpeg') {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                      $('#main-cropper-home-front').croppie('bind', {
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

                  $('#upload-home-front').on('change', function () { readFile(this); });
                  $('.upload-result-home-front').on('click', function (ev) {
                    $('.loading-upload').show();
                    $(this).hide();

                    $('#main-cropper-home-front').croppie('result', {
                      type: 'base64',
                      size: 'original'
                    }).then(function (resp) {
                      // console.log(resp);
                      // Resp = Result in 64encode

                      var imageData = resp;
                      // Uploading via Ajax

                      $.ajax({
                        url: '/upload-crop-photo-home-front',
                        type: 'POST',
                        dataType: 'json',
                        data: {"_token": "{{ csrf_token() }}",
                                "imageData": imageData,

                              },
                      })
                      .done(function(data) {
                        $("#uploadfoto-home-front").modal("hide");
                        $("#profileimage-home-front").attr('src',data.url);
                        $('#img-profile-home-front').val(data.url);
                        $('.loading-upload').hide();

                        swal({
                            title:'Gambar Berhasil Diupload!',
                            type:'success'
                          });
                          location.reload(true);
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

          {{-- Croppie Home Out / Back --}}
            <script type="text/javascript">
              $(document).ready(function() {
                var basic = $('#main-cropper-home-out').croppie({
                  viewport: { width: 350, height: 210 },
                  boundary: { width: 400, height: 241 },
                  showZoomer: true,
                });
                // $('#upload').on('change',function() {
                // });

                  function readFile(input) {


                    if (input.files && input.files[0] && input.files[0].size < 2000000 && input.files[0].type == 'image/jpeg') {
                      var reader = new FileReader();

                      reader.onload = function (e) {
                        $('#main-cropper-home-out').croppie('bind', {
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

                    $('#upload-home-out').on('change', function () { readFile(this); });
                    $('.upload-result-home-out').on('click', function (ev) {
                      $('.loading-upload').show();
                      $(this).hide();

                      $('#main-cropper-home-out').croppie('result', {
                        type: 'base64',
                        size: 'original'
                      }).then(function (resp) {
                        // console.log(resp);
                        // Resp = Result in 64encode

                        var imageData = resp;
                        // Uploading via Ajax

                        $.ajax({
                          url: '/upload-crop-photo-home-out',
                          type: 'POST',
                          dataType: 'json',
                          data: {"_token": "{{ csrf_token() }}",
                                  "imageData": imageData,

                                },
                        })
                        .done(function(data) {
                          $("#uploadfoto-home-out").modal("hide");
                          $("#profileimage-home-out").attr('src',data.url);
                          $('#img-profile-home-out').val(data.url);
                          $('.loading-upload').hide();

                          swal({
                              title:'Gambar Berhasil Diupload!',
                              type:'success'
                            });
                            location.reload(true);
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

            {{-- Croppie Home Side --}}
              <script type="text/javascript">
                $(document).ready(function() {
                  var basic = $('#main-cropper-home-side').croppie({
                    viewport: { width: 350, height: 210 },
                    boundary: { width: 400, height: 241 },
                    showZoomer: true,
                  });
                  // $('#upload').on('change',function() {
                  // });

                    function readFile(input) {


                      if (input.files && input.files[0] && input.files[0].size < 2000000 && input.files[0].type == 'image/jpeg') {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                          $('#main-cropper-home-side').croppie('bind', {
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

                      $('#upload-home-side').on('change', function () { readFile(this); });
                      $('.upload-result-home-side').on('click', function (ev) {
                        $('.loading-upload').show();
                        $(this).hide();

                        $('#main-cropper-home-side').croppie('result', {
                          type: 'base64',
                          size: 'original'
                        }).then(function (resp) {
                          // console.log(resp);
                          // Resp = Result in 64encode

                          var imageData = resp;
                          // Uploading via Ajax

                          $.ajax({
                            url: '/upload-crop-photo-home-side',
                            type: 'POST',
                            dataType: 'json',
                            data: {"_token": "{{ csrf_token() }}",
                                    "imageData": imageData,

                                  },
                          })
                          .done(function(data) {
                            $("#uploadfoto-home-side").modal("hide");
                            $("#profileimage-home-side").attr('src',data.url);
                            $('#img-profile-home-side').val(data.url);
                            $('.loading-upload').hide();

                            swal({
                                title:'Gambar Berhasil Diupload!',
                                type:'success'
                              });
                              location.reload(true);
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

              {{-- Croppie in --}}
                <script type="text/javascript">
                  $(document).ready(function() {
                    var basic = $('#main-cropper-home-in').croppie({
                      viewport: { width: 350, height: 210 },
                      boundary: { width: 400, height: 241 },
                      showZoomer: true,
                    });
                    // $('#upload').on('change',function() {
                    // });

                      function readFile(input) {


                        if (input.files && input.files[0] && input.files[0].size < 2000000 && input.files[0].type == 'image/jpeg') {
                          var reader = new FileReader();

                          reader.onload = function (e) {
                            $('#main-cropper-home-in').croppie('bind', {
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

                        $('#upload-home-in').on('change', function () { readFile(this); });
                        $('.upload-result-home-in').on('click', function (ev) {
                          $('.loading-upload').show();
                          $(this).hide();

                          $('#main-cropper-home-in').croppie('result', {
                            type: 'base64',
                            size: 'original'
                          }).then(function (resp) {
                            // console.log(resp);
                            // Resp = Result in 64encode

                            var imageData = resp;
                            // Uploading via Ajax

                            $.ajax({
                              url: '/upload-crop-photo-home-in',
                              type: 'POST',
                              dataType: 'json',
                              data: {"_token": "{{ csrf_token() }}",
                                      "imageData": imageData,

                                    },
                            })
                            .done(function(data) {
                              $("#uploadfoto-home-in").modal("hide");
                              $("#profileimage-home-in").attr('src',data.url);
                              $('#img-profile-home-in').val(data.url);
                              $('.loading-upload').hide();

                              swal({
                                  title:'Gambar Berhasil Diupload!',
                                  type:'success'
                                });
                                location.reload(true);
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
