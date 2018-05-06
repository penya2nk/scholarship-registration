@extends('wizard.formwizardlayout')

@section('header-title')
  <h3>
     <b>PREVIEW</b> DATA <br><br>
     {{-- <small>This information will let us know more about you.</small> --}}
  </h3>
@endsection


@section('content')
  {{-- Cropper = Croppie Plugin --}}
  <link  href="{{asset('cropper_new/croppie.css')}}" rel="stylesheet">
  <script src="{{asset('cropper_new/croppie.js')}}"></script>
  <script src="{{asset('js/jquery.add-input-area.js')}}"></script>


  <div class="row">
    <div class="col-sm-12">
      <form class="" id="form-data-input" action="{{route('step_motivation_save')}}" method="post">
        {{ csrf_field() }}
        <div class="tab-content">
          <div class="container-fluid">

            @if ($validation['fill_percent'] > 80)
              <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                  <h4>“Dan Katakanlah: “Bekerjalah kamu, maka Allah dan Rasul-Nya serta
orang-orang mukmin akan melihat pekerjaanmu itu, dan kamu akan
dikembalikan kepada (Allah) Yang Mengetahui akan yang ghaib dan
yang nyata, lalu diberitakan-Nya kepada kamu apa yang telah kamu
kerjakan.” <br><br>
 - QS. At-Taubah: 105 - </h4>



                  @if ($user->final_submit == 1)
                    <h6>Terima Kasih data anda telah kami terima. Tunggu kabar dari kami untuk pengumuman dan tahap selanjutnya.
                    </h6>
                    <br><br>

                    <input type="button" style="padding: 14px 122px;" class="btn btn-next btn-fill btn-default btn-wd btn-lg" value="Submitted">
                  @else

                    <h6>Demikian data-data ini saya buat dengan sesungguhnya, apabila dikemudian hari terbukti pernyataaan ini tidak benar.
                      saya bersedia menerima segala tindakan yang diberikan oleh panitia.
                    </h6>
                    <br><br>

                    <input type="button" id="submit-data" style="padding: 14px 122px;border-bottom: 13px green solid;" class="btn btn-next btn-fill btn-success btn-wd btn-lg" value="Submit">
                  @endif


                </div>
              </div>
              @else
                <div class="row text-center">
                  <h1>
                    <b>{{$validation['fill_percent']}} %</b>
                  </h1>
                  <h2>Lengkapi data Anda</h2>
                  <p>Data hanya boleh disubmit setelah Anda melengkapi >90% pengisian </p>
                </div>
            @endif




          </div>
        </div>
        <div class="wizard-footer height-wizard">
          <div class="pull-right">
            {{-- <input type='submit' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='save' value='Next' /> --}}

          </div>

          <div class="pull-left">
            <a href="{{route('step_document')}}" class='btn btn-previous btn-fill btn-default btn-wd btn-sm'> Previous</a>
            {{-- <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' /> --}}
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


  <script type="text/javascript">
    $(document).ready(function() {

    });
  </script>

  <script type="text/javascript">
    $('#submit-data').on('click', function() {
      swal({
        title: "Apakah Anda yakin?",
        text: "Pastikan data yang Anda berikan sudah benar. Pembaharuan data tidak bisa dilakukan lagi setelah melakukan proses submit.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#f44336",
        confirmButtonText: "Ya, Saya Yakin !",
        cancelButtonText: "Cancel",

      }).then((result) => {
    if (result.value) {
      var id_user = {{$user->id}};

      $.ajax({
        url: '/scholarship/step/final_submit',
        type: 'POST',
        dataType: 'json',
        context:this,
        data: {"_token": "{{ csrf_token() }}",
               "id_user": id_user}
      })
      .done(function(data) {

        if (data.status == "Success") {
          swal(
            'Berhasil !',
            // 'The Product '+ data.judul +' has been deleted.',
            'Data berhasil dikirim. Silahkan tunggu kabar selanjutnya'
          )

        }else {
          swal(
            'Gagal!',
            // 'Training '+ data.judul +' ada peserta yang sedang bertransaksi.',
            'error'
          )
        }

      });

    }
  });
    });
  </script>





@endsection
