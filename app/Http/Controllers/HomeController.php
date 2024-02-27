<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
        return view('user.home');
    }

    public function index() {
        // admin
        if(Auth::id() && Auth::user()->usertype == '1') {
            return view('admin.home');
        }
        $doctors = Doctor::all();
        $path = "storage/doctorfiles";
        return view('user.home' , compact('doctors', 'path'));
    }
}
