<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class insightController extends Controller
{
    public function insight()
    {
      return view('admin.insight');
    }
}
