<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use DataTables;
use App\User;
use Carbon\Carbon;
use App\models\parameter;
use App\models\stage;



class seleksiController extends Controller
{
    public function index()
    {
      return view('admin.seleksi');
    }

    public function member_data()
    {
      $users = User::where('final_submit',1)->get();

      foreach ($users as $key => $user) {

        $institution = $user->institution['institution_name'];
        if ($institution !== NULL) {
          $institution = explode('(',$institution);
          $institution = "-".str_replace(')', '',$institution[1])."-";
        }else {
          $institution = '';
        }

        $validation = app('App\Http\Controllers\admin\ValidationController')->count_null($user->email);

        if ($validation['fill_percent'] == 100) {
             $bar_progress = 'progress-bar-success';
           }elseif ($validation['fill_percent'] >80) {
             $bar_progress = 'progress-bar-info';
           }elseif ($validation['fill_percent'] > 40) {
             $bar_progress = 'progress-bar-warning';
           }else {
             $bar_progress = 'progress-bar-danger';
           }

           $progress_bar = '<div class="progress">
           <div class="progress-bar progress-bar-striped '.$bar_progress.' active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$validation['fill_percent'].'%">
           '.$validation['fill_percent'].' %
           </div>
           </div>';

           if ($user->final_submit == 1) {
             $submit_status = '<button class="btn btn-sm btn-warning"> submitted </button>';
           }else {
             $submit_status = '';
           }

           if ($user->gender = "L") {
             $gender = "Laki-Laki";
           }elseif ($user->gender = "P") {
             $gender = "Perempuan";
           }else {
             $gender= "";
           }




           if ($user->generation !== NULL) {
             $year = $user->generation;
             $semt_1 = Carbon::createFromDate($user->generation,9,1,'Asia/Jakarta');
             $now = Carbon::now();
             $diff = $semt_1->diffInMonths($now);

             if ($diff < 6) {
               $semester = 1;
             }elseif ($diff < 12) {
               $semester = 2;
             }elseif ($diff < 18) {
               $semester = 3;
             }elseif ($diff < 24) {
               $semester = 4;
             }elseif ($diff < 30) {
               $semester = 5;
             }elseif ($diff < 36) {
               $semester = 6;
             }elseif ($diff < 42) {
               $semester = 7;
             }elseif ($diff < 48) {
               $semester = 8;
             }elseif ($diff < 54) {
               $semester = 9;
             }else {
               $semester = ">9";
             }

           }else {
             $semester = "-";
           }


        $row = array();
          $row["name"] = $user->name;
          $row["phone"] = $user->phone;
          $row["email"] = $user->email;
          $row["univ"] = $institution;
          $row["progress"]=$validation['fill_percent'];
          $row["status"]=$user->final_submit;
          $row["gender"] = $gender;
          $row["register"] = $user->created_at->format('d-M');
          $row["user_id"] = $user->id;
          $row["photo_profile"] = $user->photo_profile;
          $row["address"] = $user->address;
          $row["born_place"] = $user->born_place;
          $row["born_date"] = $user->born_date !== NULL ? $user->born_date->format('d-m-Y'): '-';
          $row["anak_ke"] = $user->anak_ke;
          $row["bersaudara"] = $user->bersaudara;
          $row["university"] = $user->university_id !== NULL ? $user->institution->institution_name : '-';
          $row["nip_mahasiswa"] = $user->nip_mahasiswa;
          $row["faculty"] = $user->faculty;
          $row["mayor"] = $user->mayor;
          $row["religion"] = $user->religion;
          $row["nik_ktp"] = $user->nik_ktp;
          $row["body_length"] = $user->body_length;
          $row["body_weight"] = $user->body_weight;
          $row["instagram_id"] = $user->instagram_id;
          $row["facebook_id"] = $user->facebook_id;
          $row["blog_address"] = $user->blog_address;
          $row["generation"] = $user->generation;

          $row["semester"] = $semester;

          $row["ayah_name"] = $user->ayah_name;
          $row["ayah_suku"] = $user->ayah_suku;
          $row["ayah_tempat_lahir"] = $user->ayah_tempat_lahir;
          $row["ayah_tanggal_lahir"] = $user->ayah_tanggal_lahir;
          $row["ayah_pendidikan"] = $user->ayah_pendidikan;
          $row["ayah_pekerjaan"] = $user->ayah_pekerjaan;
          $row["ayah_penghasilan"] = $user->ayah_penghasilan;
          $row["ayah_tanggungan"] = $user->ayah_tanggungan;
          $row["ayah_alamat"] = $user->ayah_alamat;
          $row["ayah_phone"] = $user->ayah_phone;
          $row["ayah_wafat"] = $user->ayah_wafat == "1" ? "Wafat" : '-';

          $row["ibu_name"] = $user->ibu_name;
          $row["ibu_suku"] = $user->ibu_suku;
          $row["ibu_tempat_lahir"] = $user->ibu_tempat_lahir;
          $row["ibu_tanggal_lahir"] = $user->ibu_tanggal_lahir;
          $row["ibu_pendidikan"] = $user->ibu_pendidikan;
          $row["ibu_pekerjaan"] = $user->ibu_pekerjaan;
          $row["ibu_penghasilan"] = $user->ibu_penghasilan;
          $row["ibu_tanggungan"] = $user->ibu_tanggungan;
          $row["ibu_alamat"] = $user->ibu_alamat;
          $row["ibu_phone"] = $user->ibu_phone;
          $row["ibu_wafat"] = $user->ibu_wafat == "1" ? "Wafat" : '-';

          $row["lifeplan_summary"] = $user->lifeplan_summary;
          $row["commitment"] = $user->commitment;
          $row["why_accepted"] = $user->why_accepted;
          $row["photo_ktp"] = $user->photo_ktp;
          $row["photo_kk"] = $user->photo_kk;
          $row["photo_ktm"] = $user->photo_ktm;
          $row["photo_sktm"] = $user->photo_sktm;
          $row["photo_parent_sallary"] = $user->photo_parent_sallary;
          $row["photo_transcript_score"] = $user->photo_transcript_score;
          $row["photo_active_student"] = $user->photo_active_student;

          $row["photo_home_front"] = $user->photo_home_front;
          $row["photo_home_side"] = $user->photo_home_side;
          $row["photo_home_in"] = $user->photo_home_in;
          $row["photo_home_out"] = $user->photo_home_out;
          $row["ip_1"] = $user->ip_1;
          $row["ip_2"] = $user->ip_2;
          $row["ip_3"] = $user->ip_3;
          $row["ip_4"] = $user->ip_4;

          $row["ipk_1"] = $user->ip_1;
          $row["ipk_2"] = $user->ip_2;
          $row["ipk_3"] = $user->ip_3;
          $row["ipk_4"] = $user->ip_4;

          $row["toefl"] = $user->toefl;
          $row["sum_sallary"] = $user->sum_sallary;


          // $row[] = $user->name;
          $data[] = collect($row);
      }



      return Datatables::of($data)->make(true);
    }

