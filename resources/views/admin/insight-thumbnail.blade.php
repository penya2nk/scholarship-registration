@foreach ($users as $user)
  <div class="col-md-4">
    <aside class="profile-nav alt">
      <section class="card">
        <a href="#">
          <div class="card-header user-header alt bg-dark" style="background-image:url('{{$user->photo_home_front}}'); background-size:cover;">
            <div class="media" style="background:rgba(0,0,0,0.7);">
              <a href="#">
                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{$user->photo_profile}}">
              </a>
              <div class="media-body background-opacity">
                <h4 class="text-light display-6">{{$user->name}}</h4>
                <p>{{str_replace(')', '',explode('(',$user->institution->institution_name)[1])}} ({{$user->generation}})</p>
                <div class="button-edit">
                  <a href="{{route('member.user.preview',['id'=>$user->id])}}" class="btn btn-success btn-sm">View</a>
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
              Total Gaji Orang Tua <span class="badge badge-primary pull-right">{{$user->sum_sallary ? $user->sum_sallary : 0}}</span></a>
            </li>
            <li class="list-group-item">
              <a href="#">
                {{-- <i class="fa fa-tasks"></i> --}}
                IPK
                <span class="badge badge-danger ">{{$user->ipk_1 ? $user->ipk_1: "0.00"}}</span>
                <span class="badge badge-danger ">{{$user->ipk_2 ? $user->ipk_2: "0.00"}}</span>
                <span class="badge badge-danger ">{{$user->ipk_3 ? $user->ipk_3: "0.00"}}</span>
                <span class="badge badge-danger ">{{$user->ipk_4 ? $user->ipk_4: "0.00"}}</span>
              </a>
              </li>
              <li class="list-group-item">
                <a href="#">
                  {{-- <i class="fa fa-bell-o"></i> --}}
                  Pengalaman Organisasi <span class="badge badge-success pull-right">{{$user->organizations ? $user->organizations->count() : 0}}</span></a>
              </li>
              <li class="list-group-item">
                  Status <span class="badge badge-success pull-right">{{$user->stage_id == NULL  ? '-' : $user->stages->stage_name }}</span></a>
              </li>
                {{-- <li class="list-group-item">
                <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
              </li> --}}
            </ul>
          </section>
        </aside>
      </div>
@endforeach
