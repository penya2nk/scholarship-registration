<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class gatewayController extends Controller
{

    public function logout()
    {
      Auth::logout();
      return redirect('/dashboard/login');
    }

    public function indexlogin()
    {
      if (Auth::user()) {
        return redirect('/dashboard');
      }

      // dd(url(route('password.reset', 123, false)));
      return view('auth.loginnew');
    }


}
