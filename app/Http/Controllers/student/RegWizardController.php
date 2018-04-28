<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegWizardController extends Controller
{
    public function profile()
    {
      return view('wizard.step1profile');
    }
}
