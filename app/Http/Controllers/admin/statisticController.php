<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\institution;
use Carbon\Carbon;
use Activity;
use App\User;

class statisticController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('checkadmin');
    }

    public function index()
    {
      $activities = Activity::users(1)->count();

      // Potensi Submitted

      $users = User::all();

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

      $laki = user::where('gender', 'L')->count();
      $perempuan = user::where('gender', 'P')->count();

      $data = array(
        'labels' =>$days,
        'user_registered' =>$user_registered,
        'user_submitted' =>$user_submitted,
        'university_labels'=>$university_label,
        'user_online'=>$activities,
        'laki'=>$laki,
        'perempuan'=>$perempuan,
        'potensi'=>$potensi
       );

      return view('admin.statistic')->with($data);
    }

    public function user_registered()
    {

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


        foreach ($hari as $key => $date) {
          $count_registered[] = User::whereDate('created_at', $date)->count();
          $count_submited[] = User::whereDate('created_at', $date)->where('final_submit', 1)->count();

        }

      $user_count_10[] = array(
            'label' =>'Registered' ,
            'data'  => $count_registered,
            'borderColor'  => '#42b648',
            'backgroundColor' => '#42b648'
          );

      $user_count_10[] = array(
            'label' =>'Submitted' ,
            'data'  => $count_submited,
            'borderColor'  => '#ffb000',
            'backgroundColor' => '#ffb000'
          );

      return response()->json($user_count_10);
    }

    public function user_university()
    {

      $univs = institution::all();

      foreach ($univs as $key => $univ) {
        $count_univ = User::where('university_id', $univ->id)->count();
        $label_univ = $univ->institution_name;

        if ($univ->id == 1) {
          $color = "#fad900";
        }elseif ($univ->id == 2) {
          $color = "#42b648";
        }elseif ($univ->id == 3) {
          $color = "#ff8a00";
        }elseif ($univ->id == 4) {
          $color = "#1aa1cc";
        }elseif ($univ->id == 5) {
          $color = "#b844ac";
        }elseif ($univ->id == 6) {
          $color = "#969696";
        }

        $university_acc_10[] = array(
              'label' =>$label_univ ,
              'data'  => [$count_univ],
              'borderColor'  => $color,
              'backgroundColor' => $color
            );
      }



      return response()->json($university_acc_10);
    }

    public function user_university_submitted()
    {

      $univs = institution::all();

      foreach ($univs as $key => $univ) {
        $count_univ = User::where([['university_id', $univ->id],['final_submit', 1]])->count();
        $label_univ = $univ->institution_name;

        if ($univ->id == 1) {
          $color = "#fad900";
        }elseif ($univ->id == 2) {
          $color = "#42b648";
        }elseif ($univ->id == 3) {
          $color = "#ff8a00";
        }elseif ($univ->id == 4) {
          $color = "#1aa1cc";
        }elseif ($univ->id == 5) {
          $color = "#b844ac";
        }elseif ($univ->id == 6) {
          $color = "#969696";
        }

        $university_acc_10[] = array(
              'label' =>$label_univ ,
              'data'  => [$count_univ],
              'borderColor'  => $color,
              'backgroundColor' => $color
            );
      }



      return response()->json($university_acc_10);
    }
}
