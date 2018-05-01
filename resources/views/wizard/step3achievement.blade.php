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
        area_var: '.organizaion_area',
        btn_add: '.organization_add',
        btn_del: '.organization_del',
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
                <div class="organizaion_area">
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
                            <select class=""
                            name="position_name[0]"
                            data-name-format="position_name[%d]" >
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
                <div class="organizaion_area">
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
                            <select class=""
                            name="position_name[0]"
                            data-name-format="position_name[%d]" >
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
