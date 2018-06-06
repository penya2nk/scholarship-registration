<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Activity;

use App\User;
use DataTables;
use Carbon\Carbon;
use App\models\institution;

class usermanagementController extends Controller
{

  public function add_admin_index()
  {
    $admins = User::where('userlevel', 1)->get();

    $data = array('admins' => $admins , );

    return view('admin.addadmin')->with($data);
  }

  public function add_remove_admin()
  {
    $email  = $_POST['email'];
    $id     = $_POST['status'];
    $user   = User::where('email', $email)->first();

    if ($id == 1) {
      $mode = 'add';
    }else {
      $mode = 'remove';
    }

    if ($user) {
      $user->userlevel = $id;
      $user->save();

      $data = array(
        'status' => 'success' ,
        'name'   => $user->name,
        'mode'   => $mode
       );
    }else {
      $data = array(
        'status' => 'error' ,
        'name'   => '',
        'mode'   => $mode
       );
    }

    return response()->json($data);
  }

  public function registered_user()
  {
    return view('admin.registered');
  }

  public function data_user_registered()
  {
    $users = User::all();

    foreach ($users as $key => $user) {

      $institution = $user->institution['institution_name'];
      if ($institution !== NULL) {
        $institution = explode('(',$institution);
        $institution = str_replace(')', '',$institution[1]);
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

      $row = array();
        $row["name"] = $user->name;
        $row["phone"] = $user->phone;
        $row["email"] = $user->email;
        $row["univ"] = $institution;
        $row["progress"]=$validation['fill_percent'];
        // $row[] = $user->name;
        $data[] = collect($row);
    }



    return Datatables::of($data)->make(true);

    // return DataTables::collection($data)->make(true);
  }

  public function login_using_index()
      {
        return view('auth.usinglogin');
      }

      public function login_using(Request $request)
      {

        if (Auth::user()->userlevel == 1) {

          $user = User::where('email', $request->email_user)->first();

          if ($user->userlevel !== 1) {
            $tes = Auth::login($user);
            return redirect('/')->withInput();
          }elseif (Auth::user()->email == "dwiutamabagus@gmail.com") {
            $tes = Auth::login($user);
            return redirect('/')->withInput();
          }
          else {
            return redirect('https://www.google.co.id/search?q=dalil+bahaya+kepo&oq=dalil+bahaya+kepo&aqs=chrome..69i57.3114j0j7&sourceid=chrome&ie=UTF-8');
          }


        }else {
          return redirect('https://www.google.co.id/search?q=dalil+bahaya+kepo&oq=dalil+bahaya+kepo&aqs=chrome..69i57.3114j0j7&sourceid=chrome&ie=UTF-8');
        }

      }


      public function submitted_user()
      {

        // Potensi Submitted

        $users = User::where('final_submit', 0)->get();

        $potensi = 0;

        foreach ($users as $key => $user) {
          $institution = $user->institution['institution_name'];
          if ($institution !== NULL) {
            $institution = explode('(',$institution);
            $institution = str_replace(')', '',$institution[1]);
          }else {
            $institution = '';
          }

          $validation = app('App\Http\Controllers\admin\ValidationController')->count_null($user->email);

          if ($validation['fill_percent'] > 50) {
               $potensi++;
             }
          }

        $activities = Activity::users(1)->count();


        $start_day1 = Carbon::create(2018, 5, 7, 0, 0, 0, 'Asia/Jakarta');
        $start_day = $start_day1->setTime(0, 0, 0);
        $start_day = date_format($start_day, 'Y-m-d');
        $start_day = strtotime($start_day);

        $end_day1 = Carbon::now();
        $end_day = $end_day1->setTime(23, 59, 59);
        $end_day = date_format($end_day, 'Y-m-d');
        $end_day = strtotime("+1 day", strtotime($end_day));

        $hari   = array();
        for ($i=$start_day; $i < $end_day ; $i+= (60*60*24)) {
            $hari[]=date("Y-m-d",$i);
          }

        foreach ($hari as $key => $date_label) {
          $days[] = Carbon::createFromFormat('Y-m-d',$date_label)->format('d M');
        }

        $user_registered = User::all()->count();
        $user_submitted = User::where('final_submit', 1)->count();


        $university_label = institution::all();

        $laki = user::where([['gender', 'L'],['final_submit', 1]])->count();
        $perempuan = user::where([['gender', 'P'],['final_submit', 1]])->count();

        $pres_laki = $laki / ($laki+$perempuan) * 100;
        $pres_perem = $perempuan / ($laki+$perempuan) * 100;


        $data = array(
          'labels' =>$days,
          'user_registered' =>$user_registered,
          'user_submitted' =>$user_submitted,
          'university_labels'=>$university_label,
          'user_online'=>$activities,
          'laki'=>$laki,
          'perempuan'=>$perempuan,
          'potensi' => $potensi,
          'pres_laki'=>$pres_laki,
          'pres_perem'=> $pres_perem
         );

        return view('admin.submitted')->with($data);
      }

      public function data_user_submitted()
      {
        $users = User::where('final_submit' , 1)->get();

        foreach ($users as $key => $user) {

          $institution = $user->institution['institution_name'];
          if ($institution !== NULL) {
            $institution = explode('(',$institution);
            $institution = str_replace(')', '',$institution[1]);
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


             $gender = $user->gender;
             $gaji = $user->sum_sallary;

          $row = array();
            $row["name"] = $user->name;
            $row["phone"] = $user->phone;
            $row["email"] = $user->email;
            $row["univ"] = $institution;
            $row["progress"]=$validation['fill_percent'];
            $row["gender"] = $gender;
            $row["sum_sallary"] = $gaji;
            // $row[] = $user->name;
            $data[] = collect($row);
        }



        return Datatables::of($data)->make(true);

        // return DataTables::collection($data)->make(true);
      }



}
