<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DataTables;

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



}
