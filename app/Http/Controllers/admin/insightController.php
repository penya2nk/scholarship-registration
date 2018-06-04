<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\models\institution;
use Illuminate\Support\Facades\View;


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

    public function search()
    {
      $institution = [$_POST['institution']];
      $sortby = $_POST['sortby'];
      $sortby2 = $_POST['sortby2'];
      $sum = $_POST['sum'];

      $institu = institution::all();


      if ($_POST['institution'] == "all") {
        foreach ($institu as $inst) {
          $institution[]= $inst->id;
        }
      }


      if ($sortby == "ipk") {
          $sortby = "ipk_1";
      }



      if ($sortby2 == "ipk") {
          $sortby2 = "ipk_1";
      }

      $user = user::whereIn('university_id',$institution)->orderBy($sortby, $sum)->orderBy($sortby2, $sum)->get();


      $data = array('users' =>$user , );

      $view = View::make('admin.insight-thumbnail')->with($data);
    
      return $contents = (string) $view;


    }

    public function view_profile()
    {
      # code...
    }


}
