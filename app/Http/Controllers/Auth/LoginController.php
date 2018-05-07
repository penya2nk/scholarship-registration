<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mail\UserVerificationEmail;
use Illuminate\Support\Facades\Mail;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/scholarship/step/1/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function validateEmail(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
        ]);
    }



    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
          // Menguji apakah akun sudah aktif atau belum
            // if (Auth::user()->status == 0) {
            //   Auth::logout();
            //   session::flash('warningverify', 'Sorry, Account still Inactive. Please Check your email');
            //   return redirect('/dashboard/login')->with('warningverify', 'Sorry, Account still Inactive. Please Check your email');
            // }
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function resendemail(Request $request)
    {

      // Validasi Apakah email ada atau tidak
      $this->validateEmail($request);
      $user = User::where('email', $request->email)->first();

      // Jika Ada kirim email Verifikasi
      if ($user == NULL) {
        return redirect('/')->with('warningverify','Email Not Found');
      }elseif ($user->status == 1) {
        return redirect('/')->with('registerstatus','Hey ! Email Has Been Activated, You can log in :)');
      }
      Mail::to($request->email)->send(new UserVerificationEmail($user));
      return redirect('/')->with('registerstatus','Verification Email has been sent, please check email to activate');

    }

    public function logout()
    {
      Auth::logout();
      return redirect('/dashboard/login');
    }



}
