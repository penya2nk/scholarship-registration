<?php

namespace App\Http\Controllers\student;

use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\models\organization;
use App\models\position;
use App\models\committee;
use App\models\competition;
use App\models\charity;
use App\models\publication;
use App\models\institution;
use App\models\training;

use Carbon\Carbon;
use App\User;
use Cloudder;
use Image;




class RegWizardController extends Controller
{
    public function profile()
    {

      $user = Auth::user();
      $insti = institution::all();
      $data = array(
        'user' =>$user ,
        'insti' =>$insti
      );

      if ($user->final_submit == 1) {
        return redirect()->route('step_final_submit');
      }


      if (isset($_GET['admin'])) {
        return redirect()->route('index.admin');
      }

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



        if ($phone !== "") {
          $phone_change = substr($phone,0,4);
          if ($phone == "+620") {

            $phone = substr_replace($phone_change,"+62",0,4);
          }else {
            $phone = $phone;
          }

          $user->phone = $phone;
        }

        if ($blog_address !== "") {
          $user->blog_address = $blog_address;
        }

        if ($nik_ktp !== "") {
          $user->nik_ktp = $nik_ktp;
        }

        if ($religion !== "") {
          $user->religion = $religion;
        }

        if ($gender !== "") {
          $user->gender = $gender;
        }

        if ($body_length !== "") {
          $user->body_length = $body_length;
        }

        if ($body_weight !== "") {
          $user->body_weight = $body_weight;
        }

        if ($facebook_id !== "") {
          $user->facebook_id = $facebook_id;
        }

        if ($instagram_id !== "") {
          $user->instagram_id = $instagram_id;
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
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

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


      if ($request->phone !== "") {
        $phone = substr($request->phone,0,4);
        if ($phone == "+620") {
          $phone = substr_replace($request->phone,"+62",0,4);
        }else {
          $phone = $request->phone;
        }

        $user->phone = $phone;
      }

      if ($request->blog_address !== NULL) {
        $user->blog_address = $request->blog_address;
      }

      if ($request->nik_ktp !== NULL) {
        $user->nik_ktp = $request->nik_ktp;
      }

      if ($request->religion !== "") {
        $user->religion = $request->religion;
      }

      if ($request->gender !== "") {
        $user->gender = $request->gender;
      }

      if ($request->body_length !== "") {
        $user->body_length = $request->body_length;
      }

      if ($request->body_weight !== "") {
        $user->body_weight = $request->body_weight;
      }

      if ($request->facebook_id !== "") {
        $user->facebook_id = $request->facebook_id;
      }

      if ($request->instagram_id !== "") {
        $user->instagram_id = $request->instagram_id;
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
        $user->ayah_phone = $phone_subs_ayah;
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


        $user->ibu_phone = $phone_subs_ibu;
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
      $positions = position::orderBy('id','desc')->get();

      if ($user->final_submit == 1) {
        return redirect()->route('step_final_submit');
      }


      $data = array(
        'user' =>$user,
        'positions' =>$positions,
      );
      return view('wizard.step3achievement')->with($data);
    }

    public function update_achievement(Request $request)
    {

      // dd($request);

      $user = Auth::user();
      $user->ip_1 = $request->ip_1;
      $user->ip_2 = $request->ip_2;
      $user->ip_3 = $request->ip_3;
      $user->ip_4 = $request->ip_4;
      $user->ipk_1 = $request->ipk_1;
      $user->ipk_2 = $request->ipk_2;
      $user->ipk_3 = $request->ipk_3;
      $user->ipk_4 = $request->ipk_4;
      $user->toefl = $request->toefl;
      $user->save();

      // Organization
      $user->organizations()->delete();
      foreach ($request->organization as $key => $org) {
        $org = new organization;
        $org->user_id = $user->id;
        $org->organization = $request->organization[$key];
        $org->position = $request->position[$key];
        $org->date_from = $request->date_from_org[$key];
        $org->date_end = $request->date_end_org[$key];
        $org->position_id = $request->position_name[$key];
        $org->save();
      }

      // Committee
      $user->committees()->delete();
      foreach ($request->committee as $key => $com) {
        $com = new committee;
        $com->user_id = $user->id;
        $com->committee_name = $request->committee[$key];
        $com->position = $request->position_com[$key];
        $com->date_from = $request->date_from_com[$key];
        $com->date_end = $request->date_end_com[$key];
        $com->position_id = $request->position_name_com[$key];
        $com->save();
      }

      // Training
      $user->trainings()->delete();
      foreach ($request->training as $key => $com) {
        $com = new training;
        $com->user_id = $user->id;
        $com->training = $request->training[$key];
        $com->date = $request->date_train[$key];
        $com->organizer = $request->organizer_train[$key];
        $com->content = $request->content_train[$key];
        $com->save();
      }

      // Competition
      $user->competitions()->delete();
      foreach ($request->competition_name as $key => $com) {
        $com = new competition;
        $com->user_id = $user->id;
        $com->level = $request->level_comp[$key];
        $com->type = $request->type_comp[$key];
        $com->title = $request->title_comp[$key];
        $com->competition_name = $request->competition_name[$key];
        $com->location = $request->location_comp[$key];
        $com->year = $request->year_comp[$key];
        $com->web = $request->web_comp[$key];
        $com->save();
      }

      // Charities
      $user->charities()->delete();
      foreach ($request->activity_name as $key => $char) {
        $char = new charity;
        $char->user_id = $user->id;
        $char->role       = $request->role_char[$key];
        $char->activity_name = $request->activity_name[$key];
        $char->location   = $request->location_char[$key];
        $char->date_from  = $request->date_from_char[$key];
        $char->date_end   = $request->date_end_char[$key];
        $char->person_impacted = $request->person_impacted[$key];
        $char->save();
      }

      // Publications
      $user->publications()->delete();
      foreach ($request->publication_name as $key => $pub) {
        $pub = new publication;
        $pub->user_id = $user->id;
        $pub->publication_name  = $request->publication_name[$key];
        $pub->role  = $request->role_pub[$key];
        $pub->author  = $request->author_pub[$key];
        $pub->abstract  = $request->abstract_pub[$key];
        $pub->year  = $request->year_pub[$key];
        $pub->save();
      }


      if ($request->save == "Save Draft") {
        return redirect()->route('step_achievement')->with('saved','Draft berhasil disimpan');
      }else {
        return redirect()->route('step_motivation');
      }


    }

    public function motivation()
    {
      $user = Auth::user();

      $data = array(
        'user' =>$user,

      );

      if ($user->final_submit == 1) {
        return redirect()->route('step_final_submit');
      }

      return view('wizard.step4motivation')->with($data);
    }

    public function update_motivation(Request $request)
    {

      $user = Auth::user();
      $user->lifeplan_summary = $request->lifeplan_summary;
      $user->commitment = $request->commitment;
      $user->why_accepted = $request->why_accepted;
      $user->save();

      if ($request->save == "Save Draft") {
        return redirect()->route('step_motivation')->with('saved','Draft berhasil disimpan');
      }else {
        return redirect()->route('step_document');
      }

    }

    public function document()
    {
      $user = Auth::user();

      $data = array(
        'user' =>$user,

      );

      if ($user->final_submit == 1) {
        return redirect()->route('step_final_submit');
      }

      return view('wizard.step5document')->with($data);
    }

    public function upload_ktp()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/ktp/ktp-".str_replace(' ','-',Auth::user()->name)."-".time();
        $path = public_path('images/trainingimage/' . $png_url);

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_ktp = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );


      return Response::json( $response  );
    }

