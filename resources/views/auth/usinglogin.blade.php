@extends('layouts.adminpage')

@section('title')
Admin Members
@endsection

@section('content')
  <form class="" action="{{route('admin.loginusing.post')}}" method="post">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">Login Using</div>
          <div class="card-body card-block">
            <div class="form-group">
              <div class="input-group">
                <input type="email" id="email-admin" name="email_user" placeholder="email" class="form-control">
              </div>
            </div>

            <div class="form-actions form-group">
              <button type="submit" id="add-admin" class="btn btn-success btn-sm">Login Using</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="row">



  </div>



@endsection
