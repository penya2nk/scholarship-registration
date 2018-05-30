<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mailgun;
use App\models\emailblast;
use Session;


class EmailBlastController extends Controller
{
    public function index()
    {
      $listemail = emailblast::orderBy('created_at', 'desc')->get();
      $data = array('emails' => $listemail, );
      return view('admin.email-blast.index-email-blast')->with($data);
    }

    public function create()
    {
      return view('admin.email-blast.create-email-blast');
    }

    public function send(Request $request)
    {

      $subject = $request->email_subject;
      $cc = $request->cc;
      $messagenya = $request->message;
      $data = '';

      if ($request->recepient == 1 /*all member*/) {

      }elseif ($request->recepient == 2 /*Registered member*/) {
        # code...
      }elseif ($request->recepient == 3 /*Submitted member*/){

      }

      $email_data = array(
        'judul' =>$subject,
        'pesan' =>$messagenya
         , );


      $sendemail = Mailgun::send('email.emailblast', $email_data, function ($message) use ($data,$subject) {
          $message
          // ->to($data['email'])
          ->to("dwiutamabagus@gmail.com")
          ->trackClicks(true)
          ->trackOpens(true)
          ->subject($subject);
      });

      $mail = new emailblast;
      $mail->recepient  = $request->recepient;
      $mail->email_subject  = $request->email_subject;
      $mail->cc   = $request->cc;
      $mail->message  = $request->message;
      $mail->user_id  = $request->user_id;
      // $mail->email_id = $sendmail->id;
      $mail->save();

      session::flash('alert', 'Berhasil Mengirimkan Email');
      return redirect()->route('admin.email');
    }
}