    public function upload_kk()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/kk/kk-".str_replace(' ','-',Auth::user()->name)."-".time();
        $path = public_path('images/trainingimage/' . $png_url);

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_kk = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );


      return Response::json( $response  );
    }

    public function upload_ktm()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/photo_ktm/ktm-".str_replace(' ','-',Auth::user()->name)."-".time();

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_ktm = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );


      return Response::json( $response  );
    }



    public function upload_home_front()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/photo_home/home-front-".str_replace(' ','-',Auth::user()->name)."-".time();

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_home_front = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );

      return Response::json( $response  );
    }

    public function upload_home_out()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/photo_home/home-out-".str_replace(' ','-',Auth::user()->name)."-".time();

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_home_out = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );

      return Response::json( $response  );
    }

    public function upload_home_side()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/photo_home/home-side-".str_replace(' ','-',Auth::user()->name)."-".time();

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_home_side = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );

      return Response::json( $response  );
    }

    public function upload_home_in()
    {
      $data = $_POST['imageData'];
      $waktu = Carbon::now();

        //get the base-64 from data
        $base64_str = substr($data, strpos($data, ",")+1);

        $image = base64_decode($base64_str);
        $png_url = "bazis/photo_home/home-in-".str_replace(' ','-',Auth::user()->name)."-".time();

        $img = Image::make(file_get_contents($data))->resize(2500, 1503)->encode('data-url');

        // ->save($path);

        // Lempar langsung ke Cloudinary Setting ada di env
        $upload_cloudinary = Cloudder::upload($img,$png_url,array("format" =>"jpg"));
        $result = $upload_cloudinary->getResult();
        $photo_url = $result['secure_url'];

        // Save URL
        $user = Auth::user();
        $user->photo_home_in = $photo_url;
        $user->save();

        $response = array(
          'url' => $photo_url,
        );

      return Response::json( $response  );
    }

    public function upload_sktm(Request $request)
    {

      $this->validate($request,[
           'file_sktm'=>'required|mimes:pdf|between:1, 2000',
       ]);

      $file_ext = $request->file('file_sktm')->getClientOriginalExtension();
      $data = $request->file('file_sktm')->getRealPath();

      $doc_url = "bazis/sktm/sktm-".str_replace(' ','-',strtolower(Auth::user()->name))
      ."-".time();

      // Lempar langsung ke Cloudinary Setting ada di env
      $upload_cloudinary = Cloudder::upload($data,$doc_url,array("format" =>"pdf"));
      $result = $upload_cloudinary->getResult();
      $doc_url = $result['secure_url'];

      // Save URL
      $user = Auth::user();
      $user->photo_sktm = $doc_url;
      $user->save();

      $response = array(
        'url' => $doc_url,
      );

    return redirect()->route('step_document')->with('document_saved', 'Berkas berhasil disimpan');
    }

    public function upload_parent_sallary(Request $request)
    {

      $this->validate($request,[
           'file_parent_sallary'=>'required|mimes:pdf|between:1, 2000',
       ]);

      $file_ext = $request->file('file_parent_sallary')->getClientOriginalExtension();
      $data = $request->file('file_parent_sallary')->getRealPath();

      $doc_url = "bazis/parent_sallary/slipgaji-orangtua-".str_replace(' ','-',strtolower(Auth::user()->name))
      ."-".time();

      // Lempar langsung ke Cloudinary Setting ada di env
      $upload_cloudinary = Cloudder::upload($data,$doc_url,array("format" =>"pdf"));
      $result = $upload_cloudinary->getResult();
      $doc_url = $result['secure_url'];

      // Save URL
      $user = Auth::user();
      $user->photo_parent_sallary = $doc_url;
      $user->save();

      $response = array(
        'url' => $doc_url,
      );

    return redirect()->route('step_document')->with('document_saved', 'Berkas berhasil disimpan');
    }

    public function upload_transcript_score(Request $request)
    {

      $this->validate($request,[
           'file_transcript_score'=>'required|mimes:pdf|between:1, 2000',
       ]);

      $file_ext = $request->file('file_transcript_score')->getClientOriginalExtension();
      $data = $request->file('file_transcript_score')->getRealPath();

      $doc_url = "bazis/transcript_score/transkrip-nilai-".str_replace(' ','-',strtolower(Auth::user()->name))
      ."-".time();

      // Lempar langsung ke Cloudinary Setting ada di env
      $upload_cloudinary = Cloudder::upload($data,$doc_url,array("format" =>"pdf"));
      $result = $upload_cloudinary->getResult();
      $doc_url = $result['secure_url'];

      // Save URL
      $user = Auth::user();
      $user->photo_transcript_score = $doc_url;
      $user->save();

      $response = array(
        'url' => $doc_url,
      );

    return redirect()->route('step_document')->with('document_saved', 'Berkas berhasil disimpan');
    }


    public function upload_active_student(Request $request)
    {

      $this->validate($request,[
           'file_active_student'=>'required|mimes:pdf|between:1, 2000',
       ]);

      $file_ext = $request->file('file_active_student')->getClientOriginalExtension();
      $data = $request->file('file_active_student')->getRealPath();

      $doc_url = "bazis/active_student/surat-keterangan-aktif-".str_replace(' ','-',strtolower(Auth::user()->name))
      ."-".time();

      // Lempar langsung ke Cloudinary Setting ada di env
      $upload_cloudinary = Cloudder::upload($data,$doc_url,array("format" =>"pdf"));
      $result = $upload_cloudinary->getResult();
      $doc_url = $result['secure_url'];

      // Save URL
      $user = Auth::user();
      $user->photo_active_student = $doc_url;
      $user->save();

      $response = array(
        'url' => $doc_url,
      );

    return redirect()->route('step_document')->with('document_saved', 'Berkas berhasil disimpan');
    }


    public function submit_review()
    {

      $user = Auth::user();
      $validation = app('App\Http\Controllers\admin\ValidationController')->count_null($user->email);


      $data = array('user' =>$user ,
                    'validation'=> $validation
                    );

      return view('wizard.step6preview')->with($data);

    }

    public function final_submit()
    {
      $user = Auth::user();
      $validation = app('App\Http\Controllers\admin\ValidationController')->count_null($user->email);
      $data = array('user' =>$user ,
                    'validation'=> $validation
                    );



      return view('wizard.step7submit')->with($data);

    }

    public function final_submit_save(Request $request)
    {
      $user = Auth::user();

      $sum_sallary = $user->ayah_penghasilan + $user->ibu_penghasilan;

      $user->final_submit = 1;
      $user->sum_sallary = $sum_sallary ;
      $user->save();

      if ($user) {
        $status = "Success";
      }else {
        $status = "Gagal";
      }

      $output = array("status"  => $status,
                    // "judul"   => $judul
                  );

    return response()->json($output);
    }






}
