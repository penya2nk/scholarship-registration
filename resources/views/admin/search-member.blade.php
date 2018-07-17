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
              <label class="label">Cari</label>
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
              <select class="form-control" id="searchby" name="sort">
                <option value="name">Nama</option>
                <option value="email">E-mail</option>
                <option value="born_place">Tempat Lahir</option>
                <option value="faculty">Fakultas</option>
                <option value="mayor">Jurusan</option>
                <option value="lifeplan_summary">Life Plan</option>
                <option value="commitment">Komitmen</option>
                <option value="address">Alamat</option>
              </select>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <input type="text" class="form-control" id="keyword" placeholder="Keyword">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 text-center" style="padding:10px">
                <button type="button" id="search" class="btn btn-block btn-success">Tampilkan</button>
                <img style="width:30px; display:none; margin:auto" id="loading" class="loading-upload" src="{{asset('gif/loading-small.gif')}}" alt="">
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
        var searchby = $('#searchby').val();
        var keyword = $('#keyword').val();
        var sum = $('#sum').val();
        var tes = searchproduct(institution, searchby, keyword, sum);

      });

      function searchproduct(institution, searchby, keyword, sum) {
        $('#loading').show();
        $('#search').hide();
        $('#search-result').load('/admin/search/dataload',{
        "institution":institution, "searchby":searchby, "keyword":keyword, "_token": "{{ csrf_token() }}" },
          function(){
          $('#loading').hide();
          $('#search').show();
          $('#result-count').show();
        });

      }
  </script>

  @endsection

@endsection
