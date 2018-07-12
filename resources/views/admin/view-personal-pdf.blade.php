
<link href="{{asset('assets/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admin-ui/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-ui/assets/scss/style.css')}}">

  <div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="tab-content">
          <div class="fluid-container">
                <div class="row">
                  <div class="col-sm-12">

                    {{-- Primary Identity --}}
                    <div class="row">
                      <div class="col-sm-4">
                        <img class="img img-responsive" src="{{$user->photo_profile}}" alt="">
                        {{-- <img @if ($user->photo_home_in == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_in}}"  @endif class="img img-responsive" alt="" style="margin-top :10px"> --}}

                      </div>
                      <div class="col-sm-8">
                        <h2>
                          <b>
                            {{$user->name}}
                          </b>
                        </h2>
                        <h4>{{$user->institution['institution_name']}} ({{$user->generation}})</h4>
                        <h5>{{$user->faculty}} </h5>
                        <h5>{{$user->mayor}} ({{$user->nip_mahasiswa}}) </h5>

                        <p>{{$user->email}}</p>
                        <p>{{$user->phone}}</p>
                        <p>{{$user->address}}</p>
                        <p>Anak ke {{$user->anak_ke}} dari {{$user->bersaudara}} bersaudara</p>

                        IPK
                        Smt 1 : <span class="badge badge-danger ">{{$user->ipk_1 ? $user->ipk_1: "0.00"}}</span>
                         2 : <span class="badge badge-danger ">{{$user->ipk_2 ? $user->ipk_2: "0.00"}}</span>
                         3 : <span class="badge badge-danger ">{{$user->ipk_3 ? $user->ipk_3: "0.00"}}</span>
                         4 : <span class="badge badge-danger ">{{$user->ipk_4 ? $user->ipk_4: "0.00"}}</span>
                      </div>
                    </div>

                    {{-- Data Diri --}}
                    <table class="table" style="margin-top:80px">
                      <tbody>
                        <tr>
                          <td><h4><b>Tempat, Tanggal Lahir</b></h4>
                            <p>{{$user->born_place}}, <br> {{$user->born_date ? $user->born_date->format('d-m-Y'): ''}}</p>
                          </td>
                          <td>
                            <h4><b>Agama</b></h4>
                            <p>{{$user->religion}}</p>
                          </td>
                          <td>
                            <h4><b>Tinggi Badan</b></h4>
                            <p>{{$user->body_length}} cm</p>
                          </td>
                          <td>
                            <h4><b>Berat Badan</b></h4>
                            <p>{{$user->body_weight}} kg</p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h4><b>Facebook</b></h4>
                            <p>
                              <a href="http://www.facebook.com/{{$user->facebook_id}}" class="btn btn-primary btn-fill" target="_blank">{{$user->facebook_id}}</a>
                            </p>
                          </td>
                          <td>
                            <h4><b>Instagram</b></h4>
                            <a href="http://www.instagram.com/{{$user->instagram_id}}" class="btn btn-primary btn-fill" target="_blank">@ {{$user->instagram_id}}</a>
                          </td>
                          <td>
                            <h4><b>Blog</b></h4>
                            <p>
                              @if ($user->blog_id == NULL)
                                -
                              @else
                                <a href="http://{{$user->blog_id}}" class="btn btn-primary btn-fill" target="_blank">{{$user->blog_id}}</a>
                              @endif

                            </p>
                          </td>
                          <td>
                            <h4><b>NIK/KTP</b></h4>
                            <p>{{$user->nik_ktp}}</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>


                    <table class="table" style="margin-top:80px">
                      <tbody>
                        <tr>
                          <td colspan="2">
                            <h3><b>Ayah</b></h3>
                            <h3>{{$user->ayah_name}}</h3>
                          </td>
                          <td colspan="2">
                            <h3><b>Ibu</b></h3>
                            <h3>{{$user->ibu_name}}</h3>
                          </td>
                        </tr>
                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>TTL</b>
                          </td>
                          <td>
                            <span>{{$user->ayah_tempat_lahir}}, {{$user->ayah_tanggal_lahir ? $user->ayah_tanggal_lahir->format('d-m-Y'): ''}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>TTL</b>
                          </td>
                          <td>
                            <span>{{$user->ibu_tempat_lahir}}, {{$user->ibu_tanggal_lahir ? $user->ibu_tanggal_lahir->format('d-m-Y'): ''}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Alamat</b>
                          </td>
                          <td>
                            <span>{{$user->ayah_alamat}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Alamat</b>
                          </td>
                          <td>
                            <span>{{$user->ibu_alamat}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Suku</b>
                          </td>
                          <td>
                            <span>{{$user->ayah_suku}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Suku</b>
                          </td>
                          <td>
                            <span>{{$user->ibu_suku}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Pendidikan Terakhir</b>
                          </td>
                          <td>
                            @php
                              $pendidikan_ayah = explode(' ',$user->ayah_pendidikan);
                            @endphp
                            <span>{{$pendidikan_ayah[1]}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Pendidikan Terakhir</b>
                          </td>
                          <td>
                            @php
                              $pendidikan_ibu = explode(' ',$user->ibu_pendidikan);
                            @endphp
                            <span>{{$pendidikan_ibu[1]}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Pekerjaan</b>
                          </td>
                          <td>
                            <span>{{$user->ayah_pekerjaan}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Pekerjaan</b>
                          </td>
                          <td>
                            <span>{{$user->ibu_pekerjaan}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Penghasilan per Bulan</b>
                          </td>
                          <td>
                            <span>Rp. {{$user->ayah_penghasilan ? format_uang($user->ayah_penghasilan) : ''}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Penghasilan per Bulan</b>
                          </td>
                          <td>
                            <span>Rp. {{$user->ibu_penghasilan ? format_uang($user->ibu_penghasilan) : ''}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Nomor Hp</b>
                          </td>
                          <td>
                            <span>{{$user->ayah_phone}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Nomor Hp</b>
                          </td>
                          <td>
                            <span>{{$user->ibu_phone}}</span>
                          </td>
                        </tr>

                        <tr>
                          {{-- // Ayah --}}
                          <td>
                            <b>Jumlah Tanggungan</b>
                          </td>
                          <td>
                            <span>{{$user->ayah_tanggungan}}</span>
                          </td>
                          {{-- Ibu --}}
                          <td>
                            <b>Jumlah Tanggungan</b>
                          </td>
                          <td>
                            <span>{{$user->ibu_tanggungan}}</span>
                          </td>
                        </tr>

                      </tbody>
                    </table>




                        </div>
                      </div>

                      <div class="row" style="margin-top:250px">
                        <div class="col-md-12 text-center">
                          <h3>Pengalaman Organisasi</h3>
                          <hr>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Pengalaman Organisasi</th>
                                <th>Tahun</th>
                                <th>Posisi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($user->organizations->count() !== 0)
                                @foreach ($user->organizations as $org)
                                  <tr>
                                    <td>{{$org->organization}}</td>
                                    <td>{{$org->date_from ? $org->date_from->format('d M Y'): ''}} - {{$org->date_end ? $org->date_end->format('d M Y'): ''}}</td>
                                    <td>{{$org->positions->position_name}} {{$org->position}}</td>
                                  </tr>
                                @endforeach
                              @endif

                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row" style="margin-top:20px">
                        <div class="col-md-12 text-center">
                          <h3>Pengalaman Kepanitiaan</h3>
                          <hr>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Pengalaman Kepanitiaan</th>
                                <th>Tahun</th>
                                <th>Posisi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($user->committees->count() !== 0)
                                @foreach ($user->committees as $com)
                                  <tr>
                                    <td>{{$com->committee_name}}</td>
                                    <td>{{$com->date_from ? $com->date_from->format('d M Y'): ''}} - {{$com->date_end ? $com->date_end->format('d M Y'): ''}}</td>
                                    <td>{{$com->positions->position_name}} {{$com->position}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row" style="margin-top:20px">
                        <div class="col-md-12 text-center">
                          <h3>Pengalaman Pelatihan / Kursus</h3>
                          <hr>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Pengalaman Pelatihan / Kursus</th>
                                <th>Tahun</th>
                                <th>Posisi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($user->committees->count() !== 0)
                                @foreach ($user->trainings as $train)
                                  <tr>
                                    <td>{{$train->training}}</td>
                                    <td>{{$train->date ? $train->date->format('d M Y'): ''}}</td>
                                    <td>{{$train->content}} {{$train->organizer}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row" style="margin-top:20px">
                        <div class="col-md-12 text-center">
                          <h3>Prestasi Kompetisi dan Kejuaraan Terbaik</h3>
                          <hr>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Level</th>
                                <th>Prestasi Kompetisi dan Kejuaraan Terbaik</th>
                                <th>Lokasi</th>
                                <th>Web</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($user->competitions->count() !== 0)
                                @foreach ($user->competitions as $comp)
                                  <tr>
                                    <td>{{$comp->level}} | {{$comp->type}}</td>
                                    <td>{{$comp->competition_name}}</td>
                                    <td>{{$comp->location}}</td>
                                    <td>{{$comp->web}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row" style="margin-top:20px">
                        <div class="col-md-12 text-center">
                          <h3>Aktivitas Sosial dan Kerelawanan</h3>
                          <hr>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nama Aktivitas</th>
                                <th>Peran</th>
                                <th>Lokasi</th>
                                <th>Waktu</th>
                                <th>Jumlah Penerima Manfaat (+/-)</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($user->charities->count() !== 0)
                                @foreach ($user->charities as $char)
                                  <tr>
                                    <td>{{$char->activity_name}}</td>
                                    <td>{{$char->role}}</td>
                                    <td>{{$char->location}}</td>
                                    <td>{{$char->date_from !== NULL ? $char->date_from->format('d M Y'):'' }}</td>
                                    <td>{{$char->person_impacted}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row" style="margin-top:20px">
                        <div class="col-md-12 text-center">
                          <h3>Artikel dan/atau karya tulis yang pernah dipublikasikan</h3>
                          <hr>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Judul Karya</th>
                                <th>Abstrak</th>
                                <th>Peran</th>
                                <th>Author</th>
                                <th>Tahun Release</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($user->publications->count() !== 0)
                                @foreach ($user->publications as $char)
                                  <tr>
                                    <td>{{$char->publication_name}}</td>
                                    <td>{{$char->abstract}}</td>
                                    <td>{{$char->role}}</td>
                                    <td>{{$char->author}}</td>
                                    <td>{{$char->release}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>


                      {{-- <div class="row">
                        <hr>
                        <div class="col-md-12 text-center">


                          @if ($user->publications()->count() !== 0)
                          <h3><b>Artikel dan/atau karya tulis yang pernah dipublikasikan</b></h3>
                          <hr>
                          <div class="">
                            <ul>
                              @foreach ($user->publications as $pub)
                                <li>
                                  <h5 class="">
                                    <b>{{$pub->publication_name}}</b>
                                  </h5>
                                  <p class="no-margin">{{$pub->year}} | {{$pub->role}}</p>
                                  <p class="no-margin">{{$pub->author}}</p>
                                  <p class="no-margin">{{$pub->abstract}}</p>

                                </li>
                              @endforeach
                            </ul>
                          </div>
                          @endif


                        </div>
                      </div> --}}

                      {{-- Motivasi --}}
                      <div class="row">
                        <div class="col-md-12">
                          <h3>
                            <b>Lifeplan Summary</b>
                          </h3>
                          <p class="column-3">
                            {{$user->lifeplan_summary}}
                          </p>
                        </div>
                        <hr>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <h3>
                            <b>Komitmen Kontribusi untuk Bazis</b>
                          </h3>
                          <p class="column-3">
                            {{$user->commitment}}
                          </p>
                        </div>
                        <hr>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <h3>
                            <b>Alasan mengapa diterima</b>
                          </h3>
                          <p class="column-3">
                            {{$user->why_accepted}}
                          </p>
                        </div>
                        <hr>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <h3>
                            <b>
                              Berkas
                            </b>
                          </h3>
                        </div>
                        <hr>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <form class="" id="form-data-input" action="{{route('step_motivation_save')}}" method="post">
                            {{ csrf_field() }}
                            <div class="tab-content">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-sm-4">

                                    <label for="">KTP</label>
                                    <img @if ($user->photo_ktp == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_ktp}}"  @endif id="profileimage-ktp" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-ktp" @if ($user->photo_ktp == NULL) value="" @else value="{{$user->photo_ktp}}" @endif >
                                      <a href="{{$user->photo_ktp ? $user->photo_ktp : '#'}}" class="btn btn-sm btn-success" target="_blank"> Preview</a>
                                  </div>

                                  <div class="col-sm-4">
                                    <label for="">Kartu Keluarga (KK)</label>
                                    <img @if ($user->photo_kk == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_kk}}"  @endif id="profileimage-kk" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-kk" @if ($user->photo_kk == NULL) value="" @else value="{{$user->photo_kk}}" @endif >
                                      <a href="{{$user->photo_kk ? $user->photo_kk : '#'}}" class="btn btn-sm btn-success" target="_blank"> Preview</a>

                                  </div>

                                  <div class="col-sm-4">

                                    <label for="">KTPelajar / KTM </label>
                                    <img @if ($user->photo_ktm == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_ktm}}"  @endif id="profileimage-ktm" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-ktm" @if ($user->photo_ktm == NULL) value="" @else value="{{$user->photo_ktm}}" @endif >
                                      <a href="{{$user->photo_ktm ? $user->photo_ktm : '#'}}" class="btn btn-sm btn-success" target="_blank"> Preview</a>

                                  </div>

                                </div>
                                <div class="row">
                                  <hr>
                                </div>

                                

                                <div class="row">
                                  <hr>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <label for="">Foto Rumah dari Depan</label>
                                    <img @if ($user->photo_home_front == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_front}}"  @endif id="profileimage-home-front" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-home-front" @if ($user->photo_home_front == NULL) value="" @else value="{{$user->photo_home_front}}" @endif >
                                  </div>

                                  <div class="col-sm-6">
                                    <label for="">Foto Rumah dari Belakang</label>
                                    <img @if ($user->photo_home_out == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_out}}"  @endif id="profileimage-home-out" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-home-out" @if ($user->photo_home_out == NULL) value="" @else value="{{$user->photo_home_out}}" @endif >
                                  </div>
                                </div>

                                <div class="row" style="margin-bottom:100px">
                                  <div class="col-sm-6">
                                    <label for="">Foto Rumah dari Samping</label>
                                    <img @if ($user->photo_home_side == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_side}}"  @endif id="profileimage-home-side" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-home-side" @if ($user->photo_home_side == NULL) value="" @else value="{{$user->photo_home_side}}" @endif >
                                  </div>

                                  <div class="col-sm-6">
                                    <label for="">Foto Rumah bagian Dalam</label>
                                    <img @if ($user->photo_home_in == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_in}}"  @endif id="profileimage-home-in" class="img img-responsive" alt="">
                                    <input type="hidden" name="primary_image" id="img-profile-home-in" @if ($user->photo_home_in == NULL) value="" @else value="{{$user->photo_home_in}}" @endif >
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                              <div class="pull-right">
                                {{-- <input type='submit' class='btn btn-next btn-fill btn-default btn-wd btn-sm' id="save-draft" name='save' value='Save Draft' /> --}}
                                {{-- <input type='submit' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='save' value='Next' /> --}}

                              </div>


                              <div class="clearfix"></div>
                            </div>
                          </form>
                        </div>
                      </div>

                      {{-- <tbody>
                        <tr>
                          <th>TTL</th>
                          <td>{{$user->born_place}}, {{$user->born_date->format('d-m-Y')}}</td>
                          <th>Agama</th>
                          <td>{{$user->religion}}</td>
                          <th>Tinggi Badan</th>
                          <td>{{$user->body_length}} cm</td>
                          <th>Berat Badan</th>
                          <td>{{$user->body_weight}} cm</td>
                        </tr>
                        <tr>
                          <th>Facebook</th>
                          <td>facebook.com/{{$user->facebook_id}}</td>
                          <th>Instagram</th>
                          <td>@ {{$user->instagram_id}}</td>
                          <th>Blog</th>
                          <td>{{$user->blog_id}}</td>
                          <th>NIK/KTP</th>
                          <td>{{$user->nik_ktp}}</td>
                        </tr>
                      </tbody> --}}



                  </div>
                </div>


          </div>
        </div>

    </div>
  </div>
  <div class="row">

    <hr>

  </div>

  {{-- Komponen Penilaian --}}

  @if (isset($_GET['seleksi']))
    <div class="seleksi-wrapper" >
      <div class="row">
        <div class="col-md-12 text-center">
          <button class="btn btn-fill btn-block btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Penilaian
          </button>
        </div>
      </div>
      <div class="collapse" id="collapseExample" style="overflow: scroll !important; max-height: 600px !important;">

        @foreach (App\models\stage::all() as $stage)
          <div class="row">
            <div class="col-md-12">
              <h5>{{$stage->stage_name}}</h5>
              <hr>
            </div>
          </div>
          @foreach ($stage->parameters()->get()->chunk(6) as $parameters)
            <div class="">
              <div class="row">
                @foreach ($parameters as $parameter)
                  <div class="col-md-2">
                    <div class="form-group">
                      <label style="font-size: 10pt; font-weight: 100;" for="">{{$parameter->parameter_name}} (0-{{$parameter->skala}})</label>

                      <div class="">

                        <form class="" action="{{route('score.each.save')}}" method="post" style="display: inherit;">
                          {{ csrf_field() }}

                          <input class="form-control input-sm parameter-seleksi" min="0"
                          max="{{$parameter->skala}}"
                          step="0.01"
                          name="{{$parameter->id}}"
                          @if ($user->parameters()->where('parameter_id', $parameter->id)->first() !== NULL)
                            @if ($user->parameters()->where('parameter_id', $parameter->id)->first()->pivot->lock == "1")
                              disabled
                              type="password"
                            @else
                              type="number"
                            @endif
                          @else
                            type="number"
                          @endif
                          value="{{$user->parameters()->where('parameter_id', $parameter->id)->first() !== NULL ? $user->parameters()->where('parameter_id', $parameter->id)->first()->pivot->score : '0'}}"
                          id="" placeholder="">

                          <input
                          {{-- type="text" --}}
                          class="form-control"
                          placeholder="komentar"
                          style="font-size:8pt"
                          name="comment"
                          value="{{$user->parameters()->where('parameter_id', $parameter->id)->first() !== NULL ? $user->parameters()->where('parameter_id', $parameter->id)->first()->pivot->comment : ''}}"
                          @if ($user->parameters()->where('parameter_id', $parameter->id)->first() !== NULL)
                            @if ($user->parameters()->where('parameter_id', $parameter->id)->first()->pivot->lock == "1")
                              disabled
                              type="password"
                            @else
                              type="text"
                            @endif
                          @else
                            type="text"
                          @endif
                          >

                          <input type="hidden" name="parameter_id" value="{{$parameter->id}}">
                          <input type="hidden" name="user_id" value="{{$user->id}}">

                          @if ($user->parameters()->where('parameter_id', $parameter->id)->first() == NULL || $user->parameters()->where('parameter_id', $parameter->id)->first()->pivot->lock == "0")
                            <button type="submit" class="btn btn-sm btn-block btn-fill btn-success">
                              Save
                            </button>
                          @endif



                        </form>

                        @if ($user->parameters()->where('parameter_id', $parameter->id)->first() !== NULL)
                          @if ($user->parameters()->where('parameter_id', $parameter->id)->first()->pivot->lock == "0")
                            <span class="grup-lock">
                              <form class="" action="{{route('score.lock')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="parameter_id" value="{{$parameter->id}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">

                                <button type="submit" class="btn btn-block btn-sm btn-fill btn-default lock-this">
                                  Lock
                                </button>
                              </form>
                            </span>
                          @endif
                        @endif

                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach

        @endforeach
      </div>

        {{-- <div class="row">
          <div class="col-md-12">
            <button type="button" id="save-score" class="btn btn-block btn-default">
              Save
            </button>
          </div>
        </div> --}}
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#save-score').on('click', function() {
          var nilai = $('.parameter-seleksi').serialize();
          console.log(nilai)

          $.ajax({
            url: '{{route('score.save')}}',
            type: 'POST',
            dataType: 'json',
            data: {
              "_token": "{{ csrf_token() }}",
              "score": nilai,
              "user_id":{{$user->id}}
            }
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });




        });
      });
    </script>
  @endif


    @if (session()->has('saved'))
      <script type="text/javascript">
        swal({
            title:'{{session()->get('saved')}}',
            type:'success'
          },
        );
      </script>
    @endif
