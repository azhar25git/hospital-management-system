<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function add_doctor_view() {
        
        return view('admin.add_doctor');
    }

    function save_doctor(Request $req) {
        $validatedData = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11'],
            'roomnum' => ['required', 'string', 'max:3'],
            'specialty' => ['required', 'string'],
            'image' => ['required', 'file'],
        ]);

        $doctor = new Doctor;

        $doctor->name = $validatedData['name'];
        $doctor->phone = $validatedData['phone'];
        $doctor->roomnum = $validatedData['roomnum'];
        $doctor->specialty = $validatedData['specialty'];
        $file = $req->file('image');
 
        $ext = $file->getClientOriginalExtension();
        $name = time() . ".$ext";
        $path = "doctorfiles/$name";
        if(Storage::disk('local')->put($path, $file)) {
            $doctor->image = $path;
        } else {
            return redirect()
            ->back()
            ->with($req->input())
            ->with('error', 'File not uploaded');
        }

        $doctor->save();

        return redirect()
            ->back()
            ->with('message', "Added Doctor Successfully!");
    }
}
