@extends('wizard.formwizardlayout')

@section('header-title')
  <h3>
     <b>DATA</b> PRESTASI <br><br>
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
  </script>

  <div class="row">
    <div class="col-sm-12">
      <form class="" id="form-data-input" action="{{route('step_achievement_save')}}" method="post">
        {{ csrf_field() }}
        <div class="tab-content">

          <div class="container-fluid">

            {{-- Pengalaman Organisasi --}}

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Pengalaman Organisasi</b></h2>
                <hr>
              </div>
            </div>

            <div class="" id="pengalaman-organisasi">
              @if ($user->organizations->count() == 0)
                <div class="organization_area">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text"
                          name="organization[0]"
                          data-name-format="organization[%d]"
                        class="form-control" id="" placeholder="Nama Organisasi">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">

                        <div class="input-group">
                          <span class="input-group-addon">
                            <select class="border-none"
                            name="position_name[0]"
                            data-name-format="position_name[%d]" style="width:83px">
                            @foreach ($positions as $position)
                              <option value="{{$position->id}}">{{$position->position_name}}</option>
                            @endforeach
                            </select>
                          </span>

                          <input type="text"
                          name="position[0]"
                          data-name-format="position[%d]"
                          class="form-control" id="" placeholder="Jabatan">
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          name="date_from_org[0]"
                          data-name-format="date_from_org[%d]"
                         class="form-control dari" id="" placeholder="dari Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="date_end_org[0]"
                        data-name-format="date_end_org[%d]"
                        class="form-control hingga" id="" placeholder="hingga Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="organization_del btn btn-danger btn-sm">X</button>
                    </div>

                  </div>
                </div>
              @else
              @foreach ($user->organizations as $key => $org)
                <div class="organization_area">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text"
                          value="{{$org->organization}}"
                          name="organization[0]"
                          data-name-format="organization[%d]"
                        class="form-control" id="" placeholder="Nama Organisasi">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">

                        <div class="input-group">
                          <span class="input-group-addon">
                            <select class="border-none"
                            name="position_name[0]"
                            data-name-format="position_name[%d]" style="width:83px">
                            @foreach ($positions as $position)
                              <option @if($org->position_id == $position->id) selected @endif
                                value="{{$position->id}}">{{$position->position_name}}</option>
                            @endforeach
                            </select>
                          </span>

                          <input type="text"
                          value="{{$org->position}}"
                          name="position[0]"
                          data-name-format="position[%d]"
                          class="form-control" id="" placeholder="Jabatan">
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          value="{{$org->date_from}}"
                          name="date_from_org[0]"
                          data-name-format="date_from_org[%d]"
                         class="form-control dari" id="" placeholder="dari Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        value="{{$org->date_end}}"
                        name="date_end_org[0]"
                        data-name-format="date_end_org[%d]"
                        class="form-control hingga" id="" placeholder="hingga Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="organization_del btn btn-danger btn-fill btn-sm">X</button>
                    </div>

                  </div>
                </div>
              @endforeach
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-organisasi" class="organization_add btn btn-fill btn-success btn-sm btn-block" id="addorganization">Add</a>
            </div>
            {{--  --}}


            {{-- Pengalaman Organisasi --}}

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Pengalaman Kepanitiaan</b></h2>
                <hr>
              </div>
            </div>

            <div class="" id="pengalaman-kepanitiaan">
              @if ($user->committees->count() == 0)
                <div class="committee_area">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text"
                          name="committee[0]"
                          data-name-format="committee[%d]"
                        class="form-control" id="" placeholder="Nama Kepanitiaan">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">

                        <div class="input-group">
                          <span class="input-group-addon">
                            <select class="border-none"
                            name="position_name_com[0]"
                            data-name-format="position_name_com[%d]" style="width:83px">
                            @foreach ($positions as $position)
                              <option value="{{$position->id}}">{{$position->position_name}}</option>
                            @endforeach
                            </select>
                          </span>

                          <input type="text"
                          name="position_com[0]"
                          data-name-format="position_com[%d]"
                          class="form-control" id="" placeholder="Posisi Kepanitiaan">
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          name="date_from_com[0]"
                          data-name-format="date_from_com[%d]"
                         class="form-control dari" id="" placeholder="dari Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="date_end_com[0]"
                        data-name-format="date_end_com[%d]"
                        class="form-control hingga" id="" placeholder="hingga Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="committee_del btn btn-danger btn-sm">X</button>
                    </div>

                  </div>
                </div>
              @else
              @foreach ($user->committees as $key => $com)
                <div class="committee_area">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text"
                          value="{{$com->committee_name}}"
                          name="committee[0]"
                          data-name-format="committee[%d]"
                        class="form-control" id="" placeholder="Nama Kepanitiaan">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">

                        <div class="input-group">
                          <span class="input-group-addon">
                            <select class="border-none"
                            name="position_name_come[0]"
                            data-name-format="position_name_com[%d]" style="width:83px">
                            @foreach ($positions as $position)
                              <option @if($com->position_id == $position->id) selected @endif
                                value="{{$position->id}}">{{$position->position_name}}</option>
                            @endforeach
                            </select>
                          </span>

                          <input type="text"
                          value="{{$com->position}}"
                          name="position_com[0]"
                          data-name-format="position_com[%d]"
                          class="form-control" id="" placeholder="Posisi Kepanitiaan">
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          value="{{$com->date_from}}"
                          name="date_from_com[0]"
                          data-name-format="date_from_com[%d]"
                         class="form-control dari" id="" placeholder="dari Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        value="{{$com->date_end}}"
                        name="date_end_com[0]"
                        data-name-format="date_end_com[%d]"
                        class="form-control hingga" id="" placeholder="hingga Tanggal">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="committee_del btn btn-danger btn-fill btn-sm">X</button>
                    </div>

                  </div>
                </div>
              @endforeach
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-kepanitiaan" class="committee_add btn btn-fill btn-success btn-sm btn-block" id="addcommittee">Add</a>
            </div>
            {{--  --}}


            {{-- Pengalaman Organisasi --}}

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Prestasi Kompetisi dan Kejuaraan Terbaik</b></h2>
                <hr>
              </div>
            </div>

            <div class="daftar-form" >
              @if ($user->competitions->count() == 0)
                <div class="">
                  <ol class="" id="pengalaman-kompetisi">
                    <li class="competition_area">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text"
                            name="competition_name[0]"
                            data-name-format="competition_name[%d]"
                            class="form-control" id="" placeholder="Nama Kompetisi/Kejuaraan">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text"
                            name="title_comp[0]"
                            data-name-format="title_comp[%d]"
                            class="form-control" id="" placeholder="Gelar Contoh: Juara 1 Kategori ...">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-2">
                          <div class="form-group">
                            <select class="form-control" style="color:#868686"
                            name="level_comp[0]"
                            data-name-format="level_comp[%d]">
                            <option value="">-- Tingkat --</option>
                            <option value="Institusi">Institusi</option>
                            <option value="Kota/Kabupaten">Kota/Kabupaten</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <select class="form-control" style="color:#868686"
                          name="type_comp[0]"
                          data-name-format="type_comp[%d]">
                          <option value="">-- Tipe --</option>
                          <option value="Kelompok">Kelompok</option>
                          <option value="Individu">Individu</option>
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <input type="text"
                        name="location_comp[0]"
                        data-name-format="location_comp[%d]"
                        class="form-control" id="" placeholder="Lokasi">
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="number"
                        name="year_comp[0]"
                        data-name-format="year_comp[%d]"
                        class="form-control" id="" placeholder="Tahun">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <input type="text"
                        name="web_comp[0]"
                        data-name-format="web_comp[%d]"
                        class="form-control" id="" placeholder="Web Kompetisi (Optional)">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="competition_del btn btn-danger btn-sm">X</button>
                    </div>

                  </div>
                    </li>
                  </ol>
                </div>
              @else
                <div class="">
                  <ol class="" id="pengalaman-kompetisi">
              @foreach ($user->competitions as $key => $comp)

                    <li class="competition_area">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text"
                            name="competition_name[0]"
                            data-name-format="competition_name[%d]"
                            value="{{$comp->competition_name}}"
                            class="form-control" id="" placeholder="Nama Kompetisi/Kejuaraan">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text"
                            name="title_comp[0]"
                            data-name-format="title_comp[%d]"
                            value="{{$comp->title}}"
                            class="form-control" id="" placeholder="Gelar Contoh: Juara 1 Kategori ...">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-2">
                          <div class="form-group">
                            <select class="form-control" style="color:#868686"
                            name="level_comp[0]"
                            data-name-format="level_comp[%d]">
                            <option @if($comp->level == "") selected @endif value="">-- Tingkat --</option>
                            <option @if($comp->level == "Institusi") selected @endif value="Institusi">Institusi</option>
                            <option @if($comp->level == "Kota/Kabupaten") selected @endif value="Kota/Kabupaten">Kota/Kabupaten</option>
                            <option @if($comp->level == "Provinsi") selected @endif value="Provinsi">Provinsi</option>
                            <option @if($comp->level == "Nasional") selected @endif value="Nasional">Nasional</option>
                            <option @if($comp->level == "Internasional") selected @endif value="Internasional">Internasional</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <select class="form-control" style="color:#868686"
                          name="type_comp[0]"
                          data-name-format="type_comp[%d]">
                          <option value="">-- Tipe --</option>
                          <option @if($comp->type == "Kelompok") selected @endif value="Kelompok">Kelompok</option>
                          <option @if($comp->type == "Individu") selected @endif value="Individu">Individu</option>
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <input type="text"
                        name="location_comp[0]"
                        data-name-format="location_comp[%d]"
                        value="{{$comp->location}}"
                        class="form-control" id="" placeholder="Lokasi">
                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="number"
                        name="year_comp[0]"
                        data-name-format="year_comp[%d]"
                        value="{{$comp->year}}"
                        class="form-control" id="" placeholder="Tahun">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <input type="text"
                        name="web_comp[0]"
                        data-name-format="web_comp[%d]"
                        value="{{$comp->web}}"
                        class="form-control" id="" placeholder="Web Kompetisi (Optional)">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="competition_del btn btn-danger btn-sm">X</button>
                    </div>

                  </div>
              @endforeach
            </li>
            </ol>
            </div>
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-kepanitiaan" class="competition_add btn btn-fill btn-success btn-sm btn-block" id="addcommittee">Add</a>
            </div>
            {{--  --}}

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

  {{-- Croppie --}}




@endsection
