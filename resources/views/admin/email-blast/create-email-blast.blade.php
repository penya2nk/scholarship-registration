@extends('layouts.adminpage')

@section('title')
Create Email Blast
@endsection

@section('right-header')
  <a href="#" style="margin: 10px;" id="send-email" class="btn btn-success"><span class="fa fa-send"></span> Send</a>
@endsection

@section('css-section')
  <link href="{{asset('summernote/summernote.css')}}" rel="stylesheet">
  <script src="{{asset('summernote/summernote.js')}}"></script>
@endsection


@section('content')

  <form id="email-form" data-toggle="validator" class="" action="{{route('admin.email.send')}}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-lg-10 justify-content-center" style="margin:auto">
      <div class="card">
        <div class="card-header"><strong>E-Mail</strong> Info</div>
        <div class="card-body card-block">
          <div class="form-group">
            <label for="">Send To</label>
            <select required class="form-control" id="time-type" name="recepient">
              <option value="">--Select--</option>
              <option value="1">All Members</option>
              <option value="2">Registered Members</option>
              <option value="3">Submitted Members</option>
            </select>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="company" class=" form-control-label">Email Subject</label>
            <input type="text" required id="email-subject" name="email_subject"  placeholder="" class="form-control">
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="">CC</label>
            <input type="text" name="cc" class="form-control" id="cc" placeholder="">
          </div>

        </div>
      </div>
    </div>



  </div>

  <div class="row">
    <div class="col-lg-10 justify-content-center" style="margin:auto">
      <div class="card">
        <div class="card-header"><strong>E-Mail</strong> Body</div>
        <div class="card-body card-block">
          <div class="form-group">
            <textarea required name="message" class="form-control wy-note" rows="8" cols="80"></textarea>
            <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-lg-10 justify-content-center" style="margin:auto">
      <div class="card">
        <button type="submit" class="btn btn-warning">Send</button>
      </div>
    </div>
  </div>

</form>



  @section('script')
    <script type="text/javascript">
    $(document).ready(function($) {
      $('.wy-note').summernote(
        {
          tabsize: 2,
          width: "90%",                 // set editor height
          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor
          dialogsInBody: true,
          height: 250,
          popover: {
           image: [],
           link: [],
           air: []
         }
        }
      );
      });
    </script>

  @endsection

@endsection
