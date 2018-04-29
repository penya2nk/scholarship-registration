@extends('wizard.formwizardlayout')

@section('header-title')
  <h3>
     <b>DATA</b> PRIBADI <br><br>
     {{-- <small>This information will let us know more about you.</small> --}}
  </h3>
@endsection


@section('content')
  {{-- Cropper = Croppie Plugin --}}
  <link  href="{{asset('cropper_new/croppie.css')}}" rel="stylesheet">
  <script src="{{asset('cropper_new/croppie.js')}}"></script>


  <div class="row">
    <div class="col-sm-12">
      <form class="" id="form-data-input" action="index.html" method="post">
        <div class="tab-content">
        
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-9">
                {{-- LINE 1 --}}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input type="text" @if($user->name !== NULL) value="{{$user->name}}" @endif name="name" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nama Panggilan</label>
                      <input type="text" @if($user->nickname !== NULL) value="{{$user->nickname}}" @endif name="nickname" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                </div>
                {{-- LINE 2 --}}
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Tempat Lahir</label>
                      <input type="text" @if($user->born_place !== NULL) value="{{$user->born_place}}" @endif name="born_place" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    @php
                      if ($user->born_date !== null) {
                        $tgl_lahir = $user->born_date;
                        $tgl_lahir = explode('-',$tgl_lahir);
                        $date_lahir = $tgl_lahir[2];
                        $month_lahir = $tgl_lahir[1];
                        $year_lahir = $tgl_lahir[0];
                      }else {
                        $tgl_lahir = $user->born_date;
                        $tgl_lahir = explode('-',$tgl_lahir);
                        $date_lahir = "1";
                        $month_lahir = "01";
                        $year_lahir = "1990";
                      }
                    @endphp

                    <div class="form-group">
                      <label for="">Tgl</label>
                      <select class="form-control" name="born_date">
                        @for ($i = 1; $i < 31; $i++)
                          <option @if($date_lahir == $i) selected @endif value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Bulan</label>
                      <select class="form-control" name="born_month">
                        <option @if($month_lahir == '01') selected @endif value="01">Januari</option>
                        <option @if($month_lahir == '02') selected @endif value="02">Februari</option>
                        <option @if($month_lahir == '03') selected @endif value="03">Maret</option>
                        <option @if($month_lahir == '04') selected @endif value="04">April</option>
                        <option @if($month_lahir == '05') selected @endif value="05">Mei</option>
                        <option @if($month_lahir == '06') selected @endif value="06">Juni</option>
                        <option @if($month_lahir == '07') selected @endif value="07">Juli</option>
                        <option @if($month_lahir == '08') selected @endif value="08">Agustus</option>
                        <option @if($month_lahir == '09') selected @endif value="09">September</option>
                        <option @if($month_lahir == '10') selected @endif value="10">Oktober</option>
                        <option @if($month_lahir == '11') selected @endif value="11">November</option>
                        <option @if($month_lahir == '12') selected @endif value="12">Desember</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Tahun</label>
                      <input type="number" @if($year_lahir !== NULL) value="{{$year_lahir}}" @else value="1995" @endif class="form-control" name="born_year" id="" placeholder="tahun">
                    </div>
                  </div>
                </div>
                {{-- LINE 3 --}}
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Alamat Tinggal</label>
                      <textarea class="form-control" name="address" rows="4" cols="80"> @if($user->address !== NULL){{$user->address}}@endif</textarea>
                    </div>
                  </div>
                </div>
                {{-- LINE 4 --}}
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Anak</label>
                      <div class="input-group">
                        <span class="input-group-addon">Ke-</span>
                        <input type="number" name="anak_ke" class="form-control" @if($user->anak_ke !== NULL) value="{{$user->anak_ke}}" @endif id="" placeholder="">
                        <span class="input-group-addon">dari</span>
                        <input type="number" name="bersaudara" @if($user->bersaudara !== NULL) value="{{$user->bersaudara}}" @endif class="form-control" placeholder="">
                        <span class="input-group-addon">Bersaudara</span>
                      </div>
                    </div>
                  </div>


                </div>
                {{-- LINE 5 --}}
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Perguruan Tinggi</label>
                      <input type="text" @if($user->university_id !== NULL) value="{{$user->university_id}}" @endif class="form-control" name="university_id" id="" placeholder="">
                    </div>
                  </div>
                </div>
                {{-- LINE 6 --}}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Fakultas</label>
                      <input type="text" @if($user->faculty !== NULL) value="{{$user->faculty}}" @endif name="faculty" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Program Studi</label>
                      <input type="text" @if($user->mayor !== NULL) value="{{$user->mayor}}" @endif name="mayor" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                </div>
                {{-- LINE 7 --}}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Angkatan</label>
                      <input type="text" @if($user->generation !== NULL) value="{{$user->generation}}" @endif name="generation" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">NIM</label>
                      <input type="text" @if($user->nip_mahasiswa !== NULL) value="{{$user->nip_mahasiswa}}" @endif name="nip_mahasiswa" class="form-control" id="" placeholder="">
                    </div>
                  </div>
                </div>

                {{-- DATA ORANG TUA --}}
                <div class="row">
                  <div class="col-sm-12">
                    <h2><b>Data Orang Tua</b></h2>
                    <hr>
                  </div>
                </div>

                <div class="ayah-warper">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <h3>Ayah</h3>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" @if($user->ayah_name !== NULL) value="{{$user->ayah_name}}" @endif name="ayah_name" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" @if($user->ayah_tempat_lahir !== NULL) value="{{$user->ayah_tempat_lahir}}" @endif name="ayah_tempat_lahir" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    @php
                      if ($user->ayah_born_date !== null) {
                        $tgl_lahir = $user->ayah_born_date;
                        $tgl_lahir = explode('-',$tgl_lahir);
                        $date_lahir = $tgl_lahir[2];
                        $month_lahir = $tgl_lahir[1];
                        $year_lahir = $tgl_lahir[0];
                      }else {
                        $tgl_lahir = $user->ayah_born_date;
                        $tgl_lahir = explode('-',$tgl_lahir);
                        $date_lahir = "1";
                        $month_lahir = "01";
                        $year_lahir = "1990";
                      }
                    @endphp


                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">Tgl</label>
                        <select class="form-control" name="ayah_born_date">
                          @for ($i = 1; $i < 31; $i++)
                            <option @if($date_lahir == $i) selected @endif value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Bulan</label>
                        <select class="form-control" name="ayah_born_month">
                          <option @if($month_lahir == '01') selected @endif value="01">Januari</option>
                          <option @if($month_lahir == '02') selected @endif value="02">Februari</option>
                          <option @if($month_lahir == '03') selected @endif value="03">Maret</option>
                          <option @if($month_lahir == '04') selected @endif value="04">April</option>
                          <option @if($month_lahir == '05') selected @endif value="05">Mei</option>
                          <option @if($month_lahir == '06') selected @endif value="06">Juni</option>
                          <option @if($month_lahir == '07') selected @endif value="07">Juli</option>
                          <option @if($month_lahir == '08') selected @endif value="08">Agustus</option>
                          <option @if($month_lahir == '09') selected @endif value="09">September</option>
                          <option @if($month_lahir == '10') selected @endif value="10">Oktober</option>
                          <option @if($month_lahir == '11') selected @endif value="11">November</option>
                          <option @if($month_lahir == '12') selected @endif value="12">Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" class="form-control" name="ayah_born_year" id="" @if($year_lahir !== NULL) value="{{$year_lahir}}" @else value="1995" @endif placeholder="tahun">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="">Alamat Saat Ini</label>
                        <textarea class="form-control" name="ayah_alamat" rows="4" cols="80"> @if($user->ayah_alamat !== NULL){{$user->ayah_alamat}}@endif </textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Suku</label>
                        <input type="text" @if($user->ayah_suku !== NULL) value="{{$user->ayah_suku}}" @endif name="ayah_suku" class="form-control" id="" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Pendidikan Terakhir</label>
                        <select class="form-control" name="ayah_pendidikan">
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "a. SD") selected @endif value="a. SD">SD</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "b. SMP") selected @endif value="b. SMP">SMP</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "c. SMA") selected @endif value="c. SMA">SMA</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "d. SMK") selected @endif value="d. SMK">SMK</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "e. D1") selected @endif value="e. D1">D1</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "f. D2") selected @endif value="f. D2">D2</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "g. D3") selected @endif value="g. D3">D3</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "h. D4") selected @endif value="h. D4">D4</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "i. S1") selected @endif value="i. S1">S1</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "j. S2") selected @endif value="j. S2">S2</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "k. S3") selected @endif value="k. S3">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <input type="text" @if($user->ayah_pekerjaan !== NULL) value="{{$user->ayah_pekerjaan}}" @endif class="form-control" name="ayah_pekerjaan" id="" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Penghasilan Per Bulan</label>
                        <div class="input-group">
                          <span class="input-group-addon">Rp.</span>
                          <input type="number" @if($user->ayah_penghasilan !== NULL) value="{{$user->ayah_penghasilan}}" @endif name="ayah_penghasilan" class="form-control" id="" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Nomor HP</label>
                        <div class="input-group">
                          <span class="input-group-addon">+62</span>
                          <input type="text" @if($user->ayah_phone !== NULL) value="{{$user->ayah_phone}}" @endif name="ayah_phone" class="form-control handphone" id="" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6" id="ayah-tulangpunggung-warper">
                      <div class="form-group">
                        <label for="">Apakah Menjadi Tulang Punggung ?</label>
                        <select id="ayah-tulangpunggung" class="form-control" name="ayah_tulangpunggung">
                          <option @if($user->ayah_tulangpunggung !== NULL && $user->ayah_tulangpunggung == "1") selected @endif value="1">Ya</option>
                          <option @if($user->ayah_tulangpunggung !== NULL && $user->ayah_tulangpunggung == "0") selected @endif value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2" id="ayah-wafat" style="display:none">
                      <div class="form-group">
                        <label for="">Wafat</label>
                        <select id="ayah-wafat-val"  class="form-control" name="ayah_wafat">
                          <option @if($user->ayah_wafat !== NULL && $user->ayah_wafat == "0") selected @endif value="0">Tidak</option>
                          <option @if($user->ayah_wafat !== NULL && $user->ayah_wafat == "1") selected @endif value="1">Ya</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6" id="ayah-tanggungan">
                      <div class="form-group">
                        <label for="">Jumlah Tanggungan</label>
                        <div class="input-group">
                          <input type="number" @if($user->ayah_tanggungan !== NULL) value="{{$user->ayah_tanggungan}}" @endif id="ayah-tanggungan-val" name="ayah_tanggungan" value="0" class="form-control" placeholder="">
                          <span class="input-group-addon">Orang</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <script type="text/javascript">
                    $('#ayah-tulangpunggung').on('change', function() {
                      var val = $(this).val();
                      if (val == "true") {
                        $('#ayah-tanggungan').show();
                        // $('#ayah-tulangpunggung-warper').toggleClass('col-sm-10 col-sm-6');
                        $('#ayah-wafat').val("false").hide();
                      }else {
                        $('#ayah-tanggungan').hide();
                        $('#ayah-tanggungan-val').val(0);
                        // $('#ayah-tulangpunggung-warper').toggleClass('col-sm-6 col-sm-10');
                        $('#ayah-wafat').show();
                      }

                    });
                  </script>
                </div>
                {{-- End Ayah Section --}}

                {{-- Ibu Section --}}
                <div class="ibu-warper">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <h3>Ibu</h3>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" @if($user->ibu_name !== NULL) value="{{$user->ibu_name}}" @endif name="ibu_name" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" @if($user->ibu_tempat_lahir !== NULL) value="{{$user->ibu_tempat_lahir}}" @endif name="ibu_tempat_lahir" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    @php
                      if ($user->ibu_born_date !== null) {
                        $tgl_lahir = $user->ibu_born_date;
                        $tgl_lahir = explode('-',$tgl_lahir);
                        $date_lahir = $tgl_lahir[2];
                        $month_lahir = $tgl_lahir[1];
                        $year_lahir = $tgl_lahir[0];
                      }else {
                        $tgl_lahir = $user->ibu_born_date;
                        $tgl_lahir = explode('-',$tgl_lahir);
                        $date_lahir = "1";
                        $month_lahir = "01";
                        $year_lahir = "1990";
                      }
                    @endphp

                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">Tgl</label>
                        <select class="form-control" name="ibu_born_date">
                          @for ($i = 1; $i < 31; $i++)
                            <option @if($date_lahir == $i) selected @endif value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Bulan</label>
                        <select class="form-control" name="ibu_born_month">
                          <option @if($month_lahir == '01') selected @endif value="01">Januari</option>
                          <option @if($month_lahir == '02') selected @endif value="02">Februari</option>
                          <option @if($month_lahir == '03') selected @endif value="03">Maret</option>
                          <option @if($month_lahir == '04') selected @endif value="04">April</option>
                          <option @if($month_lahir == '05') selected @endif value="05">Mei</option>
                          <option @if($month_lahir == '06') selected @endif value="06">Juni</option>
                          <option @if($month_lahir == '07') selected @endif value="07">Juli</option>
                          <option @if($month_lahir == '08') selected @endif value="08">Agustus</option>
                          <option @if($month_lahir == '09') selected @endif value="09">September</option>
                          <option @if($month_lahir == '10') selected @endif value="10">Oktober</option>
                          <option @if($month_lahir == '11') selected @endif value="11">November</option>
                          <option @if($month_lahir == '12') selected @endif value="12">Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" @if($year_lahir !== NULL) value="{{$year_lahir}}" @else value="1995" @endif class="form-control" name="ibu_born_year" id=""  placeholder="tahun">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="">Alamat Saat Ini</label>
                        <textarea class="form-control" name="ibu_alamat" rows="4" cols="80">@if($user->ibu_alamat !== NULL){{$user->ibu_alamat}}@endif</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Suku</label>
                        <input type="text" @if($user->ibu_suku !== NULL) value="{{$user->ibu_suku}}" @endif name="ibu_suku" class="form-control" id="" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Pendidikan Terakhir</label>
                        <select class="form-control" name="ibu_pendidikan">
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "a. SD") selected @endif value="a. SD">SD</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "b. SMP") selected @endif value="b. SMP">SMP</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "c. SMA") selected @endif value="c. SMA">SMA</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "d. SMK") selected @endif value="d. SMK">SMK</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "e. D1") selected @endif value="e. D1">D1</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "f. D2") selected @endif value="f. D2">D2</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "g. D3") selected @endif value="g. D3">D3</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "h. D4") selected @endif value="h. D4">D4</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "i. S1") selected @endif value="i. S1">S1</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "j. S2") selected @endif value="j. S2">S2</option>
                          <option @if($user->ibu_pendidikan !== NULL && $user->ibu_pendidikan !== "k. S3") selected @endif value="k. S3">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="">Pekerjaan</label>
                        <input type="text" @if($user->ibu_pekerjaan !== NULL) value="{{$user->ibu_pekerjaan}}" @endif class="form-control" name="ibu_pekerjaan" id="" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Penghasilan Per Bulan</label>
                        <div class="input-group">
                          <span class="input-group-addon">Rp.</span>
                          <input type="number" @if($user->ibu_penghasilan !== NULL) value="{{$user->ibu_penghasilan}}" @endif name="ibu_penghasilan" class="form-control" id="" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Nomor HP</label>
                        <div class="input-group">
                          <span class="input-group-addon">+62</span>
                          <input type="text" @if($user->ibu_phone !== NULL) value="{{$user->ibu_phone}}" @endif name="ibu_phone" class="form-control handphone" id="" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6" id="ibu-tulangpunggung-warper">
                      <div class="form-group">
                        <label for="">Apakah Menjadi Tulang Punggung ?</label>
                        <select id="ibu-tulangpunggung" class="form-control" name="ibu_tulangpunggung">
                          <option @if($user->ibu_tulangpunggung !== NULL && $user->ibu_tulangpunggung == "1") selected @endif value="1">Ya</option>
                          <option @if($user->ibu_tulangpunggung !== NULL && $user->ibu_tulangpunggung == "0") selected @endif value="0">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2" id="ibu-wafat" style="display:none">
                      <div class="form-group">
                        <label for="">Wafat</label>
                        <select id="ibu-wafat-val"  class="form-control" name="ibu_wafat">
                          <option @if($user->ibu_wafat !== NULL && $user->ibu_wafat == "0") selected @endif value="0">Tidak</option>
                          <option @if($user->ibu_wafat !== NULL && $user->ibu_wafat == "1") selected @endif value="1">Ya</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6" id="ibu-tanggungan">
                      <div class="form-group">
                        <label for="">Jumlah Tanggungan</label>
                        <div class="input-group">
                          <input type="number" @if($user->ibu_tanggungan !== NULL) value="{{$user->ibu_tanggungan}}" @endif id="ibu-tanggungan-val" name="ibu_tanggungan" value="0" class="form-control" placeholder="">
                          <span class="input-group-addon">Orang</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <script type="text/javascript">
                    $('#ibu-tulangpunggung').on('change', function() {
                      var val = $(this).val();
                      if (val == "true") {
                        $('#ibu-tanggungan').show();
                        // $('#ibu-tulangpunggung-warper').toggleClass('col-sm-10 col-sm-6');
                        $('#ibu-wafat').val("false").hide();
                      }else {
                        $('#ibu-tanggungan').hide();
                        $('#ibu-tanggungan-val').val(0);
                        // $('#ibu-tulangpunggung-warper').toggleClass('col-sm-6 col-sm-10');
                        $('#ibu-wafat').show();
                      }

                    });
                  </script>
                </div>
                {{-- End ibu Section --}}
              </div>

              {{-- Profile Picture Section --}}
              <div class="col-sm-3">
                <label for="">Foto Diri</label>
                <img @if($user->photo_profile == NULL) @if($user->gender = "L") src="{{asset('images/male-blank.jpg')}}" @else src="{{asset('images/female-blank.jpg')}}" @endif @else src="{{asset('images/profileimage/'.$user->photo_profile)}}" @endif  id="profileimage" class="img img-responsive" alt="">
                <input type="hidden" name="primary_image" id="img-profile" @if ($user->photo_profile == NULL) value="" @else value="{{$user->photo_profile}}" @endif >
                <a class="btn btn-sucess pull-right" data-toggle="modal" data-target="#uploadfoto">Upload Image</a>
              </div>




            </div>
          </div>

        </div>
        <div class="wizard-footer height-wizard">
          <div class="pull-right">
            <input type='button' class='btn btn-next btn-fill btn-default btn-wd btn-sm' id="save-draft" name='finish' value='Save Draft' />
            <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />

          </div>

          <div class="pull-left">
            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
          </div>
          <div class="clearfix"></div>
        </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <form class="" enctype="multipart/form-data" action="/upload-crop-photo" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog" style="margin-top:10px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id=""></h4>
          </div>
          <div class="modal-body">
            <div id="main-cropper"></div>
            <input type="file" id="upload" name="gambarprofile" value="Choose Image" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary upload-result">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script type="text/javascript">
  $('#save-draft').on('click',function() {

    var value = $('#form-data-input').serializeArray();
    console.log(value);

    $.ajax({
      url: '{{route('step_profile_draft')}}',
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
  </script>

  <script type="text/javascript">
    $(document).ready(function() {

    });
  </script>

  {{-- Croppie --}}
    <script type="text/javascript">
      $(document).ready(function() {
        var basic = $('#main-cropper').croppie({
          viewport: { width: 350, height: 350 },
          boundary: { width: 400, height: 400 },
          showZoomer: true,
        });
        // $('#upload').on('change',function() {
        // });

          function readFile(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                $('#main-cropper').croppie('bind', {
                  url: e.target.result
                });
                $('.actionDone').toggle();
                $('.actionUpload').toggle();
              }

              reader.readAsDataURL(input.files[0]);
            }
          }

            $('#upload').on('change', function () { readFile(this); });
            $('.upload-result').on('click', function (ev) {
              $('#main-cropper').croppie('result', {
                type: 'base64',
                size: 'original'
              }).then(function (resp) {
                // console.log(resp);
                // Resp = Result in 64encode

                var imageData = resp;
                // Uploading via Ajax

                $.ajax({
                  url: '/upload-crop-photo',
                  type: 'POST',
                  dataType: 'json',
                  data: {"_token": "{{ csrf_token() }}",
                          "imageData": imageData,

                        },
                })
                .done(function(data) {
                  $("#uploadfoto").modal("hide");
                  $("#profileimage").attr('src','/images/profileimage/'+data.url);
                  $('#img-profile').val(data.url);
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
