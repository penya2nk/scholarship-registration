@extends('wizard.formwizardlayout')

@section('header-title')
  <h3>
     <b>DATA</b> MOTIVASI <br><br>
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

            {{-- Pengalaman Organisasi --}}
            <div class="row">
              <div class="col-sm-12">
                <h2><b>Lifeplan Summary </b></h2>
                <p>Uraikan rangkuman rencana hidup Anda</p>
                <hr>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <textarea name="lifeplan_summary" class="form-control" rows="8" cols="80">{{$user->lifeplan_summary}}</textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Komitmen Kontribusi untuk Bazis </b></h2>
                <p>Uraikan komitmen kontribusi yang akan Anda berikan untuk Bazis </p>
                <hr>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <textarea name="commitment" class="form-control" rows="8" cols="80">{{$user->commitment}}</textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <h2><b>Apa yang membuat anda layak diterima pada program ini ? </b></h2>
                <p>Uraikan alasan anda mengapa kami layak menerima Anda untuk program beasiswa ini</p>
                <hr>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <textarea name="why_accepted" class="form-control" rows="8" cols="80">{{$user->why_accepted}}</textarea>
                </div>
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
            <a href="{{route('step_achievement')}}" class='btn btn-previous btn-fill btn-default btn-wd btn-sm'> Previous</a>
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
