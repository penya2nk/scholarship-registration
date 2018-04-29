<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Cloudder;



class RegWizardController extends Controller
{
    public function profile()
    {
      $user = Auth::user();

      $data = array('user' =>$user , );

      return view('wizard.step1profile')->with($data);
    }

    public function draft_profile(Request $request)
    {

      $request = $_POST['data'];

      $user = Auth::user();
      foreach ($request as $key => $value) {
        $variable = $value['name'];
        ${$variable} = $value['value'];
      }


        if ($name !== "") {
          $user->name = $name;
        }
        if ($nickname !== "") {
          $user->nickname = $nickname;
        }
        if ($born_place !== "") {
          $user->born_place = $born_place;
        }
        if ($born_year !== "") {
          $user->born_date = $born_year.'-'.$born_month.'-'.$born_date;
        }
        if ($born_month !== "") {
          // $user->born_month = $born_month;
        }
        if ($born_year !== "") {
          // $user->born_year = $born_year;
        }
        if ($address !== "") {
          $user->address = $address;
        }
        if ($anak_ke !== "") {
          $user->anak_ke = $anak_ke;
        }
        if ($bersaudara !== "") {
          $user->bersaudara = $bersaudara;
        }
        if ($university_id !== "") {
          $user->university_id = $university_id;
        }
        if ($faculty !== "") {
          $user->faculty = $faculty;
        }
        if ($mayor !== "") {
          $user->mayor = $mayor;
        }
        if ($generation !== "") {
          $user->generation = $generation;
        }
        if ($nip_mahasiswa !== "") {
          $user->nip_mahasiswa = $nip_mahasiswa;
        }
        if ($ayah_name !== "") {
          $user->ayah_name = $ayah_name;
        }
        if ($ayah_tempat_lahir !== "") {
          $user->ayah_tempat_lahir = $ayah_tempat_lahir;
        }
        if ($ayah_born_year !== "") {
          $user->ayah_tanggal_lahir = $ayah_born_year.'-'.$ayah_born_month.'-'.$ayah_born_date;
        }
        if ($ayah_born_month !== "") {
          // $user->ayah_born_month = $ayah_born_month;
        }
        if ($ayah_born_year !== "") {
          // $user->ayah_born_year = $ayah_born_year;
        }
        if ($ayah_alamat !== "") {
          $user->ayah_alamat = $ayah_alamat;
        }
        if ($ayah_suku !== "") {
          $user->ayah_suku = $ayah_suku;
        }
        if ($ayah_pendidikan !== "") {
          $user->ayah_pendidikan = $ayah_pendidikan;
        }
        if ($ayah_pekerjaan !== "") {
          $user->ayah_pekerjaan = $ayah_pekerjaan;
        }
        if ($ayah_penghasilan !== "") {
          $user->ayah_penghasilan = $ayah_penghasilan;
        }
        if ($ayah_phone !== "") {
          $phone_subs_ayah = substr($ayah_phone,0,4);
          if ($phone_subs_ayah == "+620") {
            $phone_subs_ayah = substr_replace($ayah_phone,"+62",0,4);
          }else {
            $phone_subs_ayah = $ayah_phone;
          }
          $user->ayah_phone = $phone_subs_ayah;
        }
        if ($ayah_tulangpunggung !== "") {
          $user->ayah_tulangpunggung = $ayah_tulangpunggung;
        }
        if ($ayah_wafat !== "" && $ayah_tulangpunggung = "1") {
          $user->ayah_wafat = 0;
        }elseif($ayah_tulangpunggung = "0") {
          $user->ayah_wafat = $ayah_tulangpunggung;
        }
        if ($ayah_tanggungan !== "") {
          $user->ayah_tanggungan = $ayah_tanggungan;
        }
        if ($ibu_name !== "") {
          $user->ibu_name = $ibu_name;
        }
        if ($ibu_tempat_lahir !== "") {
          $user->ibu_tempat_lahir = $ibu_tempat_lahir;
        }
        if ($ibu_born_year !== "") {
          $user->ibu_tanggal_lahir = $ibu_born_year.'-'.$ibu_born_month.'-'.$ibu_born_date;
        }
        if ($ibu_born_month !== "") {
          // $user->ibu_born_month = $ibu_born_month;
        }
        if ($ibu_born_year !== "") {
          // $user->ibu_born_year = $ibu_born_year;
        }
        if ($ibu_alamat !== "") {
          $user->ibu_alamat = $ibu_alamat;
        }
        if ($ibu_suku !== "") {
          $user->ibu_suku = $ibu_suku;
        }
        if ($ibu_pendidikan !== "") {
          $user->ibu_pendidikan = $ibu_pendidikan;
        }
        if ($ibu_pekerjaan !== "") {
          $user->ibu_pekerjaan = $ibu_pekerjaan;
        }
        if ($ibu_penghasilan !== "") {
          $user->ibu_penghasilan = $ibu_penghasilan;
        }
        if ($ibu_phone !== "") {
          $phone_subs_ibu = substr($ibu_phone,0,4);
          if ($phone_subs_ibu == "+620") {
            $phone_subs_ibu = substr_replace($ibu_phone,"+62",0,4);
          }else {
            $phone_subs_ibu = $ibu_phone;
          }
          $user->ibu_phone = $phone_subs_ibu;
        }
        if ($ibu_tulangpunggung !== "") {
          $user->ibu_tulangpunggung = $ibu_tulangpunggung;
        }
        if ($ibu_wafat !== "" && $ibu_tulangpunggung = "1") {
          $user->ibu_wafat = 0;
        }elseif($ibu_tulangpunggung = "0") {
          $user->ibu_wafat = $ibu_tulangpunggung;
        }

        if ($ibu_tanggungan !== "") {
          $user->ibu_tanggungan = $ibu_tanggungan;
        }

        $user->save();

        if ($user) {
          $status = 'saved';
        }else {
          $status = 'error';
        }


      return Response::json( $status  );
    }

    public function crop_profpic()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

      //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "img-training-".$waktu->format('Y-m-d')."-".time().".jpg";
        $path = public_path('images/trainingimage/' . $png_url);

        $img = Image::make(file_get_contents($data))->resize(1500, 1500);
        // ->save($path);
        $response = array(
          'url' => $png_url,
        );


      return Response::json( $response  );
    }
}
