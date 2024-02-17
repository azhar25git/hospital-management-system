<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect() {

        if(!Auth::id()) {
            return redirect()->back();
        }
        // admin
        if(Auth::user()->usertype == '1') {
            return view('admin.home');
        }

        // not admin
        return view('dashboard');
    }
}
