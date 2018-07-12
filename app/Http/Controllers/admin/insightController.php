<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\models\institution;
use Illuminate\Support\Facades\View;
use PDF;


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

      $user = user::whereIn('university_id',$institution)
      ->orderBy($sortby, $sum)
      ->orderBy($sortby2, $sum)
      ->where('final_submit', 1)
      ->get();


      $data = array('users' =>$user , );

      $view = View::make('admin.insight-thumbnail')->with($data);

      return $contents = (string) $view;


    }

    public function generate_sum_sallary()
    {
      $user = user::where([['final_submit', 1],['sum_sallary', NULL]])->get();
      foreach ($user as $key => $user) {
        $sum_sallary = $user->ayah_penghasilan + $user->ibu_penghasilan;
        $user->sum_sallary = $sum_sallary ;
        $user->save();
      }

      dd("Berhasil");
    }

    public function view_profile($id)
    {
      $user = user::find($id);

      // dd($_GET['seleksi']);

      $data = array('user' =>$user , );
      return view('admin.view-personal')->with($data);
    }

    public function print_profile($id)
    {
      // dd($id);
      $user = user::find($id);

      // $pdf = PDF::loadView('admin.view-personal-pdf', compact('user'));
      // return $pdf->stream();

      $data = array('user' => $user, );
      return view('admin.view-personal-pdf')->with($data);

    //   $html = View::make('path.to.pdf_view', ['data' => $data])->render();
    // $html = preg_replace('/>\s+</', '><', $html);
    // return PDF::loadHtml($html);

      // $data = array('user' =>$user , );
      // return view('admin.view-personal')->with($data);
    }


}
