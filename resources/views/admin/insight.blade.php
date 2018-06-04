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
              <select class="form-control" id="institution" name="sort">
                <option value="all">Semua Kampus</option>
                @foreach ($inst as $inst)
                  <option value="{{$inst->id}}">{{$inst->institution_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-control" id="sortby" name="sort">
                <option value="sum_sallary">Gaji Orang Tua</option>
                <option value="ipk">IPK</option>
                {{-- <option value="organization">Pengalaman Organisasi</option> --}}
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-control" id="sortby2" name="sort">
                <option value="sum_sallary">Gaji Orang Tua</option>
                <option value="ipk">IPK</option>
                {{-- <option value="organization">Pengalaman Organisasi</option> --}}
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" id="sum" name="sortsum">
                <option value="asc">Terbesar</option>
                <option value="desc">Terkecil</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" style="padding:10px">
                <button type="button" id="search" class="btn btn-block btn-success">Tampilkan</button>
            </div>
          </div>

        </div>
      </div>
    </div>




  </div>
  <div class="row" id="search-result">

    {{-- <div class="" id="search-result">

    </div>
 --}}

  </div>

  @section('script')
    {{-- <script src="{{asset('admin-ui/assets/js/vendor/jquery-2.1.4.min.js')}}"></script> --}}

    <script type="text/javascript">
      $('#search').on('click', function() {
        var institution = $('#institution').val();
        var sortby = $('#sortby').val();
        var sortby2 = $('#sortby2').val();
        var sum = $('#sum').val();
        var tes = searchproduct(institution, sortby, sortby2, sum);

      });

      function searchproduct(institution, sortby, sortby2, sum) {
        $('#loading').show();
        $('#search-result').load('/admin/insight/dataload',{
        "institution":institution, "sortby":sortby, "sortby2":sortby2, "sum":sum, "_token": "{{ csrf_token() }}" },
          function(){
          $('#loading').hide();
          $('#result-count').show();
        });

      }
  </script>

  @endsection

@endsection
