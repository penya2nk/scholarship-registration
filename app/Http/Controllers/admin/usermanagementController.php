<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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



}