    // CRUD TAHAPAN SELEKSI

    public function stage_index()
    {

      $stage = stage::all();

      $data = array('stages' =>$stage , );
      return view('admin.stagepenilaian')->with($data);
    }

    public function stage_post(Request $request)
    {
      $add = new stage;
      $add->stage_name = $request->stage;
      $add->start_date = $request->start_date;
      $add->end_date = $request->end_date;
      $add->color = $request->color;

      $add->save();

      return redirect()->route('stage.index')->with('alert','Menambahkan');
    }

    public function stage_edit(Request $request)
    {
      $add = stage::find($request->stage_edit_id);
      $add->stage_name = $request->stage_name;
      $add->start_date = $request->start_date;
      $add->end_date = $request->end_date;
      $add->color = $request->color;
      $add->save();

      return redirect()->route('stage.index')->with('alert','Edit');

    }

    public function stage_delete(Request $request)
    {
      $delete = stage::find($request->stage_id_delete);
      $delete->delete();

      return redirect()->route('stage.index')->with('alert_delete','success');
    }



    // CRUD PARAMETER
    public function parameter_index()
    {

      $parameter = parameter::all();
      $stage = stage::all();

      $data = array(
        'parameters' =>$parameter,
        'stages' =>$stage ,
      );
      return view('admin.parameterpenilaian')->with($data);
    }

    public function parameter_post(Request $request)
    {
      $add = new parameter;
      $add->parameter_name = $request->parameter;
      $add->skala = $request->skala;
      $add->stage_id = $request->stage_id;
      $add->percentage = $request->percentage;

      $add->save();

      return redirect()->route('parameter.index')->with('alert','Menambahkan');
    }

    public function parameter_edit(Request $request)
    {
      $add = parameter::find($request->parameter_edit_id);
      $add->parameter_name = $request->parameter_name;
      $add->stage_id = $request->stage_id;
      $add->skala = $request->skala;
      $add->percentage = $request->percentage;
      $add->save();

      return redirect()->route('parameter.index')->with('alert','Edit');

    }

    public function parameter_delete(Request $request)
    {
      $delete = parameter::find($request->parameter_id_delete);
      $delete->delete();

      return redirect()->route('parameter.index')->with('alert_delete','success');
    }

    public function save_score()
    {
      $request = $_REQUEST['score'];
      $user_id = $_REQUEST['user_id'];
      $explodes = explode('&',$request);

      foreach ($explodes as $value) {
        // Memecah = menjadi satuan
        $scores = explode('=', $value);
        $id_parameter = $scores[0];
        $score = $scores[1];

        $user = user::find($user_id);

        $count_exist = $user->parameters()->where('parameter_id', $id_parameter)->first();
        // dd($count_exist !== NULL);

        if ($count_exist !== NULL) {
          $user->parameters()->updateExistingPivot($id_parameter, ['score' => $score, 'user_submit'=>Auth::user()->name]);
        }else {
          $user->parameters()->attach($id_parameter, ['score' => $score, 'user_submit'=>Auth::user()->name]);
        }

      }

      dd("berhasil Save");

    }

    public function lock_score(Request $request)
    {
      $parameter_id = $_REQUEST['parameter_id'];
      $user_id = $_REQUEST['user_id'];
      $user = user::find($user_id);

      $user->parameters()->updateExistingPivot($parameter_id, ['lock' => 1]);

      return redirect('/admin/profile/view/'.$user_id.'?seleksi=true');


    }

    public function save_score_each(Request $request)
    {

      $parameter = $request->parameter_id;
      $user_id = $request->user_id;
      $scores = $request->$parameter;

      $id_parameter = $parameter;
      $score = $scores;

      $user = user::find($user_id);

      $count_exist = $user->parameters()->where('parameter_id', $id_parameter)->first();
      // dd($count_exist !== NULL);

      if ($count_exist !== NULL) {
        $user->parameters()->updateExistingPivot($id_parameter, ['score' => $score, 'user_submit'=>Auth::user()->name]);
      }else {
        $user->parameters()->attach($id_parameter, ['score' => $score, 'user_submit'=>Auth::user()->name]);
      }

      return redirect('/admin/profile/view/'.$user_id.'?seleksi=true');

    }
}
