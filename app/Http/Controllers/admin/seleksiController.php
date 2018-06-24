<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;


class seleksiController extends Controller
{
    public function index()
    {
      return view('admin.seleksi');
    }

    public function member_data()
    {
      $users = User::all();

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

        $row = array();
          $row["name"] = $user->name;
          $row["phone"] = $user->phone;
          $row["email"] = $user->email;
          $row["univ"] = $institution;
          $row["progress"]=$validation['fill_percent'];
          $row["status"]=$user->final_submit;
          $row["gender"] = $gender;
          $row["register"] = $user->created_at->format('d-M');
          // $row[] = $user->name;
          $data[] = collect($row);
      }



      return Datatables::of($data)->make(true);
    }
}
