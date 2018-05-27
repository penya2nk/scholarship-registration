@extends('layouts.adminpage')

@section('title')
Student Insight
@endsection

@section('content')
  <div class="row">


    <div class="col-lg-12">
      <div class="card">
        {{-- <div class="card-header">Panel Insight</div> --}}
        <div class="card-body card-block">
          <div class="row">
            <div class="col-md-1">
              <label class="label">Urutkan</label>
            </div>
            <div class="col-md-3">
              <select class="form-control" id="sortby" name="sort">
                <option value="">-- Kampus --</option>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-control" id="sortby" name="sort">
                <option value="">Gaji Orang Tua</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" id="sortbysum" name="sortsum">
                <option value="">Terbesar</option>
                <option value="">Terkecil</option>
              </select>
            </div>
            <div class="col-md-3">
              <button type="button" class="btn btn-success">Cari</button>
            </div>
          </div>
        </div>
      </div>
    </div>




  </div>
  <div class="row">

    <div class="col-md-4">
              <aside class="profile-nav alt">
                  <section class="card">
                    <a href="#">
                      <div class="card-header user-header alt bg-dark" style="background-image:url('https://res.cloudinary.com/baguskah/image/upload/v1525628669/bazis/profpic/student-Bagus-Dwi-Utama-1525628667.jpg'); background-size:cover;">
                        <div class="media" style="background:rgba(0,0,0,0.7);">
                          <a href="#">
                          <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{Auth::user()->photo_profile}}">
                        </a>
                        <div class="media-body background-opacity">
                          <h4 class="text-light display-6">Bagus Dwi Utama</h4>
                          <p>UNJ 2012</p>
                          <div class="button-edit">
                            <a href="#" class="btn btn-success btn-sm">View</a>
                            {{-- <a href="#" class="btn btn-danger btn-sm">Delete</a> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>

                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                              <a href="#">
                                {{-- <i class="fa fa-envelope-o"></i> --}}
                                Total Gaji Orang Tua <span class="badge badge-primary pull-right">0</span></a>
                          </li>
                          <li class="list-group-item">
                              <a href="#">
                                {{-- <i class="fa fa-tasks"></i> --}}
                                IPK <span class="badge badge-danger pull-right">0</span></a>
                          </li>
                          <li class="list-group-item">
                              <a href="#">
                                {{-- <i class="fa fa-bell-o"></i> --}}
                                Candidate <span class="badge badge-success pull-right">0</span></a>
                          </li>
                          {{-- <li class="list-group-item">
                              <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
                          </li> --}}
                      </ul>
                  </section>
              </aside>
          </div>


  </div>

  @section('script')
    {{-- <script src="{{asset('admin-ui/assets/js/vendor/jquery-2.1.4.min.js')}}"></script> --}}


  @endsection

@endsection
