<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class managercontroller extends Controller
{
    //
    // add managercontroller
    public function index() { return view('cuns_manager.dashboard.index'); }
}