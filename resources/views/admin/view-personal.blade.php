@extends('layouts.adminpage')

@section('title')
{{$user->name}}
  <a  href="{{route('profile.print',['id'=>$user->id])}}" class="btn btn-sm btn-default" style="margin-left:10px">
    <span class="menu-icon fa fa-print"></span>
  </a>

@endsection

@section('content')

  <link href="{{asset('assets/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

  <div class="row justify-content-center">
    <div class="col-sm-10">

        <div class="tab-content">
          <div class="container">

                <div class="row">
                  <div class="col-sm-12">

                    {{-- Primary Identity --}}
                    <div class="row">
                      <div class="col-sm-4">
                        <img class="img img-responsive" src="{{$user->photo_profile}}" alt="">
                        <img @if ($user->photo_home_in == NULL) src="{{asset('images/photonull/ktpnull.jpg')}}" @else src="{{$user->photo_home_in}}"  @endif class="img img-responsive" alt="" style="margin-top :10px">

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
                      <div class="row">
                        <div class="col-md-3">
                          <h4><b>Tempat, Tanggal Lahir</b></h4>
                          <p>{{$user->born_place}}, <br> {{$user->born_date ? $user->born_date->format('d-m-Y'): ''}}</p>
                        </div>
                        <div class="col-md-3">
                          <h4><b>Agama</b></h4>
                          <p>{{$user->religion}}</p>
                        </div>
                        <div class="col-md-3">
                          <h4><b>Tinggi Badan</b></h4>
                          <p>{{$user->body_length}} cm</p>
                        </div>
                        <div class="col-md-3">
                          <h4><b>Berat Badan</b></h4>
                          <p>{{$user->body_weight}} kg</p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                          <h4><b>Facebook</b></h4>
                          <p>
                            <a href="http://www.facebook.com/{{$user->facebook_id}}" class="btn btn-primary btn-fill" target="_blank">{{$user->facebook_id}}</a>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <h4><b>Instagram</b></h4>
                          <a href="http://www.instagram.com/{{$user->instagram_id}}" class="btn btn-primary btn-fill" target="_blank">@ {{$user->instagram_id}}</a>
                        </div>
                        <div class="col-md-3">
                          <h4><b>Blog</b></h4>
                          <p>
                            @if ($user->blog_id == NULL)
                              -
                            @else
                              <a href="http://{{$user->blog_id}}" class="btn btn-primary btn-fill" target="_blank">{{$user->blog_id}}</a>
                            @endif

                          </p>
                        </div>
                        <div class="col-md-3">
                          <h4><b>NIK/KTP</b></h4>
                          <p>{{$user->nik_ktp}}</p>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-12">
                          <hr>

                          <div class="col-md-6">
                            <h3><b>Ayah</b></h3>
                            <h3>{{$user->ayah_name}}</h3>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th>TTL</th>
                                  <td>{{$user->ayah_tempat_lahir}}, {{$user->ayah_tanggal_lahir ? $user->ayah_tanggal_lahir->format('d-m-Y'): ''}}</td>
                                </tr>
                                <tr>
                                  <th>Alamat</th>
                                  <td>{{$user->ayah_alamat}}</td>
                                </tr>
                                <tr>
                                  <th>Suku</th>
                                  <td>{{$user->ayah_suku}}</td>
                                </tr>
                                <tr>
                                  <th>Pendidikan Terakhir</th>
                                  @php
                                    $pendidikan_ayah = explode(' ',$user->ayah_pendidikan);
                                  @endphp
                                  <td>{{$pendidikan_ayah[1]}}</td>
                                </tr>
                                <tr>
                                  <th>Pekerjaan</th>
                                  <td>{{$user->ayah_pekerjaan}}</td>
                                </tr>
                                <tr>
                                  <th>Penghasilan / Bulan</th>
                                  <td>Rp. {{$user->ayah_penghasilan ? format_uang($user->ayah_penghasilan) : ''}}</td>
                                </tr>
                                <tr>
                                  <th>Nomor HP</th>
                                  <td>{{$user->ayah_phone}}</td>
                                </tr>
                                <tr>
                                  <th>Jumlah Tanggungan</th>
                                  <td>{{$user->ayah_tanggungan}} orang</td>
                                </tr>
                              </tbody>
                            </table>

                          </div>
                          <div class="col-md-6">
                            <h3><b>Ibu</b></h3>
                            <h3>{{$user->ibu_name}}</h3>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th>TTL</th>
                                  <td>{{$user->ibu_tempat_lahir}}, {{$user->ibu_tanggal_lahir ? $user->ibu_tanggal_lahir->format('d-m-Y'): ''}}</td>
                                </tr>
                                <tr>
                                  <th>Alamat</th>
                                  <td>{{$user->ibu_alamat}}</td>
                                </tr>
                                <tr>
                                  <th>Suku</th>
                                  <td>{{$user->ibu_suku}}</td>
                                </tr>
                                <tr>
                                  <th>Pendidikan Terakhir</th>
                                  @php
                                    $pendidikan_ibu = explode(' ',$user->ibu_pendidikan);
                                  @endphp
                                  <td>{{$pendidikan_ibu[1]}}</td>
                                </tr>
                                <tr>
                                  <th>Pekerjaan</th>
                                  <td>{{$user->ibu_pekerjaan}}</td>
                                </tr>
                                <tr>
                                  <th>Penghasilan / Bulan</th>
                                  <td>Rp. {{$user->ibu_penghasilan ? format_uang($user->ibu_penghasilan): ''}}</td>
                                </tr>
                                <tr>
                                  <th>Nomor HP</th>
                                  <td>{{$user->ibu_phone}}</td>
                                </tr>
                                <tr>
                                  <th>Jumlah Tanggungan</th>
                                  <td>{{$user->ibu_tanggungan}} orang</td>
                                </tr>
                              </tbody>
                            </table>


                          </div>

                        </div>
                      </div>

                      <div class="row">
                        <hr>
                        <div class="col-md-12">

                          @if ($user->organizations()->count() !== 0)
                          <h3><b>Pengalaman Organisasi</b></h3>
                          <div class="@if($user->organizations()->count() >4) column-2 @endif">
                            <ul>
                              @foreach ($user->organizations as $org)
                                <li>
                                  <h4 class="">
                                    <b>{{$org->organization}}</b>
                                  </h4>
                                  <p class="no-margin">{{$org->date_from ? $org->date_from->format('d M Y'): ''}} - {{$org->date_end ? $org->date_end->format('d M Y'): ''}}</p>
                                  <p class="no-margin">{{$org->positions->position_name}} {{$org->position}}</p>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <hr>
                          @endif

                          @if ($user->committees()->count() !== 0)
                          <h3><b>Pengalaman Kepanitiaan</b></h3>
                          <div class="@if($user->committees()->count() >4) column-2 @endif">
                            <ul>
                              @foreach ($user->committees as $com)
                                <li>
                                  <h4 class="">
                                    <b>{{$com->committee_name}}</b>
                                  </h4>
                                  <p class="no-margin">{{$com->date_from ? $com->date_from->format('d M Y'): ''}} - {{$com->date_end ? $com->date_end->format('d M Y') : ''}}</p>
                                  <p class="no-margin">{{$com->position_name ? $com->positions->position_name : ''}} {{$com->position}}</p>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <hr>
                          @endif

                          @if ($user->trainings()->count() !== 0)
                          <h3><b>Pengalaman Pelatihan / Kursus</b></h3>
                          <div class="@if($user->trainings()->count() >4) column-2 @endif">
                            <ul>
                              @foreach ($user->trainings as $train)
                                <li>
                                  <h4 class="">
                                    <b>{{$train->training}}</b>
                                  </h4>
                                  <p class="no-margin">{{$train->date ? $train->date->format('d M Y'): ''}}</p>
                                  <p class="no-margin">{{$train->content}} | {{$train->organizer}}</p>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <hr>
                          @endif

                          @if ($user->competitions()->count() !== 0)
                          <h3><b>Prestasi Kompetisi dan Kejuaraan Terbaik</b></h3>
                          <div class="@if($user->competitions()->count() >=4) column-2 @endif">
                            <ul>
                              @foreach ($user->competitions as $comp)
                                <li>
                                  <h4 class="">
                                    <b>{{$comp->title}}</b>
                                  </h4>
                                  <span class="badge">{{$comp->level}} | {{$comp->type}}</span>
                                  <p class="no-margin">{{$comp->competition_name}}</p>
                                  <p class="no-margin">{{$comp->location}}</p>
                                  <p class="no-margin">{{$comp->web}}</p>

                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <hr>
                          @endif

                          @if ($user->charities()->count() !== 0)
                          <h3><b>Aktivitas Sosial dan Kerelawanan</b></h3>
                          <div class="@if($user->charities()->count() >=4) column-2 @endif">
                            <ul>
                              @foreach ($user->charities as $char)
                                <li>
                                  <h4 class="">
                                    <b>{{$char->activity_name}}</b>
                                  </h4>
                                  <p class="no-margin">{{$char->role}}</p>
                                  <p class="no-margin">{{$char->location}}</p>
                                  <p class="no-margin">+/- <span class="badge">{{$char->person_impacted}}</span> orang penerima manfaat</p>

                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <hr>
                          @endif

                          @if ($user->publications()->count() !== 0)
                          <h3><b>Artikel dan/atau karya tulis yang pernah dipublikasikan</b></h3>
                          <div class="">
                            <ul>
                              @foreach ($user->publications as $pub)
                                <li>
                                  <h4 class="">
                                    <b>{{$pub->publication_name}}</b>
                                  </h4>
                                  <p class="no-margin">{{$pub->year}} | {{$pub->role}}</p>
                                  <p class="no-margin">{{$pub->author}}</p>
                                  <p class="no-margin">{{$pub->abstract}}</p>

                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <hr>
                          @endif


                        </div>
                      </div>

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
                                        <span class="input-group-addon">
                                          <a class="btn btn-fill btn-sm btn-success" href="{{$user->photo_sktm}}" target="_blank">Download</a>
                                        </span>
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
                                        <span class="input-group-addon">
                                          <a class="btn btn-fill btn-sm btn-success" href="{{$user->photo_parent_sallary}}" target="_blank">Download</a>
                                        </span>
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
                                        <span class="input-group-addon">
                                          <a class="btn btn-fill btn-sm btn-success" href="{{$user->photo_transcript_score}}" target="_blank">Download</a>
                                        </span>
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
                                        <span class="input-group-addon">
                                          <a class="btn btn-fill btn-sm btn-success" href="{{$user->photo_active_student}}" target="_blank">Download</a>
                                        </span>
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

  @section('script')

    @if (session()->has('saved'))
      <script type="text/javascript">
        swal({
            title:'{{session()->get('saved')}}',
            type:'success'
          },
        );
      </script>
    @endif

  @endsection

@endsection
