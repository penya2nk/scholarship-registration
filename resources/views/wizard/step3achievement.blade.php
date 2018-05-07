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

            $(function() {
              $('#pengalaman-pelatihan').addInputArea({
                  area_var: '.training_area',
                  btn_add: '.training_add',
                  btn_del: '.training_del',
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

            {{-- Kinerja Akademik --}}
            <div class="row">
              <div class="col-sm-12">
                <h2><b>Akademik</b></h2>
                <hr>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-2">
                      <h5>Indeks Prestasi (IP)</h5>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IP Semester 1</label>
                        <input type="number" name="ip_1" value="{{$user->ip_1}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IP Semester 2</label>
                        <input type="number" name="ip_2" value="{{$user->ip_2}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IP Semester 3</label>
                        <input type="number" name="ip_3" value="{{$user->ip_3}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IP Semester 4</label>
                        <input type="number" name="ip_4" value="{{$user->ip_4}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-2">
                      <h5>Indeks Prestasi Kumulatif (IPK)</h5>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IPK Semester 1</label>
                        <input type="number" name="ipk_1" value="{{$user->ipk_1}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IPK Semester 2</label>
                        <input type="number" name="ipk_2" value="{{$user->ipk_2}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IPK Semester 3</label>
                        <input type="number" name="ipk_3" value="{{$user->ipk_3}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">IPK Semester 4</label>
                        <input type="number" name="ipk_4" value="{{$user->ipk_4}}" step="0.01" class="form-control" id="" min="0" max="4" placeholder="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-2">
                      <h5>TOEFL</h5>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">Setara</label>
                        <input type="number" name="toefl" value="{{$user->toefl}}" step="1" class="form-control" id="" min="0" max="800" placeholder="nilai">
                      </div>
                    </div>
                  </div>

              </div>
            </div>

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
                      <button type="button" class="organization_del btn btn-danger btn-blcok btn-fill btn-block btn-sm">X</button>
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
                      <button type="button" class="organization_del btn btn-danger btn-block btn-fill btn-sm">X</button>
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


            {{-- Pengalaman Kepanitiaan --}}

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
                      <button type="button" class="committee_del btn btn-danger btn-block btn-fill btn-sm">X</button>
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
                      <button type="button" class="committee_del btn btn-danger btn-block btn-fill btn-sm">X</button>
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

            {{-- Pengalaman Pelatihan --}}

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Pengalaman Pelatihan / Kursus</b></h2>
                <hr>
              </div>
            </div>

            <div class="" id="pengalaman-pelatihan">
              @if ($user->trainings->count() == 0)
                <div class="training_area">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text"
                          name="training[0]"
                          data-name-format="training[%d]"
                        class="form-control" id="" placeholder="Nama Pelatihan / Kursus">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          name="date_train[0]"
                          data-name-format="date_train[%d]"
                         class="form-control dari" id="" placeholder="Tanggal Pelaksanaan">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                          <input type="text"
                          name="content_train[0]"
                          data-name-format="content_train[%d]"
                          class="form-control" id="" placeholder="Konten Pelatihan / Kursus">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          name="organizer_train[0]"
                          data-name-format="organizer_train[%d]"
                         class="form-control" id="" placeholder="Penyelenggara">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="training_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                    </div>
                  </div>
                </div>
              @else
              @foreach ($user->trainings as $key => $train)
                <div class="training_area">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text"
                          name="training[0]"
                          value="{{$train->training}}"
                          data-name-format="training[%d]"
                        class="form-control" id="" placeholder="Nama Pelatihan / Kursus">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="date"
                          name="date_train[0]"
                          value="{{$train->date}}"
                          data-name-format="date_train[%d]"
                         class="form-control dari" id="" placeholder="Tanggal Pelaksanaan">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                          <input type="text"
                          value="{{$train->content}}"
                          name="content_train[0]"
                          data-name-format="content_train[%d]"
                          class="form-control" id="" placeholder="Konten Pelatihan / Kursus">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                          name="organizer_train[0]"
                          value="{{$train->organizer}}"
                          data-name-format="organizer_train[%d]"
                         class="form-control" id="" placeholder="Penyelenggara">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="training_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                    </div>
                  </div>
                </div>
              @endforeach
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-pelatihan" class="training_add btn btn-fill btn-success btn-sm btn-block" id="addcommittee">Add</a>
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
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="location_comp[0]"
                        data-name-format="location_comp[%d]"
                        class="form-control" id="" placeholder="Lokasi">
                      </div>
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
                      <button type="button" class="competition_del btn btn-danger btn-block btn-fill btn-sm">X</button>
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
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="location_comp[0]"
                        data-name-format="location_comp[%d]"
                        value="{{$comp->location}}"
                        class="form-control" id="" placeholder="Lokasi">
                      </div>
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
                      <button type="button" class="competition_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                    </div>

                  </div>
                </li>
              @endforeach
            </ol>
            </div>
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-kepanitiaan" class="competition_add btn btn-fill btn-success btn-sm btn-block" id="addcommittee">Add</a>
            </div>
            {{--  --}}

            {{-- Pengalaman Aktivitas Sosial dan Kerelawanan --}}

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Aktivitas Sosial dan Kerelawanan</b></h2>
                <hr>
              </div>
            </div>

            <div class="daftar-form" >
              @if ($user->charities->count() == 0)
                <div class="">
                  <ol class="" id="pengalaman-kerelawanan">
                    <li class="charity_area">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text"
                            name="activity_name[0]"
                            data-name-format="activity_name[%d]"
                            class="form-control" id="" placeholder="Nama Kegiatan Kerelawanan">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text"
                            name="role_char[0]"
                            data-name-format="role_char[%d]"
                            class="form-control" id="" placeholder="Peran">
                          </div>
                        </div>
                      </div>

                    <div class="row">
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="location_char[0]"
                        data-name-format="location_char[%d]"
                        class="form-control" id="" placeholder="Lokasi">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="date_from_char[0]"
                        data-name-format="date_from_char[%d]"
                        class="form-control dari" id="" placeholder="Tanggal Mulai">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="text"
                        name="date_end_char[0]"
                        data-name-format="date_end_char[%d]"
                        class="form-control hingga" id="" placeholder="Tanggal Selesai">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">+/-</span>
                          <input type="number"
                          name="person_impacted[0]"
                          data-name-format="person_impacted[%d]"
                          class="form-control" id="" placeholder="Juml. Penerima Manfaat">
                          <span class="input-group-addon">orang</span>

                        </div>

                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="charity_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                    </div>

                  </div>
                    </li>
                  </ol>
                </div>
              @else
                <div class="">
                  <ol class="" id="pengalaman-kerelawanan">
              @foreach ($user->charities as $key => $char)

                <li class="charity_area">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text"
                        name="activity_name[0]"
                        data-name-format="activity_name[%d]"
                        value="{{$char->activity_name}}"
                        class="form-control" id="" placeholder="Nama Kegiatan Kerelawanan">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text"
                        name="role_char[0]"
                        data-name-format="role_char[%d]"
                        value="{{$char->role}}"
                        class="form-control" id="" placeholder="Peran">
                      </div>
                    </div>
                  </div>

                <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="text"
                    name="location_char[0]"
                    data-name-format="location_char[%d]"
                    value="{{$char->location}}"
                    class="form-control" id="" placeholder="Lokasi">
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="text"
                    name="date_from_char[0]"
                    data-name-format="date_from_char[%d]"
                    value="{{$char->date_from}}"
                    class="form-control dari" id="" placeholder="Tanggal Mulai">
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="text"
                    name="date_end_char[0]"
                    data-name-format="date_end_char[%d]"
                    value="{{$char->date_end}}"
                    class="form-control hingga" id="" placeholder="Tanggal Selesai">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">+/-</span>
                      <input type="number"
                      name="person_impacted[0]"
                      data-name-format="person_impacted[%d]"
                      value="{{$char->person_impacted}}"
                      class="form-control" id="" placeholder="Juml. Penerima Manfaat">
                      <span class="input-group-addon">orang</span>

                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="charity_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                </div>

              </div>
                </li>
              @endforeach
            </ol>
            </div>
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-kerelawanan" class="charity_add btn btn-fill btn-success btn-sm btn-block" id="addcommittee">Add</a>
            </div>
            {{--  --}}

            {{-- Buku atau Publikasi --}}

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Artikel dan/atau karya tulis yang pernah dipublikasikan</b></h2>
                <hr>
              </div>
            </div>

            <div class="daftar-form" >
              @if ($user->publications->count() == 0)
                <div class="">
                  <ol class="" id="pengalaman-publikasi">
                    <li class="publication_area">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input type="text"
                            name="publication_name[0]"
                            data-name-format="publication_name[%d]"
                            class="form-control" id="" placeholder="Judul Karya">
                          </div>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-12">
                            <textarea class="form-control"
                            name="abstract_pub[0]"
                            data-name-format="abstract_pub[%d]"
                            rows="8" cols="80" placeholder="Abstract"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input type="text"
                              name="role_pub[0]"
                              data-name-format="role_pub[%d]"
                              class="form-control" id="" placeholder="Peran">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text"
                              name="author_pub[0]"
                              data-name-format="author_pub[%d]"
                              class="form-control" id="" placeholder="Author">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="number"
                              name="year_pub[0]"
                              data-name-format="year_pub[%d]"
                              class="form-control" id="" placeholder="Tahun Rilis">
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="col-sm-1">
                      <button type="button" class="publication_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <hr>
                    </div>
                  </div>
                  </li>
                  </ol>
                </div>
              @else
                <div class="">
                  <ol class="" id="pengalaman-publikasi">
              @foreach ($user->publications as $key => $pub)
                <li class="publication_area">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text"
                        name="publication_name[0]"
                        data-name-format="publication_name[%d]"
                        value="{{$pub->publication_name}}"
                        class="form-control" id="" placeholder="Judul Karya">
                      </div>
                    </div>
                  </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-12">
                        <textarea class="form-control"
                        name="abstract_pub[0]"
                        data-name-format="abstract_pub[%d]"
                        rows="8" cols="80" placeholder="Abstract">{{$pub->abstract}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input type="text"
                          name="role_pub[0]"
                          data-name-format="role_pub[%d]"
                          value="{{$pub->role}}"
                          class="form-control" id="" placeholder="Peran">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text"
                          name="author_pub[0]"
                          data-name-format="author_pub[%d]"
                          value="{{$pub->author}}"
                          class="form-control" id="" placeholder="Author">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="number"
                          name="year_pub[0]"
                          data-name-format="year_pub[%d]"
                          value="{{$pub->year}}"
                          class="form-control" id="" placeholder="Tahun Rilis">
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="col-sm-1">
                  <button type="button" class="publication_del btn btn-danger btn-block btn-fill btn-sm">X</button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>
              </li>

              @endforeach
            </ol>
            </div>
              @endif
            </div>
            <div class="row">
              <a href="#pengalaman-publikasi" class="publication_add btn btn-fill btn-success btn-sm btn-block" id="addcommittee">Add</a>
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
            <a href="{{route('step_profile')}}" class='btn btn-previous btn-fill btn-default btn-wd btn-sm'> Previous</a>
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
