<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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


    function appointment(Request $req) {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11'],
            'email' => ['required', 'email'],
            'date' => ['required', 'date'],
            'doctor_id' => ['required', 'integer'],
            'message' => ['required', 'string']
        ]);

        $appointment = new Appointment;
        $appointment->name = $req->input('name');
        $appointment->phone = $req->input('phone');
        $appointment->email = $req->input('email');
        $appointment->date = $req->input('date');
        $appointment->doctor_id = $req->input('doctor_id');
        $appointment->message = $req->input('message');
        $appointment->user_id = Auth::id() ?? 0;
        $appointment->status = 'pending';

        $appointment->save();

        return redirect()
        ->back()
        ->with('message', 'Appointment successful');
    }

    function user_appointments() {
        $user_id = Auth::id();
        $appointments = Appointment::where('user_id', $user_id)->get();

        return view('user.appointments', compact('appointments'));
    }

    function cancel_appointment($id) {
        $user_id = Auth::id();
        $appointment = Appointment::where([
            'user_id' => $user_id,
            'id' => $id
        ])->first();
        if($appointment) {
            $appointment->delete();
        }
        return redirect()
        ->back()
        ->with('message', 'Delete Appointment Successful');
    }
}
