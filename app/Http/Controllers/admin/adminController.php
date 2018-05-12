<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('checkadmin');
    }

    public function index()
    {
      return redirect('/admin/statistic');
    }
}
