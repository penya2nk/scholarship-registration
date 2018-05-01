<?php

namespace App\Http\Controllers\student;

use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\models\organization;
use App\models\position;

use Carbon\Carbon;
use App\User;
use Cloudder;
use Image;




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
        if ($ayah_tulangpunggung == "1") {
          $user->ayah_wafat = 0;
        }elseif($ayah_tulangpunggung == "0") {
          $user->ayah_wafat = $ayah_wafat;
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
        if ($ibu_tulangpunggung == "1") {
          $user->ibu_wafat = 0;
        }elseif($ibu_tulangpunggung == "0") {
          $user->ibu_wafat = $ibu_wafat;
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
        $png_url = "bazis/profpic/student-".str_replace(' ','-',Auth::user()->name)."-".time();
        $path = public_path('images/trainingimage/' . $png_url);

        $img = Image::make(file_get_contents($data))->resize(1000, 1000)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $photo_url = Cloudder::show($png_url);

        // Save URL
        $user = Auth::user();
        $user->photo_profile = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );


      return Response::json( $response  );
    }

    public function update_profile(Request $request)
    {

      $user = Auth::user();

      if ($request->name !== "") {
        $user->name = $request->name;
      }
      if ($request->nickname !== "") {
        $user->nickname = $request->nickname;
      }
      if ($request->born_place !== "") {
        $user->born_place = $request->born_place;
      }
      if ($request->born_year !== "") {
        $user->born_date = $request->born_year.'-'.$request->born_month.'-'.$request->born_date;
      }
      if ($request->born_month !== "") {
        // $user->born_month = $request->born_month;
      }
      if ($request->born_year !== "") {
        // $user->born_year = $request->born_year;
      }
      if ($request->address !== "") {
        $user->address = $request->address;
      }
      if ($request->anak_ke !== "") {
        $user->anak_ke = $request->anak_ke;
      }
      if ($request->bersaudara !== "") {
        $user->bersaudara = $request->bersaudara;
      }
      if ($request->university_id !== "") {
        $user->university_id = $request->university_id;
      }
      if ($request->faculty !== "") {
        $user->faculty = $request->faculty;
      }
      if ($request->mayor !== "") {
        $user->mayor = $request->mayor;
      }
      if ($request->generation !== "") {
        $user->generation = $request->generation;
      }
      if ($request->nip_mahasiswa !== "") {
        $user->nip_mahasiswa = $request->nip_mahasiswa;
      }
      if ($request->ayah_name !== "") {
        $user->ayah_name = $request->ayah_name;
      }
      if ($request->ayah_tempat_lahir !== "") {
        $user->ayah_tempat_lahir = $request->ayah_tempat_lahir;
      }
      if ($request->ayah_born_year !== "") {
        $user->ayah_tanggal_lahir = $request->ayah_born_year.'-'.$request->ayah_born_month.'-'.$request->ayah_born_date;
      }
      if ($request->ayah_born_month !== "") {
        // $user->ayah_born_month = $request->ayah_born_month;
      }
      if ($request->ayah_born_year !== "") {
        // $user->ayah_born_year = $request->ayah_born_year;
      }
      if ($request->ayah_alamat !== "") {
        $user->ayah_alamat = $request->ayah_alamat;
      }
      if ($request->ayah_suku !== "") {
        $user->ayah_suku = $request->ayah_suku;
      }
      if ($request->ayah_pendidikan !== "") {
        $user->ayah_pendidikan = $request->ayah_pendidikan;
      }
      if ($request->ayah_pekerjaan !== "") {
        $user->ayah_pekerjaan = $request->ayah_pekerjaan;
      }
      if ($request->ayah_penghasilan !== "") {
        $user->ayah_penghasilan = $request->ayah_penghasilan;
      }
      if ($request->ayah_phone !== "") {
        $phone_subs_ayah = substr($request->ayah_phone,0,4);
        if ($request->phone_subs_ayah == "+620") {
          $phone_subs_ayah = substr_replace($request->ayah_phone,"+62",0,4);
        }else {
          $phone_subs_ayah = $request->ayah_phone;
        }
        $user->ayah_phone = $request->phone_subs_ayah;
      }
      if ($request->ayah_tulangpunggung !== "") {
        $user->ayah_tulangpunggung = $request->ayah_tulangpunggung;
      }
      if ($request->ayah_tulangpunggung == "1") {
        $user->ayah_wafat = 0;
      }elseif($request->ayah_tulangpunggung == "0") {
        $user->ayah_wafat = $request->ayah_wafat;
      }
      if ($request->ayah_tanggungan !== "") {
        $user->ayah_tanggungan = $request->ayah_tanggungan;
      }
      if ($request->ibu_name !== "") {
        $user->ibu_name = $request->ibu_name;
      }
      if ($request->ibu_tempat_lahir !== "") {
        $user->ibu_tempat_lahir = $request->ibu_tempat_lahir;
      }
      if ($request->ibu_born_year !== "") {
        $user->ibu_tanggal_lahir = $request->ibu_born_year.'-'.$request->ibu_born_month.'-'.$request->ibu_born_date;
      }
      if ($request->ibu_born_month !== "") {
        // $user->ibu_born_month = $request->ibu_born_month;
      }
      if ($request->ibu_born_year !== "") {
        // $user->ibu_born_year = $request->ibu_born_year;
      }
      if ($request->ibu_alamat !== "") {
        $user->ibu_alamat = $request->ibu_alamat;
      }
      if ($request->ibu_suku !== "") {
        $user->ibu_suku = $request->ibu_suku;
      }
      if ($request->ibu_pendidikan !== "") {
        $user->ibu_pendidikan = $request->ibu_pendidikan;
      }
      if ($request->ibu_pekerjaan !== "") {
        $user->ibu_pekerjaan = $request->ibu_pekerjaan;
      }
      if ($request->ibu_penghasilan !== "") {
        $user->ibu_penghasilan = $request->ibu_penghasilan;
      }
      if ($request->ibu_phone !== "") {
        $phone_subs_ibu = substr($request->ibu_phone,0,4);
        if ($request->phone_subs_ibu == "+620") {
          $phone_subs_ibu = substr_replace($request->ibu_phone,"+62",0,4);
        }else {
          $phone_subs_ibu = $request->ibu_phone;
        }
        $user->ibu_phone = $request->phone_subs_ibu;
      }
      if ($request->ibu_tulangpunggung !== "") {
        $user->ibu_tulangpunggung = $request->ibu_tulangpunggung;
      }
      if ($request->ibu_tulangpunggung == "1") {
        $user->ibu_wafat = 0;
      }elseif($request->ibu_tulangpunggung == "0") {
        $user->ibu_wafat = $request->ibu_wafat;
      }

      if ($request->ibu_tanggungan !== "") {
        $user->ibu_tanggungan = $request->ibu_tanggungan;
      }

      $user->update();

      return redirect()->route('step_achievement');
    }

    // Step 3 Achievement
    public function achievement()
    {
      $user = Auth::user();
      $positions = position::all();

      $data = array(
        'user' =>$user,
        'positions' =>$positions,
      );
      return view('wizard.step3achievement')->with($data);
    }

    public function update_achievement(Request $request)
    {

      $user = Auth::user();

      // Organization
      $user->organizations()->delete();

      foreach ($request->organization as $key => $org) {

        $org = new organization;
        $org->user_id = $user->id;
        $org->organization = "Halo";
        $org->position = $request->position[$key];
        $org->date_from = $request->date_from_org[$key];
        $org->date_end = $request->date_end_org[$key];
        $org->position_id = $request->position_name[$key];
        $org->save();
      }

      if ($request->save == "Save Draft") {
        return redirect()->route('step_achievement');
      }


    }



}
