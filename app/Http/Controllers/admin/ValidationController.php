<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ValidationController extends Controller
{
  public function count_null()
  {
    $user = User::where('email', "dwiutamabagus@gmail.com")->first();
    $attributes = $user->getattributes();

    $null=0;
    $juml=0;

    foreach ($attributes as $key => $attribute) {
          if ($attribute == NULL) {
            $null++;
            $notif[]= "Kolom $key belum diisi";
            $juml++;
          }else {
            $juml++;
          }
        }

        $result = round($null/$juml * 100);

        $data = array(
          'fill_percent' =>$result ,
          'notification' =>$notif,
         );

    return $data;

  }
}
