<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\models\institution;

class insightController extends Controller
{
    public function insight()
    {
      $inst = institution::all();

      $data = array(
        'inst' => $inst,

      );

      return view('admin.insight')->with($data);
    }

    public function view_profile()
    {
      # code...
    }
}
