@extends('layouts.adminpage')

@section('title')
Email Blast
@endsection

@section('right-header')
  <a href="{{route('admin.email.create')}}" style="margin: 10px;" class="btn btn-success">add</a>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">E-Mail Blast History</div>
        <div class="card-body card-block">
            <table class="table">
              <thead>
                <th>No</th>
                <th>Subject</th>
                <th>Recipients</th>
                <th>Date</th>
                <th>Action</th>
              </thead>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($emails as $email)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$email->email_subject}}</td>
                    <td>{{$email->recepients}}</td>
                    <td>{{$email->created_at->format('d-m-Y H:i')}}</td>
                    <td></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>



  </div>
  <div class="row">



  </div>

  @section('script')
    @if (session()->has('alert'))
      <script type="text/javascript">
        swal({
            title:'{{session()->get('alert')}}',
            type:'success'
          },
        );
      </script>
    @endif

  @endsection

@endsection
